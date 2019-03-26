import { Injectable } from '@angular/core';
import {TokenService} from '../authentication/token.service';
import {HttpClient} from '@angular/common/http';
import {ApiService} from "../api.service";
import {Invoice} from "../../models/invoice.model";
import {SessionStorageService} from "../sessionStorage/sessionStorage.service";

@Injectable()
export class InvoiceService {
    public token : string;
    public currentSite = {
        site: "",
        title: "",
        lang: "",
    };

    constructor(private http: HttpClient, private tokenService: TokenService, private  apiService: ApiService, private  sessionStorage: SessionStorageService) {
    }

    getAllInvoices() {
        if(JSON.parse(this.sessionStorage.getData('currentSite')) != null)
            this.currentSite = JSON.parse(this.sessionStorage.getData('currentSite'));
        return this.http.get(this.apiService.getBaseUrl() + '/invoices?site='+this.currentSite.site+'&token=' + this.tokenService.get());
    }

    submitInvoice(idInvoice) {
        if(JSON.parse(this.sessionStorage.getData('currentSite')) != null)
            this.currentSite = JSON.parse(this.sessionStorage.getData('currentSite'));
        return this.http.get(this.apiService.getBaseUrl() + '/submit/' +idInvoice+ '?site='+this.currentSite.site+'&token=' + this.tokenService.get());
    }
    getAllInvoicesByFilter(data) {
        if(JSON.parse(this.sessionStorage.getData('currentSite')) != null)
            this.currentSite = JSON.parse(this.sessionStorage.getData('currentSite'));
        let filter = ''
        if(data.from !== undefined)
            filter += '&from='+data.from;
        if(data.to !== undefined)
            filter += '&to='+data.to;
        if(data.status !== undefined)
            filter += '&status='+data.status;
        if(data.email !== undefined)
            filter += '&email='+data.email;
        if(data.chain !== undefined)
            filter += '&chain='+data.chain;
        filter += '&site='+this.currentSite.site;
        return this.http.get(this.apiService.getBaseUrl() + '/invoices?token=' + this.tokenService.get() + filter);
    }

    postFile(fileToUpload: File) {
        let token = this.tokenService.get();
        if(JSON.parse(this.sessionStorage.getData('currentSite')) != null)
            this.currentSite = JSON.parse(this.sessionStorage.getData('currentSite'));
        const formData: FormData = new FormData();
        formData.append('fileKey', fileToUpload, fileToUpload.name);
        let response = this.http.post<any>(this.apiService.getBaseUrl() + '/uploadFile?site='+this.currentSite.site+'&token='+token, formData);
        return response;
    }
    getInvoice(id:String) {
        return this.http.get(this.apiService.getBaseUrl() + `/invoices/${id}/`);
    }

    deleteInvoice(id:String){
        return this.http.delete(this.apiService.getBaseUrl() + `/invoices/${id}/`);
    }

    editInvoice(invoice:Invoice){
        return this.http.put(this.apiService.getBaseUrl() + `/invoices/${invoice.id}?token=` + this.tokenService.get(),invoice);
    }

}
