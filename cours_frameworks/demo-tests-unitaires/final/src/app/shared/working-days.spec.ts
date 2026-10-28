import { countWorkingDays } from './working-days';

// Repères : le lundi 2 novembre 2026 ouvre une semaine, le samedi 7 et le dimanche 8 la ferment.
describe('countWorkingDays', () => {
  it('compte une semaine du lundi au vendredi comme 5 jours', () => {
    // Préparer et agir : une fonction pure, un seul appel.
    const result = countWorkingDays('2026-11-02', '2026-11-06');
    // Vérifier.
    expect(result).toBe(5);
  });

  it('compte 1 jour quand le premier et le dernier jour sont identiques', () => {
    expect(countWorkingDays('2026-11-02', '2026-11-02')).toBe(1);
  });

  it('ne compte pas le week-end', () => {
    // Du vendredi 6 au lundi 9 : seuls le vendredi et le lundi comptent.
    expect(countWorkingDays('2026-11-06', '2026-11-09')).toBe(2);
  });

  it('renvoie 0 pour un samedi seul', () => {
    expect(countWorkingDays('2026-11-07', '2026-11-07')).toBe(0);
  });

  it('renvoie 0 quand le dernier jour est avant le premier', () => {
    expect(countWorkingDays('2026-11-06', '2026-11-02')).toBe(0);
  });

  it('renvoie 0 quand une date manque', () => {
    expect(countWorkingDays('', '2026-11-06')).toBe(0);
  });
});
