<?php

$mysql_host2 = "pr435071.mysql.tools";
$mysql_user2  = "pr435071_wp";
$mysql_password2 = "T^ni4P4^7t";
$mysql_database2 = "pr435071_wp";
global $connect2;
$connect2=mysqli_connect(
    $mysql_host2,
    $mysql_user2,
    $mysql_password2,
    $mysql_database2);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
function connectDB2($sql){
    global $connect2;
    $result = $connect2->query($sql);
    return mysqli_fetch_all($result);
}

$contracts = connectDB2("SELECT * FROM `wp_user_contrcts`");

foreach ($contracts as $contract){
    if($contract[2] == 11){marketing_offer_11($contract);}
    if($contract[2] == 12){marketing_offer_12($contract);}
    if($contract[2] == 13){marketing_offer_13($contract);}
    if($contract[2] == 14){marketing_offer_14($contract);}
    if($contract[2] == 15){marketing_offer_15($contract);}
}

function marketing_offer($contract){
    $minmax_deposit = [1, 1099];
    $chargers_diapason = [.9, 1.2];
    $cd = $chargers_diapason;
    $expired = time()*1000 > $contract[5];
    if(!$contract[6] && !$expired){
        $full_bill = $contract[3] + $contract[4];
        $new_amount = $contract[4] + ($full_bill * ( rand($cd[0] * 10, $cd[1] * 10) / 1000));
        connectDB("UPDATE `wp_user_contrcts` SET `income`=".$new_amount." WHERE `id`=".$contract[0]);
    }
    if($expired){connectDB("UPDATE `wp_user_contrcts` SET `ended`=".true." WHERE `id`=".$contract[0]);}
}
function marketing_offer_11($contract){
    $minmax_deposit = [1, 99];
    $chargers_diapason = .5;
    $cd = $chargers_diapason;
    $expired = time()*1000 > $contract[5];
    if(!$contract[6] && !$expired){
        $full_bill = $contract[3] + $contract[4];
        $new_amount = $contract[4] + (($full_bill * (( $cd ) / 100)) / 24);
        connectDB("UPDATE `wp_user_contrcts` SET `income`=".$new_amount." WHERE `id`=".$contract[0]);
    }
    if($expired){connectDB("UPDATE `wp_user_contrcts` SET `ended`=".true." WHERE `id`=".$contract[0]);}
}
function marketing_offer_12($contract){
    $minmax_deposit = [100, 499];
    $chargers_diapason = .7;
    $cd = $chargers_diapason;
    $expired = time()*1000 > $contract[5];
    if(!$contract[6] && !$expired){
        $full_bill = $contract[3] + $contract[4];
        $new_amount = $contract[4] + (($full_bill * (( $cd ) / 100)) / 24);
        connectDB("UPDATE `wp_user_contrcts` SET `income`=".$new_amount." WHERE `id`=".$contract[0]);
    }
    if($expired){connectDB("UPDATE `wp_user_contrcts` SET `ended`=".true." WHERE `id`=".$contract[0]);}
}
function marketing_offer_13($contract){
    $minmax_deposit = [500, 999];
    $chargers_diapason = .9;
    $cd = $chargers_diapason;
    $expired = time()*1000 > $contract[5];
    if(!$contract[6] && !$expired){
        $full_bill = $contract[3] + $contract[4];
        $new_amount = $contract[4] + (($full_bill * (( $cd ) / 100)) / 24);
        connectDB("UPDATE `wp_user_contrcts` SET `income`=".$new_amount." WHERE `id`=".$contract[0]);
    }
    if($expired){connectDB("UPDATE `wp_user_contrcts` SET `ended`=".true." WHERE `id`=".$contract[0]);}
}
function marketing_offer_14($contract){
    $minmax_deposit = [1000, 4999];
    $chargers_diapason = 1.1;
    $cd = $chargers_diapason;
    $expired = time()*1000 > $contract[5];
    if(!$contract[6] && !$expired){
        $full_bill = $contract[3] + $contract[4];
        $new_amount = $contract[4] + (($full_bill * (( $cd ) / 100)) / 24);
        connectDB("UPDATE `wp_user_contrcts` SET `income`=".$new_amount." WHERE `id`=".$contract[0]);
    }
    if($expired){connectDB("UPDATE `wp_user_contrcts` SET `ended`=".true." WHERE `id`=".$contract[0]);}
}
function marketing_offer_15($contract){
    $minmax_deposit = [5000, 9999999];
    $chargers_diapason = 1.3;
    $cd = $chargers_diapason;
    $expired = time()*1000 > $contract[5];
    if(!$contract[6] && !$expired){
        $full_bill = $contract[3] + $contract[4];
        $new_amount = $contract[4] + (($full_bill * (( $cd ) / 100)) / 24);
        connectDB("UPDATE `wp_user_contrcts` SET `income`=".$new_amount." WHERE `id`=".$contract[0]);
    }
    if($expired){connectDB("UPDATE `wp_user_contrcts` SET `ended`=".true." WHERE `id`=".$contract[0]);}
}
