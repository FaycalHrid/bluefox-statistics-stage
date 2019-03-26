/** Module */
import {NgModule} from '@angular/core';
import {RouterModule} from '@angular/router';
import {CommonModule} from '@angular/common';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';

import {NgbModal} from "@ng-bootstrap/ng-bootstrap";
import {SnotifyModule, SnotifyService, ToastDefaults} from 'ng-snotify';
/** Component */
import {AddingInvoiceComponent} from "./add/addingInvoice.component";
import {ListInvoiceComponent} from "./list/listInvoice.component";
/** service */
import {TokenService} from "../services/authentication/token.service";
import {InvoiceService} from "../services/invoice/invoice.service";
/** route */
import {InvoicesRoutes} from "./invoices.routing";
import {ApiService} from "../services/api.service";
import {ChainService} from "../services/chains/chain.service";
import {SweetAlert2Module} from "@toverux/ngx-sweetalert2";
import {SessionStorageService} from "../services/sessionStorage/sessionStorage.service";



@NgModule({
    imports: [
        CommonModule,
        RouterModule.forChild(InvoicesRoutes),
        FormsModule,
        ReactiveFormsModule,
        SweetAlert2Module.forRoot(),

    ],
    declarations: [
        AddingInvoiceComponent,
        ListInvoiceComponent,
    ],
    providers: [
        TokenService,
        InvoiceService,
        ApiService,
        ChainService,
        SessionStorageService,

    ]
})

export class InvoicesModule {
}
