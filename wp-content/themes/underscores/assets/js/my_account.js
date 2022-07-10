(function($){
    $(document).ready(()=>{
        class MyAccountClass extends Class_Father{
            constructor(elem) {
                super($, elem);
                this.elem = $(elem);
                this.display_wallet = this.find('.wallets__wallet_amount');
                this.link_html = this.find('.wallets__wallet_link');
                this.my_link = this.find('.my_link');
                this.events();
            }
            makeid(length) {
                let result           = '';
                let characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                let charactersLength = characters.length;
                for ( let i = 0; i < length; i++ ) {
                    result += characters.charAt(Math.floor(Math.random() *
                        charactersLength));
                }
                return result;
            }
            hashCode(str) {
                let hash = 0;
                for (let i = 0, len = str.length; i < len; i++) {
                    let chr = str.charCodeAt(i);
                    hash = (hash << 5) - hash + chr;
                    hash |= 0; // Convert to 32bit integer
                }
                return hash;
            }
            save_link_to_navigator(link){
                console.log(link);
                navigator.clipboard.writeText(link);
            }


            events(){
                let generate_link = Math.abs(this.hashCode(`example${this.cur_user[0]}`));
                this.display_wallet.html(this.cur_user[2] +' USDT');
                this.link_html.html(`${location.origin}/my_account/${generate_link}`);
                this.my_link.on('click', this.save_link_to_navigator.bind(this, `${location.origin}/my_account/${generate_link}`))
                this.my_link.on('touch', this.save_link_to_navigator.bind(this, `${location.origin}/my_account/${generate_link}`))
            };
        }
        let my_account = new MyAccountClass('.my_account');
    });
})(jQuery);