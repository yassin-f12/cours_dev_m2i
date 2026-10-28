import { Service, computed, signal } from '@angular/core';

// Le solde de congés payés de l'utilisateur, partagé par toute l'application.
@Service()
export class LeaveBalance {
  readonly total = 25;

  private readonly takenDays = signal(0);

  // Lecture seule pour le reste de l'application : seul take() modifie le solde.
  readonly taken = this.takenDays.asReadonly();
  readonly remaining = computed(() => this.total - this.takenDays());

  // Lève une erreur si la demande est impossible : le solde n'est alors pas modifié.
  take(days: number): void {
    if (!Number.isInteger(days) || days <= 0) {
      throw new Error('Le nombre de jours doit être un entier positif.');
    }
    if (days > this.remaining()) {
      throw new Error(`Solde insuffisant : il reste ${this.remaining()} jours.`);
    }
    this.takenDays.update((taken) => taken + days);
  }
}
