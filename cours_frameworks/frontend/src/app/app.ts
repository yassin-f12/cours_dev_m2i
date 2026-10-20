import { Component, signal } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { Employee } from './models/employee';
import { LEAVE_TYPE_LABELS, LeaveRequest } from './models/leave-request';
import { Sidebar } from './layout/sidebar/sidebar';
import { Topbar as TopBar } from './layout/topbar/topbar';
import { StatCard } from './features/dashboard/stat-card/stat-card';

@Component({
  imports: [RouterOutlet, Sidebar, TopBar, StatCard],
  selector: 'app-root',
  styleUrl: './app.css',
  templateUrl: './app.html',
})
export class App {
  protected readonly menuOuvert = signal(false);

  protected basculerMenu(): void {
    this.menuOuvert.update((valeur) => !valeur);
  }

  protected readonly currentUser: Employee = {
    id: 1,
    firstName: 'Claire',
    lastName: 'Martin',
    email: 'claire.martin@techcorp.fr',
    jobTitle: 'Développeuse',
    role: 'employee',
    managerId: 4,
    hiredAt: '2024-03-02',
  };

  protected readonly nextLeave: LeaveRequest = {
    id: 12,
    employeeId: 1,
    type: 'paid',
    startDate: '2026-10-26',
    endDate: '2026-10-30',
    status: 'pending',
  };

  protected readonly nextLeaveType = LEAVE_TYPE_LABELS[this.nextLeave.type];
}
