import { Component, input, model } from '@angular/core';

@Component({
  selector: 'app-search-field',
  templateUrl: './search-field.html',
  styleUrl: './search-field.css',
})
export class SearchField {
  readonly label = input.required<string>();
  readonly placeholder = input('');
  readonly value = model('');

  protected readonly fieldId = `search-${crypto.randomUUID()}`;
}
