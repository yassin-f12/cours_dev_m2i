import { Injectable, computed, inject, signal } from '@angular/core';
import { LeaveRequest, LeaveType } from '../models/leave-request';
import { countWorkingDays } from '../shared/date-utils';
import { LEAVE_REQUESTS, PAID_LEAVE_ALLOWANCE } from './mock-data';
import { Session } from './session';

export interface LeaveBalance {
  total: number;
  taken: number;
  pending: number;
  remaining: number;
}

export interface NewLeaveRequest {
  type: LeaveType;
  startDate: string;
  endDate: string;
}

@Injectable({
  providedIn: 'root',
})
export class LeaveStore {
  private readonly session = inject(Session);

  private readonly requests = signal<LeaveRequest[]>(LEAVE_REQUESTS);

  readonly myRequests = computed(() => {
    const userId = this.session.currentUser().id;

    return this.requests()
      .filter((request) => request.employeeId === userId)
      .sort((a, b) => a.startDate.localeCompare(b.startDate));
  });

  readonly paidLeaveBalance = computed<LeaveBalance>(() => {
    const paid = this.myRequests().filter((request) => request.type === 'paid');

    const daysWithStatus = (keep: (request: LeaveRequest) => boolean) =>
      paid
        .filter(keep)
        .reduce((sum, request) => sum + countWorkingDays(request.startDate, request.endDate), 0);

    const taken = daysWithStatus((request) => request.status === 'approved');

    const pending = daysWithStatus(
      (request) => request.status === 'pending' || request.status === 'manager-approved',
    );

    return {
      total: PAID_LEAVE_ALLOWANCE,
      taken,
      pending,
      remaining: PAID_LEAVE_ALLOWANCE - taken - pending,
    };
  });

  add(draft: NewLeaveRequest): void {
    const request: LeaveRequest = {
      ...draft,
      id: Date.now(),
      employeeId: this.session.currentUser().id,
      status: 'pending',
    };

    this.requests.update((list) => [...list, request]);
  }

  cancel(id: number): void {
    this.requests.update((list) =>
      list.filter((request) => request.id !== id || request.status !== 'pending'),
    );
  }
}
