import {Injectable} from '@angular/core';

@Injectable()
export class ApiService {
    //private baseUrl = 'http://localhost:8000/api';
    private baseUrl = 'https://bfkpi.online/api';
    //
    public sites = [
        {site: 'id_bluefox', title: 'BlueFox ID', lang: 'id',},
        {site: 'my_bluefox', title: 'BlueFox MY', lang: 'my',},
    ];

    constructor() {
    }

    getBaseUrl() {
        return this.baseUrl;
    }

    getSites() {
        return this.sites;
    }

}
