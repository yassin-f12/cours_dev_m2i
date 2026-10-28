import { countWorkingDays } from './working-days';
import { describe, it, expect } from 'vitest';

// Repères : le lundi 2 novembre 2026 ouvre une semaine, le samedi 7 et le dimanche 8 la ferment.
describe('countWorkingDays', () => {
  // Etape 2 : remplacer chaque it.todo par un vrai test.
  it('compte une semaine du lundi au vendredi comme 5 jours', () => {
    const result = countWorkingDays('2026-11-02', '2026-11-06');
    expect(result).toBe(5);
  });

  it('compte 1 jour quand le premier et le dernier jour sont identiques', () => {
    const result = countWorkingDays('2026-11-02', '2026-11-02');
    expect(result).toBe(1);
  });

  it('ne compte pas le week-end', () => {
    const result = countWorkingDays('2026-11-06', '2026-11-09');
    expect(result).toBe(2);
  });

  it('renvoie 0 pour un samedi seul', () => {
    const result = countWorkingDays('2026-11-07', '2026-11-07');
    expect(result).toBe(0);
  });

  it('renvoie 0 quand le dernier jour est avant le premier', () => {
    const result = countWorkingDays('2026-11-06', '2026-11-02');
    expect(result).toBe(0);
  });

  it('renvoie 0 quand une date manque', () => {
    const result = countWorkingDays('', '2026-11-05');
    expect(result).toBe(0);
  });
});
