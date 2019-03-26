import { Injectable } from '@angular/core';
import {BehaviorSubject} from 'rxjs/BehaviorSubject';

@Injectable()
export class TokenService {
  private iss = {
    login: 'http://bfkpi.online/api/login',
    signup: 'http://bfkpi.online/api/register'
      // login: 'http://localhost:8000/api/login',
      // signup: 'http://localhost:8000/api/register'
  };
  private logged = new BehaviorSubject <boolean>(this.loggedIn());
  authStatus = this.logged.asObservable();

  changeAuthStatus(value: boolean) {
    this.logged.next(value);
  }

  constructor() {
  }

  handle(token) {
    this.set(token);
  }

  set(token) {
    localStorage.setItem('token', token);
  }

  get() {
    return localStorage.getItem('token');
  }

  remove() {
    localStorage.removeItem('token');
  }

  isValid() {
    const token = this.get();
    if (token) {
      const payload = this.payload(token);
      if (payload) {
        return Object.values(this.iss).indexOf(payload.iss) > -1 ? true : false;
      }
    }
    return false;
  }

  payload(token) {
    const payload = token.split('.')[1];
    return this.decode(payload);
  }

  decode(payload) {
    return JSON.parse(atob(payload));
  }

  loggedIn() {
    return this.isValid();
  }
}