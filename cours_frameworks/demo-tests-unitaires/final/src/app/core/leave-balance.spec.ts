import { TestBed } from '@angular/core/testing';
import { LeaveBalance } from './leave-balance';

describe('LeaveBalance', () => {
  let balance: LeaveBalance;

  // Exécuté avant CHAQUE test : chaque test reçoit un service neuf, avec 25 jours.
  beforeEach(() => {
    balance = TestBed.inject(LeaveBalance);
  });

  it('commence avec 25 jours restants et aucun jour pris', () => {
    expect(balance.remaining()).toBe(25);
    expect(balance.taken()).toBe(0);
  });

  it('retire les jours posés du solde', () => {
    balance.take(5);

    expect(balance.taken()).toBe(5);
    expect(balance.remaining()).toBe(20);
  });

  it('additionne plusieurs demandes', () => {
    balance.take(5);
    balance.take(3);

    expect(balance.remaining()).toBe(17);
  });

  it('accepte de poser tout le solde', () => {
    balance.take(25);

    expect(balance.remaining()).toBe(0);
  });

  it('refuse une demande supérieure au solde, sans modifier le solde', () => {
    balance.take(20);

    // On passe une FONCTION à expect : c'est elle qui doit lever l'erreur.
    expect(() => balance.take(6)).toThrow('Solde insuffisant');
    expect(balance.remaining()).toBe(5);
  });

  it('refuse 0 jour ou un nombre négatif', () => {
    expect(() => balance.take(0)).toThrow();
    expect(() => balance.take(-2)).toThrow();
    expect(balance.remaining()).toBe(25);
  });
});
