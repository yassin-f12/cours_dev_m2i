import { TestBed } from '@angular/core/testing';
import { EmployeeDirectory } from './employee-directory';

describe('EmployeeDirectory', () => {
  let service: EmployeeDirectory;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(EmployeeDirectory);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
