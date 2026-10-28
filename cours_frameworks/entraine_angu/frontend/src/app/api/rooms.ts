import { HttpClient } from '@angular/common/http';
import { inject, Service } from '@angular/core';
import { Observable } from 'rxjs';
import { Room } from '../models/room';

export type SalleDraft = Omit<Room, 'id'>;
const API_URL = '/api/rooms';

@Service()
export class RoomsApi {
  private readonly mock = inject(HttpClient);

  getRooms(): Observable<Room[]> {
    return this.mock.get<Room[]>(API_URL);
  }

  getRoomById(id: number): Observable<Room> {
    return this.mock.get<Room>(`${API_URL}/${id}`);
  }
}
