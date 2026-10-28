import { DaysPipe } from './days-pipe';

describe('DaysPipe', () => {
  // Un pipe est une simple classe : pas besoin d'Angular pour le tester.
  const pipe = new DaysPipe();

  it('écrit "jour" au singulier pour 0 et 1', () => {
    expect(pipe.transform(0)).toBe('0 jour');
    expect(pipe.transform(1)).toBe('1 jour');
  });

  it('écrit "jours" au pluriel à partir de 2', () => {
    expect(pipe.transform(2)).toBe('2 jours');
    expect(pipe.transform(25)).toBe('25 jours');
  });
});
