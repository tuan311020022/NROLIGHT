<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
require_once("./function.php");
include("./configs/conn.php");

        /// status = 1 ==> thẻ đúng
        /// status = 2 ==> thẻ sai
        /// status = 3 ==> thẻ ko dùng đc
        /// status = 99 ==> thẻ chờ xử lý
    $mathe = $_POST['code'];
    $seri =  $_POST['serial'];
    $amount =  $_POST['amount'];
    $type =  $_POST['telco'];
    $code = $_POST['request_id'];
    $sign =$_POST['sign'];
    $id = '78308817836';
    $idchar = $_POST['idchar'];
    $key = '258d4d1f29d488effbfca07fcb016e1e';
    $url = 'https://thesieure.com/chargingws/v2?sign='.$sign.'&telco='.$type.'&code='.$mathe.'&serial='.$seri.'&amount='.$amount.'&request_id='.$code.'&partner_id='.$id.'&command=check';
    $process = json_decode(curl_get($url), true);
    $status = $process['status'];
    if($status == 1) {
        $account = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `player` WHERE `name`='".$_POST['idchar']."'"));
        $charge = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `napthe` WHERE `sign`='".$sign."'"));
        if($charge) {
            mysqli_close($connect);
            echo json_encode(
                [
                "check" => 3,
                "status" => $status
                ]
            );
        }
        else {
            $sql = "UPDATE `player` SET `recharge`=`recharge` +'{$amount}' WHERE`name`='".$_POST['idchar']."'";
            if(mysqli_query($connect,$sql)) {
                
            }
            
            if(mysqli_query($connect,$sql = "UPDATE `player` SET `donate`=`donate`+'{$amount}' WHERE `name`='".$_POST['idchar']."'")) {
                
            }

            if(mysqli_query($connect,$sql = "UPDATE `player` SET `point`=`point`+'{$amount}' WHERE `name`='".$_POST['idchar']."'")) {
                
            }

            if(mysqli_query($connect,"UPDATE `account` SET `active` = 1  WHERE `id`='".$account['account_id']."'")) {
                $smg = $account['account_id'];
            }
            mysqli_query($connect,"INSERT INTO `napthe` (idChar,amount,sign) VALUES('$idchar','$amount','$sign')");
            mysqli_close($connect);
            echo json_encode(
                [
                "check" => 3,
                "status" => $status
                ]
            );
        }
    }
    elseif($status == 99) {
        mysqli_close($connect);
            echo json_encode(
                [
                "check" => 1,
                "status" => $status
                ]
            );
    } 
    else {
        mysqli_close($connect);
            echo json_encode(
                [
                "check" => 2,
                "status" => $status
                ]
            );   
    }

?>