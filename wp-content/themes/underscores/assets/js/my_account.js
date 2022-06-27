(function($){
    $(document).ready(()=>{
        class MyAccountClass extends Class_Father{
            constructor(elem) {
                super($, elem);
                this.elem = $(elem);
                this.display_wallet = this.find('.wallets__wallet');
                this.events();
            }

            events(){
                this.display_wallet.html(this.cur_user[2] +' $');
            };
        }
        let my_account = new MyAccountClass('.my_account');
    });
})(jQuery);