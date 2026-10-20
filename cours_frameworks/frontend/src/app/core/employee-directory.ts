import { Injectable, signal } from '@angular/core';
import { Employee } from '../models/employee';
import { EMPLOYEES } from './mock-data';

@Injectable({
  providedIn: 'root',
})
export class EmployeeDirectory {
  private readonly employees = signal<Employee[]>(EMPLOYEES);

  readonly all = this.employees.asReadonly();
}
