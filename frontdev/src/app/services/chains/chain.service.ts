import { Injectable } from '@angular/core';
import {TokenService} from '../authentication/token.service';
import {HttpClient} from '@angular/common/http';
import {ApiService} from "../api.service";
import {SessionStorageService} from "../sessionStorage/sessionStorage.service";

@Injectable()
export class ChainService {
    public token : string;
    public currentSite = {
        site: "",
        title: "",
        lang: "",
    };

    constructor(private http: HttpClient, private tokenService: TokenService, private  apiService: ApiService, private  sessionStorage: SessionStorageService,) {
    }
    getAllChains() {
        if(JSON.parse(this.sessionStorage.getData('currentSite')) != null)
            this.currentSite = JSON.parse(this.sessionStorage.getData('currentSite'));
        return this.http.get(this.apiService.getBaseUrl() + '/chains?site='+this.currentSite.site+'&token=' + this.tokenService.get());
    }

}
