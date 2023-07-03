<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
require_once("./function.php");
include("./configs/conn.php");

    $idchar = $_POST['idchar'];
    $mathe = $_POST['code'];
    $seri =  $_POST['serial'];
    $amount =  $_POST['amount'];
    $type =  $_POST['telco'];
    if(empty($type))
    {
        mysqli_close($connect);
        echo json_encode(
            [
            "check" => 1
            ]
        );
    }
    elseif(empty($amount))
    {
        mysqli_close($connect);
        echo json_encode(
            [
            "check" => 1
            ]
        );
    }
    elseif(empty($seri))
    {
        mysqli_close($connect);
        echo json_encode(
            [
            "check" => 1
            ]
        );
    }
    elseif(empty($mathe))
    {
        mysqli_close($connect);
        echo json_encode(
            [
            "check" => 1
            ]
        );
    }
    elseif (strlen($seri) < 5 || strlen($mathe) < 5)
    {
        mysqli_close($connect);
        echo json_encode(
            [
            "check" => 1
            ]
        );
    }
    else {
        $account = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `player` WHERE `name`='".$idchar."'"));
        if($account){
            $code = rand(100000000, 999999999);
            $id = '78308817836';
            $key = '258d4d1f29d488effbfca07fcb016e1e';
            $url = 'https://thesieure.com/chargingws/v2?sign='.md5($key.$mathe.$seri).'&telco='.$type.'&code='.$mathe.'&serial='.$seri.'&amount='.$amount.'&request_id='.$code.'&partner_id='.$id.'&command=charging';
            $xuly = json_decode(curl_get($url), true);
            $callback_sign = md5($key.$mathe.$seri);
            if($xuly['status'] == 99)
            {
              $url = 'https://nroshine.online/shine/callback.php?sign='.md5($key.$mathe.$seri).'&telco='.$type.'&idchar='.$idchar.'&code='.$mathe.'&serial='.$seri.'&amount='.$amount.'&request_id='.$code.'&partner_id='.$id.'&command=check';
              mysqli_close($connect);
              echo json_encode(
                [
                "check" => 3,
                "key" => $code,
                "sign" => $callback_sign
                ]
            );
            }
            else {
                mysqli_close($connect);
                echo json_encode(
                    [
                    "check" => 2
                    ]
                );
            }
        } else {
            mysqli_close($connect);
            echo json_encode(
                [
                "check" => 4
                ]
            );
        }
    }
    
?>