(function($){
    $(document).ready(()=>{
        class Nimda extends Class_Father{
            constructor(elem) {
                super($, elem);
                this.elem = $(elem);
                this.select_user = this.find('.select-user__select');
                this.users = this.data.data('users');
                this.current_user = null;
                this.current_bill_html = this.find('.user-wallet__wallet input');
                this.bills = this.data.data('bills');
                this.button_change_bill = this.find('.change-bill');
                this.events();
            }
            create_options(){
                if(this.users){
                    this.users.map((v, k)=>{
                        $(this.select_user).append(`<option value='${v[0]}'>${v[3]}</option>`);
                    });
                }
            }
            change_bill_html(e){
                this.current_user = $(e.target).val();
                this.bills.map((v, k)=>{
                    let bill = `${v[2]}`;
                    if(v[1] === this.current_user){$(this.current_bill_html).val(bill)}
                });
            }
            change_bill(){
                let type = 'GET',
                    url = "https://wp.evilcode.space/do-not-delete-sql-update_bills/",
                    data = {user_id: this.current_user, value: $(this.current_bill_html).val()};
                this.ajax.insert_data(type, url, data);
                this.bills.map((v, k)=>{
                    if(v[1] === this.current_user){return v[2] = $(this.current_bill_html).val();}
                });
            }

            events(){
                this.create_options();
                this.select_user.on('change', this.change_bill_html.bind(this));
                this.button_change_bill.on('click', this.change_bill.bind(this));
            };
        }
        let nimda = new Nimda('.nimda');
    });
})(jQuery);