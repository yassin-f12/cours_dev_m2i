import { TestBed } from '@angular/core/testing';
import { LeaveBalance } from './leave-balance';
import { describe, it, expect, beforeEach } from 'vitest';

describe('LeaveBalance', () => {
  // Etape 5.
  let balance: LeaveBalance;

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
    balance.take(3);
    balance.take(2);
    balance.take(1);

    expect(balance.taken()).toBe(6);
    expect(balance.remaining()).toBe(19);
  });

  it('accepte de poser tout le solde', () => {
    balance.take(25);

    expect(balance.taken()).toBe(25);
    expect(balance.remaining()).toBe(0);
  });

  it('refuse une demande supérieure au solde, sans modifier le solde', () => {
    balance.take(20);

    expect(() => balance.take(6)).toThrow('Solde insuffisant');
    expect(balance.remaining()).toBe(5);
  });

  it('refuse 0 jour ou un nombre négatif', () => {
    expect(() => balance.take(0)).toThrow('Le nombre de jours doit être un entier positif');
    expect(balance.remaining()).toBe(25);
  });
});
