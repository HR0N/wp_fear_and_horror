<?php

$user_id = get_current_user_id();

echo '<pre>';
echo var_dump(get_role($user_id));
//    echo var_dump(get_userdata($user_id));
echo var_dump(get_userdata($user_id)->roles);
echo '</pre>';
