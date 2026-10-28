import { ComponentFixture, TestBed } from '@angular/core/testing';
import { LeaveBalance } from '../core/leave-balance';
import { LeaveRequestForm } from './leave-request-form';

describe('LeaveRequestForm', () => {
  let fixture: ComponentFixture<LeaveRequestForm>;
  let page: HTMLElement;

  beforeEach(async () => {
    // La fixture contient le composant ET son rendu HTML.
    fixture = TestBed.createComponent(LeaveRequestForm);
    page = fixture.nativeElement;
    // Attendre qu'Angular ait fini d'afficher le composant.
    await fixture.whenStable();
  });

  // Simule une saisie : changer la valeur, puis prévenir Angular avec l'événement "input".
  async function fillDate(id: string, value: string): Promise<void> {
    const input = page.querySelector<HTMLInputElement>(`#${id}`)!;
    input.value = value;
    input.dispatchEvent(new Event('input'));
    await fixture.whenStable();
  }

  function submitButton(): HTMLButtonElement {
    return page.querySelector<HTMLButtonElement>('button[type="submit"]')!;
  }

  it('affiche le solde initial', () => {
    expect(page.querySelector('.balance')?.textContent).toContain('25 jours');
  });

  it('désactive le bouton tant que les dates ne sont pas choisies', () => {
    expect(submitButton().disabled).toBe(true);
  });

  it('calcule les jours ouvrés dès que les deux dates sont saisies', async () => {
    await fillDate('start', '2026-11-02');
    await fillDate('end', '2026-11-06');

    expect(page.querySelector('.count')?.textContent).toContain('5 jours');
    expect(submitButton().disabled).toBe(false);
  });

  it('enregistre la demande et met à jour le solde au clic', async () => {
    await fillDate('start', '2026-11-02');
    await fillDate('end', '2026-11-04');

    submitButton().click();
    await fixture.whenStable();

    expect(page.querySelector('[role="status"]')?.textContent).toContain('3 jours');
    expect(page.querySelector('.balance')?.textContent).toContain('22 jours');
  });

  it('affiche une alerte quand le solde est insuffisant', async () => {
    // Le test et le composant partagent la même instance du service.
    TestBed.inject(LeaveBalance).take(24);
    await fillDate('start', '2026-11-02');
    await fillDate('end', '2026-11-03');

    submitButton().click();
    await fixture.whenStable();

    expect(page.querySelector('[role="alert"]')?.textContent).toContain('Solde insuffisant');
    expect(page.querySelector('.balance')?.textContent).toContain('1 jour');
  });
});
