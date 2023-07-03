<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
require_once("./function.php");
require_once("./configs/conn.php");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $newpass1 = $_POST['newpass1'];
    $newpass2 = $_POST['newpass2'];
    
    if(empty($username) || empty($password) || empty($newpass1) || empty($newpass2)) {
        mysqli_close($connect);
        echo json_encode(
            [
            "check" => 1
            ]
        );
    }
    else {
        if($newpass1 != $newpass2) {
            mysqli_close($connect);
            echo json_encode(
                [
                "check" => 4
                ]
            );
        } else {
            $account = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `account` WHERE `username`='".$username."'"));
            if($account) {
                if($account['password'] == $password) {
                     $sql = "UPDATE `account` SET `password`='{$newpass1}' WHERE`username`='".$username."'";
                    if(mysqli_query($connect,$sql)) {
                        mysqli_close($connect);
                        echo json_encode(
                            [
                            "check" => 3
                            ]
                        );
                        
                    }
                } else {
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
                    "check" => 2
                    ]
                );
            }
        }
    }
?>