import {Component, OnInit,} from '@angular/core';
import {TranslateService} from '@ngx-translate/core';
import {TokenService} from "./services/authentication/token.service";
import {Router} from "@angular/router";

@Component({
    selector: 'app-root',
    template: '<router-outlet></router-outlet>'
})
export class AppComponent {

    constructor(translate: TranslateService, ) {
        translate.addLangs(['en', 'fr']);
        translate.setDefaultLang('en');


        const browserLang: string = translate.getBrowserLang();
        translate.use(browserLang.match(/en|fr/) ? browserLang : 'en');
    }


}
