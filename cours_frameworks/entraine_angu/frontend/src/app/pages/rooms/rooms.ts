import { Component, inject } from '@angular/core';
import { RoomsApi } from '../../api/rooms';
import { toSignal } from '@angular/core/rxjs-interop';
import { MatButton } from '@angular/material/button';
import { RouterLink } from '@angular/router';

@Component({
  imports: [MatButton, RouterLink],
  selector: 'app-rooms',
  styleUrl: './rooms.css',
  templateUrl: './rooms.html',
})
export class Rooms {
  private readonly api = inject(RoomsApi);

  protected readonly salles = toSignal(this.api.getRooms(), {
    initialValue: [],
  });
}
