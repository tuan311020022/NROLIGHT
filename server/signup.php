<?php
header('Access-Control-Allow-Origin: http://localhost:3000');
require_once("./function.php");

error_reporting(0);
@session_start();
include('./configs/conn.php');
//
    $username = $_POST['username'];
    $password = $_POST['password'];
    $account = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `account` WHERE `username`='" . $_POST['username'] . "'"));
    if (empty($password) or empty($username)) {
        mysqli_close($connect);
        echo json_encode(
            [
            "check" => 1
            ]
        );
        } 
    else if ($account > 0) {
        mysqli_close($connect);
        echo json_encode(
            [
            "check" => 2
            ]
        );    
    } 
    else {
            mysqli_query($connect, "INSERT INTO `account` SET `username`='{$username}', `password`='{$password}'");
            mysqli_close($connect);
            echo json_encode(
                [
                   "check" => 3
                ]
            );
        }
?>