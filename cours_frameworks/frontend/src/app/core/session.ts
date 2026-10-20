import { Injectable, computed, signal } from '@angular/core';
import { Employee } from '../models/employee';
import { EMPLOYEES } from './mock-data';

@Injectable({
  providedIn: 'root',
})
export class Session {
  private readonly user = signal<Employee>(EMPLOYEES[0]);

  readonly currentUser = this.user.asReadonly();

  readonly initials = computed(() => {
    const { firstName, lastName } = this.user();
    return `${firstName[0]}${lastName[0]}`;
  });
}
