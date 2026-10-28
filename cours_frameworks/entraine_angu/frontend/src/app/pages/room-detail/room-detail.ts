import { Component, inject, input } from '@angular/core';
import { RoomsApi } from '../../api/rooms';
import { toObservable, toSignal } from '@angular/core/rxjs-interop';
import { switchMap } from 'rxjs';

@Component({
  imports: [],
  selector: 'app-room-detail',
  styleUrl: './room-detail.css',
  templateUrl: './room-detail.html',
})
export class RoomDetail {
  private readonly api = inject(RoomsApi);
  protected readonly id = input.required<string>();

  protected readonly salle = toSignal(
    toObservable(this.id).pipe(switchMap((id) => this.api.getRoomById(Number(id)))),
    {
      initialValue: null,
    },
  );
}
