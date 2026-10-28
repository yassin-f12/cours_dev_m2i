import { Component, computed, inject, signal } from '@angular/core';
import { LeaveBalance } from '../core/leave-balance';
import { DaysPipe } from '../shared/days-pipe';
import { countWorkingDays } from '../shared/working-days';

@Component({
  imports: [DaysPipe],
  selector: 'app-leave-request-form',
  styleUrl: './leave-request-form.css',
  templateUrl: './leave-request-form.html',
})
export class LeaveRequestForm {
  protected readonly balance = inject(LeaveBalance);

  protected readonly start = signal('');
  protected readonly end = signal('');
  // Recalculé automatiquement à chaque changement de date.
  protected readonly days = computed(() => countWorkingDays(this.start(), this.end()));

  protected readonly error = signal('');
  protected readonly confirmation = signal('');

  protected submit(event: Event): void {
    // Pas de rechargement de la page : on traite l'envoi nous-mêmes.
    event.preventDefault();
    this.error.set('');
    this.confirmation.set('');
    const days = this.days();
    try {
      this.balance.take(days);
      this.confirmation.set(`Demande enregistrée : ${days} ${days >= 2 ? 'jours' : 'jour'}.`);
    } catch (error) {
      this.error.set(error instanceof Error ? error.message : 'Demande impossible.');
    }
  }
}
