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
                <label>Счет ($)<input class='form-control' value='0' type='number'></label>
            </div>
            <div class='btn btn-outline-success change-bill'>Изменить</div>
        </div>
    </div>
</div>
<?php endif; ?>