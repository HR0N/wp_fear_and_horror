<?php
/*
Template Name: SQL Pull Off Contract
*/
$user = $_GET['data']['user'];
$contract_id = $_GET['data']['contract_id'];
$new_bill = $_GET['data']['new_bill'];


function delete_contract($contract_id){
    global $connect;
    $sql = "DELETE FROM `wp_user_contrcts` WHERE `id`=".$contract_id;
    $result = $connect->query($sql);
    return ($result);
}
function add_income_to_bill($user, $new_bill){
    global $connect;
    $sql = "UPDATE `wp_users_bill` SET `bill`=".$new_bill." WHERE `user`=".$user;
    $result = $connect->query($sql);
    return ($result);
}
delete_contract($contract_id);
add_income_to_bill($user, $new_bill);