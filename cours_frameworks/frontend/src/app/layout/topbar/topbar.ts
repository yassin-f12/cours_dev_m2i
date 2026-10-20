import { Component, input, output } from '@angular/core';
import { Employee } from '../../models/employee';

@Component({
  imports: [],
  selector: 'app-topbar',
  host: {
    class: 'app__header topbar',
    role: 'banner',
  },
  styleUrl: './topbar.css',
  templateUrl: './topbar.html',
})
export class Topbar {
  readonly user = input.required<Employee>();
  readonly navOpen = input(false);
  readonly menuToggle = output<void>();
}
