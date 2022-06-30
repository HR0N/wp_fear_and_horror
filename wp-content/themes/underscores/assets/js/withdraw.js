(function($){
    $(document).ready(()=>{
        class WithdrawClass extends Class_Father{
            constructor(elem) {
                super($, elem);
                this.bill = this.find('.withdraw__main_bill-bill');
                this.btn_withdraw = this.find('.btn-withdraw');

                this.events();
            }
            send_request(){
                let type = 'GET';
                let url = `${window.location.origin}/req-withdraw`;
                let data = {
                    user: this.cur_user[0],
                    requisites: this.find('.requisites').val(),
                    amount: this.find('#amount').val()};
                this.ajax.insert_data(type, url, data);
                setTimeout(()=>{location.reload();}, 200);
            }

            events(){
                this.bill.html(this.cur_user[2] + ' $');
                this.btn_withdraw.on('click', this.send_request.bind(this));
            };
        }
        new WithdrawClass('.withdraw');
    });
})(jQuery);