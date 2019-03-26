/** Module */
import {NgModule} from '@angular/core';
import {RouterModule} from '@angular/router';
import {CommonModule} from '@angular/common';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';

import {SnotifyModule, SnotifyService, ToastDefaults} from 'ng-snotify';
/** Component */
import {AuthenticationRoutes} from './authentication.routing';
import {SigninComponent} from './signin/signin.component';
import {SignupComponent} from './signup/signup.component';
import {ForgotComponent} from './forgot/forgot.component';
import {LockscreenComponent} from './lockscreen/lockscreen.component';

/** service */
import {AuthService} from '../services/authentication/auth.service';
import {TokenService} from '../services/authentication/token.service';
import {AfterLoginService} from '../services/authentication/after-login.service';
import {BeforeLoginService} from '../services/authentication/before-login.service';
import {InvoiceService} from '../services/invoice/invoice.service';
import {SessionStorageService} from "../services/sessionStorage/sessionStorage.service";
import {ApiService} from "../services/api.service";


@NgModule({
    imports: [
        CommonModule,
        RouterModule.forChild(AuthenticationRoutes),
        FormsModule,
        ReactiveFormsModule,

    ],
    declarations: [
        SigninComponent,
        SignupComponent,
        ForgotComponent,
        LockscreenComponent
    ],
    providers: [
        AuthService,
        TokenService,
        AfterLoginService,
        BeforeLoginService,
        InvoiceService,
        SessionStorageService,
        ApiService,
    ]
})

export class AuthenticationModule {
}
