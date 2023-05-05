import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Collage2Component } from './collage2.component';

describe('Collage2Component', () => {
  let component: Collage2Component;
  let fixture: ComponentFixture<Collage2Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Collage2Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Collage2Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
