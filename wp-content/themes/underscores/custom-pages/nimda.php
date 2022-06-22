<?php
$user_id = get_current_user_id();
$admin = get_userdata($user_id)->roles[0] === 'administrator';

$users = get_users();
$users = array_map(function ($val){
    return $val;
}, $users);

?>
<?php if($admin) :?>
<?php
global $res, $users_bill;
$res = connectDB("SELECT * FROM `wp_users`");
$users_bill = connectDB("SELECT * FROM `wp_user_bills`");


function getUserBill($user_id){
    global $users_bill;
    $result = null;
    foreach($users_bill as $bill){
        if($bill[1] == $user_id){$result = $bill;}
    }
    if($result === null){createUserBill($user_id); $result = false;}
    return $result;
}
function createUserBill($user_id){
    insertDB("INSERT INTO `wp_user_bills`(`user`) VALUES (".$user_id.")");
}
echo '<pre>';
echo var_dump(getUserBill(9));
echo '</pre>';
echo '<pre>';
echo var_dump($_GET);
echo '</pre>';
?>
<div class='nimda'>
    <h2>Admin panel</h2>
    <hr>
    <label>Выбор пользователя<br/>
        <select class="form-select select-user">
            <option selected disabled>users</option>
            <?php foreach ($res as $nickname)
                echo "<option value='$nickname[0]'>$nickname[1]</option>";?>
        </select>
    </label>
</div>
<?php endif; ?>