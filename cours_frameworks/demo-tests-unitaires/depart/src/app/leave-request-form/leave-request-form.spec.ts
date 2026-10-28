import { ComponentFixture, TestBed } from '@angular/core/testing';
import { LeaveBalance } from '../core/leave-balance';
import { LeaveRequestForm } from './leave-request-form';
import { describe, it, beforeEach, expect } from 'vitest';

describe('LeaveRequestForm', () => {
  // Etape 6.
  let fixture: ComponentFixture<LeaveRequestForm>;
  let page: HTMLElement;

  beforeEach(async () => {
    fixture = TestBed.createComponent(LeaveRequestForm);
    page = fixture.nativeElement;
    await fixture.whenStable();
  });

  it('affiche le solde initial', () => {
    expect(page.querySelector('.balance')?.textContent).toContain('25 jours');
  });

  it('désactive le bouton tant que les dates ne sont pas choisies', () => {
    const btn = page.querySelector<HTMLButtonElement>('button[type="submit"]');
    expect(btn?.disabled).toBe(true);
  });

  it('calcule les jours ouvrés dès que les deux dates sont saisies', async () => {
    await fillDate('start', '2026-11-02');
    await fillDate('end', '2026-11-04');

    expect(page.querySelector('.count')?.textContent).toContain('3 jours');
  });

  async function fillDate(id: string, value: string): Promise<void> {
    const input = page.querySelector<HTMLInputElement>(`#${id}`)!;
    input.value = value;
    input.dispatchEvent(new Event('input'));
    await fixture.whenStable();
  }

  it('enregistre la demande et met à jour le solde au clic', async () => {
    await fillDate('start', '2026-11-02');
    await fillDate('end', '2026-11-04');

    page.querySelector<HTMLButtonElement>('button[type="submit"]')!.click();
    await fixture.whenStable();

    expect(page.querySelector('[role="status"]')?.textContent).toContain('3 jours');
    expect(page.querySelector('.balance')?.textContent).toContain('22 jours');
  });

  it('affiche une alerte quand le solde est insuffisant', async () => {
    TestBed.inject(LeaveBalance).take(24); // préparer : il ne reste qu'1 jour
    await fillDate('start', '2026-11-02');
    await fillDate('end', '2026-11-03');

    page.querySelector<HTMLButtonElement>('button[type="submit"]')!.click();
    await fixture.whenStable();

    expect(page.querySelector('[role="alert"]')?.textContent).toContain('Solde insuffisant');
  });
});
