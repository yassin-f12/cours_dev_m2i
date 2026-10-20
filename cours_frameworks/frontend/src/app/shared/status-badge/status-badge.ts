import { Component, computed, input } from '@angular/core';
import { LEAVE_STATUS_LABELS, LeaveStatus } from '../../models/leave-request';

const BADGE_MODIFIERS: Record<LeaveStatus, string> = {
  pending: 'badge--pending',
  'manager-approved': 'badge--in-progress',
  approved: 'badge--approved',
  rejected: 'badge--rejected',
};

@Component({
  selector: 'app-status-badge',
  template: `<span class="badge" [class]="modifier()">{{ label() }}</span>`,
})
export class StatusBadge {
  readonly status = input.required<LeaveStatus>();

  protected readonly label = computed(() => LEAVE_STATUS_LABELS[this.status()]);
  protected readonly modifier = computed(() => BADGE_MODIFIERS[this.status()]);
}
