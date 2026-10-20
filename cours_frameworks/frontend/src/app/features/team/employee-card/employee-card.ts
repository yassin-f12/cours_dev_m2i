import { Component, input } from '@angular/core';
import { Employee } from '../../../models/employee';

@Component({
  selector: 'app-employee-card',
  templateUrl: './employee-card.html',
  styleUrl: './employee-card.css',
  host: {
    class: 'card employee-card',
  },
})
export class EmployeeCard {
  readonly employee = input.required<Employee>();

  protected get initials(): string {
    const employee = this.employee();
    return `${employee.firstName[0]}${employee.lastName[0]}`;
  }
}
