import { Component, HostListener, OnDestroy, OnInit } from '@angular/core';
import { interval } from 'rxjs';
@Component({
  selector: 'app-countdown',
  templateUrl: './countdown.component.html',
  styleUrls: ['./countdown.component.scss']
})
export class CountdownComponent implements OnInit {
  subscription: any;
  dateNow = new Date();
  dateDay = new Date('Jun 10 2023 15:00:00');
  timeDifference: number = 0;
  secondsToDday: string = "00";
  minutesToDday: string = "00";
  hoursToDday: string = "00";
  daysToDday: string = "00";
  mobile: boolean = false;

  constructor() { }

  getTimeDifference() {
    this.timeDifference = this.dateDay.getTime() - new Date().getTime();
    this.allocateTimeUnits(this.timeDifference);
  }

  allocateTimeUnits(timeDifference: number) {
    this.secondsToDday = this.format(Math.floor((timeDifference) / (1000) % 60));
    this.minutesToDday = this.format(Math.floor((timeDifference) / (1000 * 60) % 60));
    this.hoursToDday = this.format(Math.floor((timeDifference) / (1000 * 60 * 60) % 24));
    this.daysToDday = this.format(Math.floor((timeDifference) / (1000 * 60 * 60 * 24)));
    if (parseInt(this.secondsToDday) <= 0 && parseInt(this.minutesToDday) <= 0 && parseInt(this.minutesToDday) <= 0 && parseInt(this.hoursToDday) <= 0 && parseInt(this.daysToDday) <= 0) {
      this.subscription.unsubscribe();
      this.secondsToDday = "00";
      this.minutesToDday = "00";
      this.hoursToDday = "00";
      this.daysToDday = "00";
    }
  }

  ngOnInit(): void {
    this.subscription = interval(1000)
      .subscribe(x => { this.getTimeDifference(); });
    window.innerWidth <= 980 ? this.mobile = true : this.mobile = false;
  }

  ngOnDestroy(): void {
    this.subscription.unsubscribe();
  }

  format(num: number) {
    return num > 9 ? "" + num : "0" + num;
  }

  @HostListener('window:resize', ['$event'])
  onResize() {
    window.innerWidth <= 980 ? this.mobile = true : this.mobile = false;
  }

}
