
<div class='my_account'>
    <h2>Wallets</h2>
    <hr>
    <div class='wallets'>
        <div class='wallets__wallet'>
            100$
        </div>
    </div>
</div>
<?php

$res = connectDB("SELECT `user_nicename` FROM `wp_users`");

echo '<pre>';
echo var_dump($res);
echo '</pre>';
//$user_id = get_current_user_id();
//
//echo '<pre>';
//echo var_dump(get_userdata($user_id)->roles[0]);
//echo '</pre>';
