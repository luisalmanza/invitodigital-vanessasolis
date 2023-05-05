import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Godparents2Component } from './godparents2.component';

describe('Godparents2Component', () => {
  let component: Godparents2Component;
  let fixture: ComponentFixture<Godparents2Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Godparents2Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Godparents2Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
