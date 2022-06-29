(function($){
    $(document).ready(()=>{
        class OfferingClass extends Class_Father{
            constructor(elem) {
                super($, elem);
                this.html_contracts = this.find('.contract');
                this.btn_open_modals = this.find('.open-modal');
                this.modal_window = this.find('.modal');
                this.html_user_bill = this.find('.modal__main .bill__bill');
                this.contract_amount = this.find('.contract_amount');
                this.cur_contract = null;
                this.cur_contract_ar = null;
                this.cur_deposit_ammount = null;
                // this.cur_click_contract = null;

                this.interface1 = this.find('.interface1');
                this.interface2 = this.find('.interface2');

                this.elem = $(elem);
                this.check_existing_contracts();
                this.events();
                this.render();
            }
            fill_modal(e){
                let id = $(e.target).data('id');
                this.cur_contract = id;
                if($(e.target).attr('contractid')){this.cur_contract_ar = $(e.target).attr('contractid').split(',');}
                let contract = this.contracts_info.offers[id];
                let deposit_diapason = this.find('.deposit_diapason')
                    .html(`${contract.deposit_diapason[0]} - ${contract.deposit_diapason[1]} $`);
                let income_diapason = this.find('.income_diapason')
                    .html(`${contract.income}% / день`);
                this.cur_contracts.map((v, k)=>{
                    this.find('.interface2__bill_amount span').html(v[3]);
                    this.find('.interface2__bill_income span').html(v[4]);
                });
            }
            deposit_contract(e){
                $(e.target)[0].disabled = true;
                setTimeout(()=>{$(e.target)[0].disabled = true;}, 500);
                let exist = false;
                let new_bill = this.cur_user[2] - this.cur_deposit_ammount;
                this.cur_contracts.map((k, v)=>{
                    if(k[2] == this.cur_contract){exist = true}
                });
                let amount_diapason = this.contracts_info.offers[this.cur_contract].deposit_diapason;
                if(!exist && this.cur_deposit_ammount >= amount_diapason[0]
                    && this.cur_deposit_ammount <= amount_diapason[1]){
                    let type = 'GET',
                        url = `${window.location.origin}/deposit-contract`,
                        data = {
                            user: this.cur_user[0],
                            contract: this.cur_contract,
                            amount: this.cur_deposit_ammount,
                            end: this.sTime()[1],
                            new_bill: new_bill};
                    this.ajax.insert_data(type, url, data);
                    console.log('%c' + ' ' + '"ok. i did it for you...' + ' ', 'background: #222; color: #bada55');
                    setTimeout(()=>{location.reload();}, 300)
                }else{
                    console.log('%c' + ' ' + 'contract with this id already exists.' + ' ',
                        'background: #222; color: #ffa3af');
                }
            }
            pull_off_contract(e){
                $(e.target)[0].disabled = true;
                setTimeout(()=>{$(e.target)[0].disabled = true;}, 500);
                let new_bill = parseInt(this.cur_user[2]) +
                    (parseInt(this.cur_contract_ar[3]) + parseInt(this.cur_contract_ar[4]));
                let type = 'GET',
                    url = `${window.location.origin}/pull_off_contract`,
                    data = {
                        user: this.cur_user[0],
                        contract_id: this.cur_contract_ar[0],
                        new_bill: new_bill};
                this.ajax.insert_data(type, url, data);
                setTimeout(()=>{location.reload();}, 300)
            }
            check_existing_contracts(){
                this.html_contracts.map((k, v)=>{
                    this.cur_contracts.map((k2, v2)=>{
                        if($(v).find('.open-modal').data('id') == k2[2]){
                            $(v).addClass('contract-active');
                            $(v).find('.open-modal').html('СНЯТЬ');
                            $(v).find('.open-modal').attr('contractid', k2);
                            $(v).find('.contract__ifActive.amount span').html(k2[3] + '$');
                            $(v).find('.contract__ifActive.income span').html(k2[4]);
                        }
                    });
                });
            }

            events(){
                $(this.html_user_bill).html(this.cur_user[2] + ' $');
                this.btn_open_modals.on('click', (e)=>{
                    this.fill_modal(e);
                    let is_active = $(e.currentTarget).parent().parent().hasClass('contract-active');
                    if(!is_active){this.interface1.css({display: 'inline-grid'})}
                    if(is_active){this.interface2.css({display: 'inline-grid'})}
                    this.modal_window.fadeIn(400);
                });
                this.modal_window.find('.buttons .close').on('click', ()=>{
                    this.modal_window.fadeOut(400);
                    this.interface1.css({display: 'none'});
                    this.interface2.css({display: 'none'});
                });
                this.find('.btn.deposit').on('click', this.deposit_contract.bind(this));
                this.find('.btn.pull_off').on('click', this.pull_off_contract.bind(this));
            };
            render(){
                this.contract_amount.on('change', (e)=>{
                    if(parseInt($(e.target).val()) > parseInt(this.cur_user[2])){
                        this.contract_amount.val(this.cur_user[2]);}
                    if(parseInt($(e.target).val()) < 0){this.contract_amount.val(0)}
                    this.cur_deposit_ammount = $(e.target).val();
                });
            }
        }
        let my_account = new OfferingClass('.offering');
    });
})(jQuery);