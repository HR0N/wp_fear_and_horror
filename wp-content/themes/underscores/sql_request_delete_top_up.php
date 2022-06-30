<?php
/*
Template Name: SQL Request Delete Top Up
*/
$reqid = $_GET['data']['reqid'];

function top_up($reqid){
    global $connect;
    $sql = "DELETE FROM `wp_user_topup` WHERE `id`=".$reqid;
    $result = $connect->query($sql);
    return ($result);
}
top_up($reqid);