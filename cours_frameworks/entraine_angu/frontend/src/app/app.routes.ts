import { Routes } from '@angular/router';
import { Rooms } from './pages/rooms/rooms';
import { RoomDetail } from './pages/room-detail/room-detail';

export const routes: Routes = [
  {
    path: 'rooms',
    title: 'Salles | Mes salles',
    component: Rooms,
  },
  {
    path: 'rooms/:id',
    title: 'Salles | Détail de la salle',
    component: RoomDetail,
  },
  { path: '**', redirectTo: '' },
];
