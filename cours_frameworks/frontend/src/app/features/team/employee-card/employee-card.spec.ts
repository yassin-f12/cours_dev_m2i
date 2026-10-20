import { ComponentFixture, TestBed } from '@angular/core/testing';
import { EmployeeCard } from './employee-card';

describe('EmployeeCard', () => {
  let component: EmployeeCard;
  let fixture: ComponentFixture<EmployeeCard>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EmployeeCard],
    }).compileComponents();

    fixture = TestBed.createComponent(EmployeeCard);
    component = fixture.componentInstance;

    fixture.componentRef.setInput('employee', {
      id: 1,
      firstName: 'Claire',
      lastName: 'Martin',
      email: 'claire.martin@example.com',
      jobTitle: 'Développeuse',
      role: 'employee',
      hiredAt: '2024-01-15',
    });

    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
