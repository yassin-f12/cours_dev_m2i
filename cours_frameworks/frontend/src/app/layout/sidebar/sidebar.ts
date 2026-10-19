import { Component } from '@angular/core';

@Component({
  imports: [],
  selector: 'app-sidebar',
  host: {
    class: 'app__sidebar sidebar',
    id: 'navigation',
  },
  templateUrl: './sidebar.html',
})
export class Sidebar {}
