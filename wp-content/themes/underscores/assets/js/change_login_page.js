(function($){
    $(document).ready(()=>{
        class Login_page extends Class_Father{
            constructor(elem) {
                super($, elem);
                this.woocommerce = this.find('.woocommerce');
                this.u_columns = this.woocommerce.find('.u-columns.col2-set');
                this.u_column_1 = this.woocommerce.find('.u-column1.col-1');
                this.u_column_2 = this.woocommerce.find('.u-column2.col-2');
                this.woocommerce_password_strength = this.find('.woocommerce-password-strength');
                this.events();
            }
            apply_settings(){
                if(!this.cur_user){
                    this.woocommerce.css({'gridTemplate': '1fr / 1fr'});
                    this.u_columns.removeClass('col2-set');
                    this.u_columns.css({
                        'display': 'grid',
                        'gridTemplate': 'repeat(2, auto) / 1fr',
                        'padding': '0px 6px',
                    });
                    this.u_column_1.css({
                        'width': '100%',
                        'max-width': '600px',
                        'display': 'grid',
                        'margin': '100px auto',
                    });
                    this.u_column_2.css({
                        'width': '100%',
                        'max-width': '600px',
                        'display': 'grid',
                        'margin': '100px auto',
                    });
                    this.woocommerce_password_strength.removeClass('woocommerce-password-strength');
                    console.log(this.u_columns);
                }
            }

            events(){
                this.apply_settings();
            };
        }
        new Login_page('body');
    });
})(jQuery);