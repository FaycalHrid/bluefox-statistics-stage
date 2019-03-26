import {Component, OnInit} from '@angular/core';
import {Router} from '@angular/router';
import {AuthService} from '../../services/authentication/auth.service';
import {TokenService} from '../../services/authentication/token.service';
import {SessionStorageService} from "../../services/sessionStorage/sessionStorage.service";
import {ApiService} from "../../services/api.service";

@Component({
    selector: 'app-signin',
    templateUrl: './signin.component.html',
    styleUrls: ['./signin.component.scss']
})
export class SigninComponent implements OnInit {

    public user = {
        email: null,
        password: null,
        site: null,
    };
    public sites = [];
    public listSession = [];
    public newSession = {
        index: null,
        user : {
            email: null,
            password: null,
            site: null,
        },
        token: null,
        site: {
            site: null,
            title: null,
            lang: null,
        }
    }
    public error = null;

    constructor(
        private router: Router,
        private Auth: AuthService,
        private token: TokenService,
        private sessionStorage: SessionStorageService,
        private apiService: ApiService,
    ) {
    }

    ngOnInit() {
        this.sites = this.apiService.getSites();
    }

    onSubmit() {
        this.Auth.login(this.user).subscribe(
            data => this.handleResponse(data),
            error => this.handleError(error)
        );
    }

    handleResponse(data) {
        this.token.set(data.token);
        this.sessionStorage.setData('user',JSON.stringify(data.user));
        this.sessionStorage.setData('currentSite',JSON.stringify(data.currentSite));
        this.token.changeAuthStatus(true);
        /*
        if(JSON.parse(this.sessionStorage.getData('listSession')) != null){
            this.listSession = JSON.parse(this.sessionStorage.getData('listSession'));

            for(let i=0; i<this.listSession.length;i++){
                if(this.listSession[i].index == data.currentSite.site){
                    this.listSession.slice(i,1);
                }
            }
            this.newSession.index = data.currentSite.site;
            this.newSession.site = data.currentSite;
            this.newSession.token = data.token;
            this.newSession.user = data.user;
            this.listSession.push(this.newSession);
            this.sessionStorage.setData('listSession',JSON.stringify(this.listSession));
        }
        else {
            this.newSession.index = data.currentSite.site;
            this.newSession.site = data.currentSite;
            this.newSession.token = data.token;
            this.newSession.user = data.user;
            this.listSession.push(this.newSession);
            this.sessionStorage.setData('listSession',JSON.stringify(this.listSession));
        }
        */
        this.router.navigateByUrl('/invoices/list');
    }

    handleError(error) {
        this.error = error.error.message;
        console.log(error);
    }

}
