import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {ApiService} from "../api.service";

@Injectable()
export class AuthService {
  private response;
  constructor(private http: HttpClient, private apiService: ApiService) { }

  signup(data) {
    this.response = this.http.post(this.apiService.getBaseUrl() + '/register', data);
    console.log(this.response);
    return this.response;
  }

  login(data) {
    return this.http.post(this.apiService.getBaseUrl() + `/login`, data);
  }

  sendPasswordResetLink(data) {
    return this.http.post(this.apiService.getBaseUrl() + `/sendPasswordResetLink`, data);
  }

  changePassword(data) {
    return this.http.post(this.apiService.getBaseUrl() + `/resetPassword`, data);
  }

}
