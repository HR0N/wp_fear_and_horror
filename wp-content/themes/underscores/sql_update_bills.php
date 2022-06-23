<?php
/*
Template Name: SQL Update Bills
*/
$user_id = $_GET['data']['user_id'];
$value = $_GET['data']['value'];
function update_bills($user_id, $value){
    global $connect;
    $sql = "UPDATE `wp_user_bills` SET `bill`=".$value." WHERE `user`=".$user_id;
    $result = $connect->query($sql);
    return ($result);
}
update_bills($user_id, $value);