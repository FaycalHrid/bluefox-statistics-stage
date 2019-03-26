import {Component, EventEmitter, Output, Input, OnInit,} from '@angular/core';
import {Router} from "@angular/router";

import {TokenService} from "../../services/authentication/token.service";
import {SessionStorageService} from "../../services/sessionStorage/sessionStorage.service";
import {ApiService} from "../../services/api.service";

@Component({
    selector: 'app-header',
    templateUrl: './header.component.html',
    styleUrls: ['./header.component.scss'],
    providers: [TokenService, SessionStorageService, ApiService]
})
export class HeaderComponent implements OnInit {

    public loggedIn: boolean;
    public user = {
        email: "",
        firstName: "",
        lastName: "",
    };
    public currentSite = {
        site: "",
        title: "",
        lang: "",
    };
    private listSession = [];
    private newSession = {
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
    public sites = [];
    constructor(private router: Router, private token: TokenService,private sessionStorage: SessionStorageService,private apiService: ApiService,){

    }
    ngOnInit() {
        this.token.authStatus.subscribe(value => this.loggedIn = value);
        if(JSON.parse(this.sessionStorage.getData('user')) != null)
           this.user = JSON.parse(this.sessionStorage.getData('user'));
        if(JSON.parse(this.sessionStorage.getData('currentSite')) != null)
            this.currentSite = JSON.parse(this.sessionStorage.getData('currentSite'));
        this.sites = this.apiService.getSites();
    }

    logout(event: MouseEvent) {
        event.preventDefault();
        localStorage.clear();
        this.token.changeAuthStatus(false);
        this.router.navigateByUrl('/authentication/signin');
    }
    changeSession(site) {
        if(JSON.parse(this.sessionStorage.getData('listSession')) != null){
            this.listSession = JSON.parse(this.sessionStorage.getData('listSession'));
            for(var i=0; i<this.listSession.length;i++){
                if(this.listSession[i].index == site.site){
                    this.token.set(this.listSession[i].token);
                    this.sessionStorage.setData('user',JSON.stringify(this.listSession[i].user));
                    this.sessionStorage.setData('currentSite',JSON.stringify(this.listSession[i].currentSite));
                    this.router.navigateByUrl('/invoices/list');
                }
            }
            this.router.navigateByUrl('/authentication/signin');
        }
        this.router.navigateByUrl('/authentication/signin');
    }
    notification(event: MouseEvent) {
        event.preventDefault();
        this.router.navigateByUrl('/notification/list');
    }

    @Input() heading: string;
    @Output() toggleSidebar = new EventEmitter<void>();
    @Output() openSearch = new EventEmitter<void>();
    @Output() toggleFullscreen = new EventEmitter<void>();



}
