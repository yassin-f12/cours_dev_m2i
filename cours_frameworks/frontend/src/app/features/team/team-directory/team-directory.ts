import { Component, computed, inject, signal } from '@angular/core';
import { EmployeeDirectory } from '../../../core/employee-directory';
import { EmployeeCard } from '../employee-card/employee-card';
import { SearchField } from '../../../shared/search-field/search-field';

@Component({
  selector: 'app-team-directory',
  imports: [EmployeeCard, SearchField],
  templateUrl: './team-directory.html',
})
export class TeamDirectory {
  private readonly directory = inject(EmployeeDirectory);

  protected readonly query = signal('');

  protected readonly filteredEmployees = computed(() => {
    const query = this.query().trim().toLowerCase();

    return this.directory.all().filter((employee) => {
      const searchableText =
        `${employee.firstName} ${employee.lastName} ${employee.jobTitle}`.toLowerCase();

      return searchableText.includes(query);
    });
  });
}
