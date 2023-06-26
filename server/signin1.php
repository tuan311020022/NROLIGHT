<?php
header('Access-Control-Allow-Origin: http://localhost:3000');
require_once("./configs/conn.php");
session_start(); // bắt đầu phiên session

// if (isset($_POST['login'])) { // kiểm tra nút đăng nhập đã được nhấn hay chưa

    // lấy thông tin đăng nhập từ form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // kiểm tra thông tin đăng nhập
    $account = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `account` WHERE `username`='" . $username . "' AND `password`='" . $password . "'"));
    if ($account) {
        $player = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `player` WHERE `account_id`='" . $account['id'] . "'"));{
            $name = $player['name']; // lưu tên người vào session
            // header('Location: dashboard.php'); // chuyển hướng đến trang dashboard nếu đăng nhập thành công
            mysqli_close($connect);
            echo json_encode(
                [
                "username" => $name,
                "check" => 1
                ]
            );
            exit();
        }
    } else {
        // if ($username == "admin" && $password == "password") {
        //     $_SESSION['username'] = $username; // lưu thông tin đăng nhập vào session
        //     mysqli_close($connect);
        //     header('Location: dashboard.php'); // chuyển hướng đến trang dashboard nếu đăng nhập thành công
        //     exit();
        // } else {
            mysqli_close($connect);
            echo json_encode(
                [
                "check" => 2
                ]
            );
            // $error = "Tên đăng nhập hoặc mật khẩu không chính xác"; // thông báo lỗi nếu thông tin đăng nhập không đúng
        // }
    }
// }
?>