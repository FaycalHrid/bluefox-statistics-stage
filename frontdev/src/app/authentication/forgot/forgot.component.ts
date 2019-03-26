import { Component, OnInit } from '@angular/core';

import {AuthService} from "../../services/authentication/auth.service";

@Component({
  selector: 'app-forgot',
  templateUrl: './forgot.component.html',
  styleUrls: ['./forgot.component.scss']
})
export class ForgotComponent implements OnInit {

    public form = {
        email: null
    };


    constructor(
        private Auth: AuthService,
    ) { }

    ngOnInit() {
    }


    onSubmit() {
        // this.Notfiy.info('Wait...' ,{timeout:5000})
        this.Auth.sendPasswordResetLink(this.form).subscribe(
            data => this.handleResponse(data),
            error => error.error.error //this.notify.error(error.error.error)
        );
    }

    handleResponse(res) {
        console.log(res.data);
        //this.Notfiy.success(res.data,{timeout:0});
        this.form.email = null;
    }
}
