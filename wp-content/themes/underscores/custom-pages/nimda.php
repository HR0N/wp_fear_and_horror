<?php
$user_id = get_current_user_id();
$admin = get_userdata($user_id)->roles[0] === 'administrator';

$users = get_users();
$users = array_map(function ($val){
    return $val;
}, $users);

?>
<?php if($admin) :?>
<div class='nimda'>
    <h2>Admin panel</h2>
    <hr>

</div>
<?php endif; ?>
