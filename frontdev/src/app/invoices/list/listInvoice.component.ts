import {Component, OnInit, ViewChild} from '@angular/core';
import { TranslateService } from '@ngx-translate/core';
import {Router} from '@angular/router';

import {InvoiceService} from "../../services/invoice/invoice.service";
import {ChainService} from "../../services/chains/chain.service";
import {Chain} from "../../models/chain.model";
import {NgbActiveModal, NgbModal} from "@ng-bootstrap/ng-bootstrap";
import {BeforeOpenEvent, SwalComponent} from "@toverux/ngx-sweetalert2";
import {ApiService} from "../../services/api.service";
import {SessionStorageService} from "../../services/sessionStorage/sessionStorage.service";

@Component({
  selector: 'app-addingInvoice',
  templateUrl: './listInvoice.component.html',
  styleUrls: ['./listInvoice.component.scss'],

    providers: [NgbModal]
})


export class ListInvoiceComponent implements OnInit {

    public sites = [];
    isToggle = [];
    isCollapsed = false;
    invoices =[];
    loader = false;
    chains: Chain[];
    public currentSite = {
        site: "",
        title: "",
        lang: "",
    };

    first_page_url = "";
    from = 0;
    last_page = 1;
    last_page_url = "#";
    next_page_url = "#";
    path = "#";
    per_page = 0;
    prev_page_url = null;
    to = 0;
    total = 0;
    public error = null;
    public form = {
        from: null,
        to: null,
        email: null,
        chain: null,
        status: null,
        site: null,
    };
    constructor(
        private router: Router,
        private invoiceService: InvoiceService,
        private translate: TranslateService,
        private chainService: ChainService,
        private apiService: ApiService,
        private modalService: NgbModal,
    )
    {
        this.loadInvoices();
        this.loadChains();
    }
    loadInvoices(){
        this.loader = true;
        this.invoiceService.getAllInvoices().subscribe(
            data => {
                this.handleResponse(data);
                this.loader = false;

            },
            error => {
                this.handleError(error);
                this.loader = false;
            }
        );
    }
    loadChains(){
        this.chainService.getAllChains().subscribe(
            data => {
                this.chains = data['result'];
            },
            error => {
                this.handleError(error);
            }
        );
    }
    toggle(index){
            this.isToggle[index] = !this.isToggle[index];
    }

    getColor(status){
        switch (status) {
            case 'Waiting':
                return '#D9B600';
            case 'Submitted':
                return '#F2F2F2';
            case 'Delivered':
                return '#00C853';
        }
    }

    open(content) {
        this.modalService.open(content);
    }


    public handleRefusalToSubmit(dismissMethod: string): void {
        // dismissMethod can be 'cancel', 'overlay', 'close', and 'timer'
        console.log(dismissMethod);
    }

    toggleAll(isCollapsed){
        if(this.invoices.length>0){
            for(let i=0;i<this.invoices.length;i++) {
                if(isCollapsed == true){
                    this.isToggle[this.invoices[i].refInterne] = false;
                    this.isCollapsed = false
                }else{
                    this.isToggle[this.invoices[i].refInterne] = true;
                    this.isCollapsed = true;
                }
            }
        }
    }

    submitInvoice(idInvoice, invoice){

        this.loader = true;
        this.invoiceService.submitInvoice(idInvoice).subscribe(
            data => {
                console.log('deliveryStatus', invoice.deliveryStatus)
                console.log('data', data)
                invoice.deliveryStatus = 1;
                for(let i=0;i<this.invoices.length;i++)
                    this.isToggle[this.invoices[i].refInterne] = false;
                this.loader = false;
            },
            error => {
                if(error.status === 401){
                    localStorage.clear();
                    this.router.navigateByUrl('/authentication/signin');
                    console.log(error.statusText);
                }
                this.error = error.error.statusText;
                this.loader = false;
            }

        );

        /*
        if(data && data != null)
            this.loadInvoiceByFilter(data);
        else
        {
            this.invoiceService.getAllInvoices().subscribe(
                data => this.handleResponse(data),
                error => this.handleError(error)
            );
            this.chainService.getAllChains().subscribe(
                data => {
                    this.chains = data['result'];
                }
            );
        }
        */
    }
    loadInvoiceByFilter(data){
        this.loader = true;
        this.invoiceService.getAllInvoicesByFilter(data).subscribe(
            data => {
                console.log(data);
                this.invoices = data['result'];
                for(let i=0;i<this.invoices.length;i++)
                    this.isToggle[this.invoices[i].refInterne] = false;
                this.loader = false;
            },
            error => {
                if(error.status === 401){
                    localStorage.clear();
                    this.router.navigateByUrl('/authentication/signin');
                    console.log(error.statusText);
                }
                this.error = error.error.statusText;
                this.loader = false;
            }
        );
    }

    handleResponse(data) {
        this.invoices = data.result;
        for(let i=0;i<this.invoices.length;i++)
            this.isToggle[this.invoices[i].refInterne] = false;

    }
    handleError(error) {
        if(error.status === 401){
            localStorage.clear();
            this.router.navigateByUrl('/authentication/signin');
            console.log(error.statusText);
        }
        this.error = error.error.statusText;
    }


    ngOnInit() {
        let now  = new Date().toISOString().split('T')[0];
        let tab  = now.split('-');
        this.form.from = tab[0]+'-'+tab[1]+'-01';
        this.form.to = now;
        this.sites = this.apiService.getSites();
        /*
        setTimeout(() => {
           window.location.reload();
            //this.loadInvoiceByFilter(this.form);
        }, 60000);
        */
    }
}
