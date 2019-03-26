import { Routes } from '@angular/router';

import { DashboardComponent } from './dashboard.component';
import {AfterLoginService} from "../services/authentication/after-login.service";

export const DashboardRoutes: Routes = [{
  path: '',
  component: DashboardComponent,
  data: {
    heading: 'Dashboard'
  }
}];
