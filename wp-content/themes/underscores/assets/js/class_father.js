class Class_Father {
    constructor($, elem) {
        this.elem = $(elem);
        this.data = $(document).find('div.data');
        this.cur_user = this.data.data('curuser');
        this.cur_contracts = this.data.data('curcontracts');
        this.contracts_info = {
            spec: {
                1:{deposit_diapason: [1, 1099], income_diapason: [.9, 1.2]},
                2:{deposit_diapason: [100, 9999], income_diapason: [1.2, 1.45]},
                3:{deposit_diapason: [10000, 9999999], income_diapason: [1.8, 2.13]}},
            offers: {
                1:{deposit_diapason: [1, 99], income: .5},
                2:{deposit_diapason: [100, 499], income: .7},
                3:{deposit_diapason: [500, 999], income: .9},
                4:{deposit_diapason: [1000, 4999], income: 1.1},
                5:{deposit_diapason: [5000, 9999999], income: 1.3}}
        };
        this.state = {};
        this.ajax = new Ajax($);
    }
    sTime(){
        let ZNI = v => {if(v < 10){return '0'+v}else return v};
        let day = 1;
        let days = 7;
        let date = new Date(new Date().getTime() + (day * 24 * 60 * 60 * 1000));
        let last = new Date(date.getTime() + (days * 24 * 60 * 60 * 1000));
        let d = date.getDate();
        let dl = last.getDate();
        let m = date.getMonth() + 1;
        let ml = last.getMonth() + 1;
        let y = date.getFullYear();
        let yl = last.getFullYear();
        let start = `${ZNI(d)}.${ZNI(m)}.${ZNI(y)}`;
        let end = `${ZNI(dl)}.${ZNI(ml)}.${ZNI(yl)}`;
        return([`${start} - ${end}`, last.getTime()]);
    }
    find(selector){
        return this.elem.find(selector);
    }
}