import { TestBed } from '@angular/core/testing';
import { LeaveStore } from './leave-store';

describe('LeaveStore', () => {
  let service: LeaveStore;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(LeaveStore);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
