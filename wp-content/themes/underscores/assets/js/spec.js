(function($){
    $(document).ready(()=>{
        class SpecClass extends Class_Father{
            constructor(elem) {
                super($, elem);
                this.contacts = this.find('.contract');
                this.btn_open_modals = this.find('.open-modal');
                this.modal_window = this.find('.modal');
                this.elem = $(elem);
                this.events();
            }

            events(){
                this.btn_open_modals.on('click', ()=>{this.modal_window.fadeIn(400)});
                this.modal_window.find('.buttons .btn').on('click', ()=>{
                    this.modal_window.fadeOut(400);
                });
            };
        }
        let my_account = new SpecClass('.spec');
    });
})(jQuery);