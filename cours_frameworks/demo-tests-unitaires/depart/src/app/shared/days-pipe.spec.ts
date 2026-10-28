import { DaysPipe } from './days-pipe';
import { describe, it, expect } from 'vitest';

describe('DaysPipe', () => {
  // Etape 4.
  const pipe = new DaysPipe();

  it('écrit "jour" au singulier pour 0 et 1', () => {
    expect(pipe.transform(0)).toBe('0 jour');
    expect(pipe.transform(1)).toBe('1 jour');
  });
});
