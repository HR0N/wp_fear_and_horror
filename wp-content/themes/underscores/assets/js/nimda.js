(function($){
    $(document).ready(()=>{
        class Nimda extends Class_Father{
            constructor(elem) {
                super($, elem);
                this.elem = $(elem);
                this.select_user = this.find('.select-user');
                this.data = $('div.data').data('bills');
                this.events();
            }

            events(){
                console.log(this.data);
                this.select_user.on('change', (e)=>{console.log($(e.target).val());});
            };
        }
        let nimda = new Nimda('.nimda');
    });
})(jQuery);