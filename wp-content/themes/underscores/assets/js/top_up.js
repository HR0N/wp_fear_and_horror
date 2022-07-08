(function($){
    $(document).ready(()=>{
        class TopUpClass extends Class_Father{
            constructor(elem) {
                super($, elem);
                this.select_wallets = this.find('#wallets');
                this.requisites = this.find('.top_up__main_requisites');
                this.btn_send_request = this.find('.send_request');

                this.events();
            }
            change_requisites(){
                this.requisites.html(this.select_wallets.val());
            }
            send_request(){
                let type = 'GET';
                let url = `${window.location.origin}/request-top-up`;
                let data = {
                    user: parseInt(this.cur_user[0]),
                    requisites: this.select_wallets.val(),
                    amount: parseInt(this.find('#amount').val())};
                this.ajax.insert_data(type, url, data);
                setTimeout(()=>{location.reload();}, 200);
            }

            events(){
                this.select_wallets.on('change', this.change_requisites.bind(this));
                this.btn_send_request.on('click', this.send_request.bind(this));
            };
        }
        new TopUpClass('.top_up');
    });
})(jQuery);