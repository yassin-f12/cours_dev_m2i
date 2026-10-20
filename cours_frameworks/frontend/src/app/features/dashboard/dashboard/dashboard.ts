import { Component, inject } from '@angular/core';
import { StatCard } from '../stat-card/stat-card';
import { LeaveList } from '../../leaves/leave-list/leave-list';
import { LeaveQuickForm } from '../../leaves/leave-quick-form/leave-quick-form';
import { Session } from '../../../core/session';
import { LeaveStore, NewLeaveRequest } from '../../../core/leave-store';

@Component({
  selector: 'app-dashboard',
  imports: [StatCard, LeaveList, LeaveQuickForm],
  templateUrl: './dashboard.html',
})
export class Dashboard {
  protected readonly session = inject(Session);
  protected readonly leaves = inject(LeaveStore);

  protected cancelLeave(id: number): void {
    this.leaves.cancel(id);
  }

  protected addLeave(request: NewLeaveRequest): void {
    this.leaves.add(request);
  }
}
