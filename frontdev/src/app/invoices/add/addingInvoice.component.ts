import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormBuilder, FormGroup, Validators, FormControl } from '@angular/forms';
import { CustomValidators } from 'ng2-validation';
import {InvoiceService} from "../../services/invoice/invoice.service";
import {TranslateService} from "@ngx-translate/core";
import {ApiService} from "../../services/api.service";

const password = new FormControl('', Validators.required);
const confirmPassword = new FormControl('', CustomValidators.equalTo(password));

@Component({
  selector: 'app-addingInvoice',
  templateUrl: './addingInvoice.component.html',
  styleUrls: ['./addingInvoice.component.scss']
})
export class AddingInvoiceComponent implements OnInit {

  public form: FormGroup;
    loader = false;
  constructor(private fb: FormBuilder,
              private router: Router,
              private invoiceService: InvoiceService,
              private apiService: ApiService,
              private translate: TranslateService) {}

  public error = null;
  public msg = null;

  public sites = [];
  public fileToUpload: File = null;
  public site: string = null;

  ngOnInit() {
      this.sites = this.apiService.getSites();
        this.form = this.fb.group( {
          uname: [null , Validators.compose ( [ Validators.required ] )],
          password: password,
          confirmPassword: confirmPassword
        } );
  }

  onSubmit() {
    this.router.navigate( ['/'] );
  }

  handleFileInput(files: FileList) {
      this.fileToUpload = files.item(0);
      console.log(this.fileToUpload);
  }

  uploadFileToActivity(fileToUpload) {
      console.log(fileToUpload);
      if(fileToUpload != 'undefined' && fileToUpload != null){
          this.loader = true;
          this.invoiceService.postFile(fileToUpload).subscribe(data => {
              if(data != 'undefined' && data != null){
                  // do something, if upload success
                  if(data.success) {
                      this.msg = data.message;
                      this.error = null;
                  }
                  else {
                      this.error = data.message;
                      this.msg = null;
                  }
              }
              else
                  this.error = 'Please check data or type of your file';

              this.loader = false;
          }, error => {
              this.error = error.message;
              if(error.status === 401){
                  localStorage.clear();
                  this.router.navigateByUrl('/authentication/signin');
              }
              this.loader = false;
          });
      }else
          this.error = 'No file was uploaded'


  }

    public handleRefusalToSubmit(dismissMethod: string): void {
        // dismissMethod can be 'cancel', 'overlay', 'close', and 'timer'
        console.log(dismissMethod);
    }

}
