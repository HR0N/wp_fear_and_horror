<?php

$user_id = get_current_user_id();

?>

<div class='my_account'>
    <h2>МОЙ КАБИНЕТ</h2>
    <hr>
    <div class='wallets'>
        <div class='wallets__wallet'>
            <div class="row my_bill"><span>Мой баланс: </span><span class="wallets__wallet_amount"></span></div>
            <div class="row my_link"><span class="my_link">Моя ссылка: </span><span class="wallets__wallet_link"></span></div>
        </div>
        <div class="wallets__chart"></div>
        <div class="legends">
            <div class="legend legends__top-up"><div class="text">Мои пополнения:
                </div><div class="circle"></div></div>
            <div class="legend legends__income"><div class="text">Мои доходы:
                </div><div class="circle"></div></div>
            <div class="legend legends__withdraw"><div class="text">Мои выводы:
                </div><div class="circle"></div></div>
        </div>
    </div>
</div>