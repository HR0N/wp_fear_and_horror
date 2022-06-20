class Class_Father {
    constructor(elem) {
        this.elem = $(elem);
        this.state = {};
    }
    find(selector){
        return this.elem.find(selector);
    }
}