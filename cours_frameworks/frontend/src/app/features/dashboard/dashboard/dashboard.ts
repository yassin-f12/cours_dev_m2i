import { Component, inject } from '@angular/core';
import { StatCard } from '../stat-card/stat-card';
import { LeaveList } from '../../leaves/leave-list/leave-list';
import { Session } from '../../../core/session';
import { LeaveStore } from '../../../core/leave-store';

@Component({
  selector: 'app-dashboard',
  imports: [StatCard, LeaveList, StatCard],
  templateUrl: './dashboard.html',
})
export class Dashboard {
  protected readonly session = inject(Session);
  protected readonly leaves = inject(LeaveStore);

  protected cancelLeave(id: number): void {
    this.leaves.cancel(id);
  }
}
