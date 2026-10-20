import { ComponentFixture, TestBed } from '@angular/core/testing';
import { LeaveQuickForm } from './leave-quick-form';

describe('LeaveQuickForm', () => {
  let component: LeaveQuickForm;
  let fixture: ComponentFixture<LeaveQuickForm>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [LeaveQuickForm],
    }).compileComponents();

    fixture = TestBed.createComponent(LeaveQuickForm);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
