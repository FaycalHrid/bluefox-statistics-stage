import { Injectable } from '@angular/core';

import {TokenService} from './token.service';
import {Observable} from 'rxjs/Observable';
import {ActivatedRouteSnapshot, CanActivate, RouterStateSnapshot} from '@angular/router';

@Injectable()
export class AfterLoginService implements CanActivate {

  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean | Observable<boolean> | Promise<boolean> {
    return this.token.loggedIn();
  }
  constructor(
      private token: TokenService,
  ) { }

}
