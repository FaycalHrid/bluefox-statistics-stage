import { Injectable } from '@angular/core';

@Injectable()
export class SessionStorageService {
  constructor() { }


  setData(key, value) {
    localStorage.setItem(key, value);
  }

  getData(key) {
    return localStorage.getItem(key);
  }

  removeData(key) {
    localStorage.removeIte(key);
  }

}