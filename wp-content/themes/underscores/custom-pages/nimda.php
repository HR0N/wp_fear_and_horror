<?php
$user_id = get_current_user_id();
$admin = get_userdata($user_id)->roles[0] === 'administrator';
?>
<?php if($admin) :?>
<?php
?>
<div class='nimda'>
<!--    <div hidden class='data'-->
<!--         data-users='--><?//= json_encode($users); ?><!--'-->
<!--         data-bills='--><?//= json_encode($users_bill); ?><!--'-->
<!--    ></div>-->
    <h2>Admin panel</h2>
    <hr>
    <h4>Счета пользователей:</h4>
    <div class='grid'>
        <div class='select-user'>
            <label>Выбор пользователя<br/>
                <select class='form-select select-user__select'>
                    <option selected disabled> _ _ </option>
                </select>
            </label>
        </div>
        <div class='user-wallet'>
            <div class='user-wallet__wallet'>
                <label>Счет ($)<input class='form-control' type='number'></label>
            </div>
            <div class='btn btn-outline-success change-bill'>Изменить</div>
        </div>
    </div>
    <div class="grid2">
        <div class="payment-requests">
            <h5>Пополнение:</h5>
            <div class="payment-requests__top-up">
                <div class="payment-requests__top-up_request">
                    <div class="name">Пользователь</div>
                    <div class="requisites">Реквизиты</div>
                    <div class="amount">Сумма</div>
                    <div class="processed" style="width: 110px;"></div>
                </div>
                <!--<div class="payment-requests__top-up_request">
                    <div class="name">user</div>
                    <div class="requisites">bc1q4rcgcyd23t4typq29vt1quh2vx7wfqx3vwgw5x</div>
                    <div class="amount">300</div>
                    <div class="processed"><div class="btn btn-outline-dark">Выполнено</div></div>
                </div>
                <div class="payment-requests__top-up_request">
                    <div class="name">user</div>
                    <div class="requisites">bc1q4rcgcyd23t4typq29vt1quh2vx7wfqx3vwgw5x</div>
                    <div class="amount">300</div>
                    <div class="processed"><div class="btn btn-outline-dark">Выполнено</div></div>
                </div>-->
            </div>
            <h5>Вывод средств:</h5>
            <div class="payment-requests__withdraw">
                <div class="payment-requests__withdraw_request">
                    <div class="name">Пользователь</div>
                    <div class="requisites">Реквизиты</div>
                    <div class="amount">Сумма</div>
                    <div class="processed" style="width: 110px;"></div>
                </div>
                <!--<div class="payment-requests__withdraw_request">
                    <div class="name">user</div>
                    <div class="requisites">bc1q4rcgcyd23t4typq29vt1quh2vx7wfqx3vwgw5x</div>
                    <div class="amount">300</div>
                    <div class="processed"><div class="btn btn-outline-dark">Выполнено</div></div>
                </div>-->
            </div>
        </div>
    </div>
</div>
<?php endif; ?>