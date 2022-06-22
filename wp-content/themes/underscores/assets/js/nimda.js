(function($){
    $(document).ready(()=>{
        class Nimda extends Class_Father{
            constructor(elem) {
                super($, elem);
                this.elem = $(elem);
                this.select_user = this.find('.select-user');
                this.events();
            }

            events(){
                this.select_user.on('change', (e)=>{console.log($(e.target).val());});
            };
        }
        let nimda = new Nimda('.nimda');
    });
})(jQuery);