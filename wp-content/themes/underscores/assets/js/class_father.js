class Class_Father {
    constructor($, elem) {
        this.elem = $(elem);
        this.data = $(document).find('div.data');
        this.cur_user = this.data.data('curuser');
        this.state = {};
        this.ajax = new Ajax($);
    }
    find(selector){
        return this.elem.find(selector);
    }
}