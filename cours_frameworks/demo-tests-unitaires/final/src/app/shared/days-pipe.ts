import { Pipe, PipeTransform } from '@angular/core';

// Affiche un nombre de jours avec le bon accord : "0 jour", "1 jour", "3 jours".
@Pipe({ name: 'days' })
export class DaysPipe implements PipeTransform {
  transform(value: number): string {
    return `${value} ${value >= 2 ? 'jours' : 'jour'}`;
  }
}
