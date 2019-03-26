import {Injectable} from '@angular/core';

export interface BadgeItem {
    type: string;
    value: string;
}

export interface ChildrenItems {
    state: string;
    name: string;
    type?: string;
}

export interface Menu {
    state: string;
    name: string;
    type: string;
    icon: string;
    badge?: BadgeItem[];
    children?: ChildrenItems[];
}

const MENUITEMS = [
    {
        state: 'invoices',
        name: 'INVOICES',
        type: 'sub',
        icon: 'ecommerce-dollar',
        children: [
            {
                state: 'list',
                name: 'LIST'
            },
            {
                state: 'importfile',
                name: 'IMPORT_FILE'
            },
        ]
    }/*,
    {
        state: 'docs',
        name: 'DOCS',
        type: 'link',
        icon: 'basic-sheet-txt'
    }*/
];

@Injectable()
export class MenuService {
    getAll(): Menu[] {
        return MENUITEMS;
    }
}
