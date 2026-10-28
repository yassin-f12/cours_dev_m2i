import { ComponentFixture, TestBed } from '@angular/core/testing';
import { RoomDetail } from './room-detail';
import { provideHttpClient } from '@angular/common/http';
import { provideHttpClientTesting, HttpTestingController } from '@angular/common/http/testing';

describe('RoomDetail', () => {
  let component: RoomDetail;
  let fixture: ComponentFixture<RoomDetail>;
  let httpTesting: HttpTestingController;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      providers: [provideHttpClient(), provideHttpClientTesting()],
      imports: [RoomDetail],
    }).compileComponents();

    fixture = TestBed.createComponent(RoomDetail);
    component = fixture.componentInstance;

    fixture.componentRef.setInput('id', '1');
    httpTesting = TestBed.inject(HttpTestingController);

    fixture.detectChanges();
    httpTesting.expectOne('/api/rooms/1').flush({
      id: 1,
      name: 'Confluence',
      floor: 0,
      capacity: 12,
      equipment: ['videoprojecteur', 'visio', 'tableau-blanc'],
      accessible: true,
    });

    await fixture.whenStable();
  });

  afterEach(() => {
    httpTesting.verify();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
