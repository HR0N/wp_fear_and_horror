class Class_Father {
    constructor($, elem) {
        this.elem = $(elem);
        this.state = {};
        this.ajax = new Ajax($);
    }
    find(selector){
        return this.elem.find(selector);
    }
}