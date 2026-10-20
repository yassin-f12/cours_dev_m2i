import { Component, computed, input, output, signal } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { NewLeaveRequest } from '../../../core/leave-store';
import { LEAVE_TYPE_LABELS, LeaveType } from '../../../models/leave-request';
import { countWorkingDays } from '../../../shared/date-utils';

@Component({
  selector: 'app-leave-quick-form',
  imports: [FormsModule],
  templateUrl: './leave-quick-form.html',
})
export class LeaveQuickForm {
  readonly remaining = input.required<number>();
  readonly submitted = output<NewLeaveRequest>();

  protected readonly type = signal<LeaveType>('paid');
  protected readonly startDate = signal('');
  protected readonly endDate = signal('');

  protected readonly typeOptions = Object.entries(LEAVE_TYPE_LABELS) as [LeaveType, string][];

  protected readonly days = computed(() => {
    const start = this.startDate();
    const end = this.endDate();

    if (!start || !end || end < start) {
      return null;
    }

    return countWorkingDays(start, end);
  });

  protected readonly remainingAfter = computed(() => {
    const days = this.days();

    if (days === null || this.type() !== 'paid') {
      return this.remaining();
    }

    return this.remaining() - days;
  });

  protected readonly canSubmit = computed(() => {
    const days = this.days();

    return days !== null && days > 0 && this.remainingAfter() >= 0;
  });

  protected submit(): void {
    if (!this.canSubmit()) {
      return;
    }

    this.submitted.emit({
      type: this.type(),
      startDate: this.startDate(),
      endDate: this.endDate(),
    });

    this.startDate.set('');
    this.endDate.set('');
  }
}
