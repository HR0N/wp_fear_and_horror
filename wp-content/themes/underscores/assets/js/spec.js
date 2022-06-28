(function($){
    $(document).ready(()=>{
        class SpecClass extends Class_Father{
            constructor(elem) {
                super($, elem);
                this.contacts = this.find('.contract');
                this.btn_open_modals = this.find('.open-modal');
                this.modal_window = this.find('.modal');
                this.html_user_bill = this.find('.modal__main .bill__bill');
                this.contract_amount = this.find('.contract_amount');
                this.cur_contract = null;
                this.cur_deposit_ammount = null;

                this.cur_click_contract = null;
                this.elem = $(elem);
                this.events();
                this.render();
            }
            fill_modal(e){
                let id = $(e.target).data('id');
                this.cur_contract = id;
                let contract = this.contracts_info.spec[id];
                let deposit_diapason = this.find('.deposit_diapason')
                    .html(`${contract.deposit_diapason[0]} - ${contract.deposit_diapason[1]} $`);
                let income_diapason = this.find('.income_diapason')
                    .html(`${contract.income_diapason[0]} - ${contract.income_diapason[1]} %/день`);
                let time_space = this.find('.time_space')
                    .html(this.sTime()[0]);
            }
            deposit_contract(){
                console.log('start');
                let type = 'GET',
                    url = `${window.location.origin}/deposit-contract`,
                    data = {
                        user: this.cur_user[0],
                        contract: this.cur_contract,
                        amount: this.cur_deposit_ammount,
                        end: this.sTime()[1]};
                this.ajax.insert_data(type, url, data);
            }

            events(){
                $(this.html_user_bill).html(this.cur_user[2] + ' $');
                this.btn_open_modals.on('click', (e)=>{
                    this.fill_modal(e);
                    this.modal_window.fadeIn(400);
                });
                this.modal_window.find('.buttons .close').on('click', ()=>{
                    this.modal_window.fadeOut(400);
                });
                this.find('.btn.deposit').on('click', this.deposit_contract.bind(this));
            };
            render(){
                this.contract_amount.on('change', (e)=>{
                    if($(e.target).val() > this.cur_user[2]){
                    this.contract_amount.val(this.cur_user[2]);}
                    if($(e.target).val() < 0){this.contract_amount.val(0)}
                    this.cur_deposit_ammount = $(e.target).val();
                });
            }
        }
        let my_account = new SpecClass('.spec');
    });
})(jQuery);