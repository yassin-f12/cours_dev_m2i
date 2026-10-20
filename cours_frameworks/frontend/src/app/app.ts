import { Component, inject, signal } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { Sidebar } from './layout/sidebar/sidebar';
import { Topbar as TopBar } from './layout/topbar/topbar';
import { Dashboard } from './features/dashboard/dashboard/dashboard';
import { Session } from './core/session';

@Component({
  imports: [RouterOutlet, Sidebar, TopBar, Dashboard],
  selector: 'app-root',
  styleUrl: './app.css',
  templateUrl: './app.html',
})
export class App {
  protected readonly menuOuvert = signal(false);
  protected readonly session = inject(Session);

  protected basculerMenu(): void {
    this.menuOuvert.update((valeur) => !valeur);
  }
}
