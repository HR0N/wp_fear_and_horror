(function($){
    $(document).ready(()=>{
        class Register_validation extends Class_Father{
            constructor(elem) {
                super($, elem);
                this.validator = validator;
                this.woocommerce = this.find('.woocommerce');
                this.u_columns = this.woocommerce.find('.u-columns.col2-set');
                this.u_column_1 = this.woocommerce.find('.u-column1.col-1');
                this.u_column_2 = this.woocommerce.find('.u-column2.col-2');
                this.col2_phone = this.u_column_2.find('input[name=billing_phone]');
                this.col2_username = this.u_column_2.find('input[name=username]');
                this.col2_email = this.u_column_2.find('input[name=email]');
                this.col2_password = this.u_column_2.find('input[name=password]');
                this.events();
            }
            validate_phone(e){
                if(!this.validator.isMobilePhone(e.target.value)){
                    $(e.target).parent().find('.required').css({'display':'block'});
                    $(e.target).parent().find('.required').html("Некорректный телефон");
                }else{
                    $(e.target).parent().find('.required').css({'display':'none'});
                }
            }
            validate_username(e){
                if(!this.validator.isLength(e.target.value, {min:2, max:20})){
                    $(e.target).parent().find('.required').css({'display':'block'});
                    $(e.target).parent().find('.required').html("От 2 до 20 символов.");
                }else{
                    $(e.target).parent().find('.required').css({'display':'none'});
                }
            }
            validate_email(e){
                if(!this.validator.isEmail(e.target.value)){
                    $(e.target).parent().find('.required').css({'display':'block'});
                    $(e.target).parent().find('.required').html("Некорректный email");
                }else{
                    $(e.target).parent().find('.required').css({'display':'none'});
                }
            }
            validate_password(e){
                if(!this.validator.isLength(e.target.value, {min:4, max:40})){
                    $(e.target).parent().parent().find('.required').css({'display':'block'});
                    $(e.target).parent().parent().find('.required').html("От 4 до 40 символов.");
                }else{
                    $(e.target).parent().parent().find('.required').css({'display':'none'});
                }
            }

            events(){
                this.col2_phone.on('input', this.validate_phone.bind(this));
                this.col2_username.on('input', this.validate_username.bind(this));
                this.col2_email.on('input', this.validate_email.bind(this));
                this.col2_password.on('input', this.validate_password.bind(this));
            };
        }
        new Register_validation('body');
    });
})(jQuery);