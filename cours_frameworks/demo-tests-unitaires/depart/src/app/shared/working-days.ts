const DATE_PATTERN = /^\d{4}-\d{2}-\d{2}$/;

// Nombre de jours ouvrés (lundi au vendredi) entre deux dates incluses, au format AAAA-MM-JJ.
// Renvoie 0 si une date est absente ou invalide, ou si la fin est avant le début.
export function countWorkingDays(start: string, end: string): number {
  if (!DATE_PATTERN.test(start) || !DATE_PATTERN.test(end) || end < start) {
    return 0;
  }
  // Dates en UTC : le passage à l'heure d'hiver ne fausse pas le calcul.
  const day = new Date(`${start}T00:00:00Z`);
  const last = new Date(`${end}T00:00:00Z`);
  let count = 0;
  while (day <= last) {
    const weekDay = day.getUTCDay(); // 0 : dimanche, 6 : samedi
    if (weekDay !== 0 && weekDay !== 6) {
      count++;
    }
    day.setUTCDate(day.getUTCDate() + 1);
  }
  return count;
}
