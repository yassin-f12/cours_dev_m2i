import { ComponentFixture, TestBed } from '@angular/core/testing';
import { Rooms } from './rooms';
import { provideHttpClient } from '@angular/common/http';
import { provideHttpClientTesting } from '@angular/common/http/testing';

describe('Rooms', () => {
  let component: Rooms;
  let fixture: ComponentFixture<Rooms>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      providers: [provideHttpClient(), provideHttpClientTesting()],
      imports: [Rooms],
    }).compileComponents();

    fixture = TestBed.createComponent(Rooms);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('va afficher', () => {
    expect(component).toBeTruthy();
  });
});
