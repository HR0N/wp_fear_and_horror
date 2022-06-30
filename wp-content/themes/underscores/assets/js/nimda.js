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
                this.requests_top_up = this.find('.payment-requests__top-up');
                this.requests_withdraw = this.find('.payment-requests__withdraw');


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
            fill_topup_reqs(){
                this.topup_reqs.map((v, k)=>{
                    this.requests_top_up.append(
                        "<div class=\"payment-requests__top-up_request\">\n" +
                        "<div class=\"name\">"+this.get_username(v[1])+"</div>\n" +
                        "<div class=\"requisites\">"+v[2]+"</div>\n" +
                        "<div class=\"amount\">"+v[3]+"</div>\n" +
                        "<div class=\"processed\"><div class=\"btn btn-outline-dark btn-del\" data-id="+v[0]+">Выполнено</div></div>\n" +
                        "</div>"
                    );
                });
            }
            fill_withdraw_reqs(){
                this.withdraw_reqs.map((v, k)=>{
                    this.requests_withdraw.append(
                        "<div class=\"payment-requests__withdraw_request\">\n" +
                        "<div class=\"name\">"+this.get_username(v[1])+"</div>\n" +
                        "<div class=\"requisites\">"+v[2]+"</div>\n" +
                        "<div class=\"amount\">"+v[3]+"</div>\n" +
                        "<div class=\"processed\"><div class=\"btn btn-outline-dark btn-del2\" data-id="+v[0]+">Выполнено</div></div>\n" +
                        "</div>"
                    );
                });
            }
            delete_req_topup(e){
                let id = $(e.target).data('id');
                let type = 'GET';
                let url = `${window.location.origin}/req-del-top-up`;
                let data = {
                    reqid: id};
                this.ajax.insert_data(type, url, data);
                setTimeout(()=>{location.reload();}, 400);
            }
            delete_req_withdraw(e){
                let id = $(e.target).data('id');
                let type = 'GET';
                let url = `${window.location.origin}/del-withdraw`;
                let data = {
                    reqid: id};
                this.ajax.insert_data(type, url, data);
                setTimeout(()=>{location.reload();}, 400);
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
                this.fill_topup_reqs();
                this.fill_withdraw_reqs();
                this.find('.btn-del').on('click', this.delete_req_topup.bind(this));
                this.find('.btn-del2').on('click', this.delete_req_withdraw.bind(this));
            };
        }
        let nimda = new Nimda('.nimda');
    });
})(jQuery);