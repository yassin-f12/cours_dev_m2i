import { ComponentFixture, TestBed } from '@angular/core/testing';
import { Topbar } from './topbar';

describe('Topbar', () => {
  let component: Topbar;
  let fixture: ComponentFixture<Topbar>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [Topbar],
    }).compileComponents();

    fixture = TestBed.createComponent(Topbar);
    component = fixture.componentInstance;

    fixture.componentRef.setInput('user', {
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
