import { TestBed } from '@angular/core/testing';
import { RoomsApi } from './rooms';
import { provideHttpClient } from '@angular/common/http';
import { provideHttpClientTesting } from '@angular/common/http/testing';

describe('Rooms', () => {
  let service: RoomsApi;

  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [provideHttpClient(), provideHttpClientTesting()],
    });
    service = TestBed.inject(RoomsApi);
  });

  it('devrait être créé', () => {
    expect(service).toBeTruthy();
  });
});
