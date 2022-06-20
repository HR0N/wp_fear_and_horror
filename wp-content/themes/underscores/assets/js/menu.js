class Menu extends Class_Father{
    constructor(elem) {
        super(elem);
        this.elem = $(elem);
        this.buttons = this.find('.button');
        this.ul_list = this.find('.header-nav');

        this.events();
    }
    toggle_buttons(){
        this.buttons.map((idx, val) => {
            $(val).hasClass('show') ? $(val).removeClass('show') : $(val).addClass('show');
        });
    }
    toggle_menu(){
        this.ul_list.hasClass('show') ? this.ul_list.removeClass('show') : this.ul_list.addClass('show');
    }

    events(){
        this.buttons.on('click', this.toggle_buttons.bind(this));
        this.buttons.on('click', this.toggle_menu.bind(this));
    };
}