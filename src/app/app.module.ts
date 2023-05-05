import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { ReactiveFormsModule } from '@angular/forms';
import { MdbValidationModule } from 'mdb-angular-ui-kit/validation';
import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { MdbCollapseModule } from 'mdb-angular-ui-kit/collapse';
import { MdbCarouselModule } from 'mdb-angular-ui-kit/carousel';
import { MdbFormsModule } from 'mdb-angular-ui-kit/forms';
import { CarouselComponent } from './carousel/carousel.component';
import { PhotoComponent } from './photo/photo.component';
import { MessageComponent } from './message/message.component';
import { CountdownComponent } from './countdown/countdown.component';
import { CollageComponent } from './collage/collage.component';
import { InvitationComponent } from './invitation/invitation.component';
import { ItineraryComponent } from './itinerary/itinerary.component';
import { PeopleComponent } from './people/people.component';
import { Collage2Component } from './collage2/collage2.component';
import { GodparentsComponent } from './godparents/godparents.component';
import { Godparents2Component } from './godparents2/godparents2.component';
import { ContactComponent } from './contact/contact.component';
import { FooterComponent } from './footer/footer.component';
import { MenuComponent } from './menu/menu.component';

@NgModule({
  declarations: [
    AppComponent,
    CarouselComponent,
    PhotoComponent,
    MessageComponent,
    CountdownComponent,
    CollageComponent,
    InvitationComponent,
    ItineraryComponent,
    PeopleComponent,
    Collage2Component,
    GodparentsComponent,
    Godparents2Component,
    ContactComponent,
    FooterComponent,
    MenuComponent
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    MdbCarouselModule,
    MdbFormsModule,
    ReactiveFormsModule,
    MdbValidationModule,
    MdbCollapseModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
