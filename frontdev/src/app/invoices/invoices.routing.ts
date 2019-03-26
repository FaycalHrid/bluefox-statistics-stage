import { Routes } from '@angular/router';

import {ListInvoiceComponent} from "./list/listInvoice.component";
import {AddingInvoiceComponent} from "./add/addingInvoice.component";

export const InvoicesRoutes: Routes = [
  {
    path: '',
    children: [{
      path: 'importfile',
      component: AddingInvoiceComponent
    },{
      path: 'list',
      component: ListInvoiceComponent
    }, ],
  }
];
