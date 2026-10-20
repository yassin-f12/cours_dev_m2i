import { DatePipe } from '@angular/common';
import { Component, input, output } from '@angular/core';
import { LEAVE_TYPE_LABELS, LeaveRequest } from '../../../models/leave-request';
import { StatusBadge } from '../../../shared/status-badge/status-badge';

@Component({
  selector: 'app-leave-list',
  imports: [DatePipe, StatusBadge],
  templateUrl: './leave-list.html',
})
export class LeaveList {
  readonly requests = input.required<LeaveRequest[]>();
  readonly cancelRequest = output<number>();

  protected readonly typeLabels = LEAVE_TYPE_LABELS;
}
