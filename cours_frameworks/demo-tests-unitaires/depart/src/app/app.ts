import { Component } from '@angular/core';
import { LeaveRequestForm } from './leave-request-form/leave-request-form';

@Component({
  imports: [LeaveRequestForm],
  selector: 'app-root',
  template: `
    <main class="container">
      <h1>Compteur de congés</h1>
      <app-leave-request-form />
    </main>
  `,
})
export class App {}
