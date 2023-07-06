<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require './../../../services/jwt/src/JWT.php';
require_once("./../../../configs/conn.php");

session_start(); 

$username = $_POST['username'];
$password = $_POST['password'];

$key = 'super-secret';

$account = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `account` WHERE `username`='" . $username . "' AND `password`='" . $password . "'"));
if ($account) {
    $player = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `player` WHERE `account_id`='" . $account['id'] . "'")); {
        $name = $player['name'];
        $issuedAt = time();
        $expirationTime = $issuedAt + 60 * 60 * 24;
        $payload = [
            'username' => $name,
            'iat' => $issuedAt,
            'exp' => $expirationTime,
        ];
        $access_token = JWT::encode($payload, $key, 'HS256');
        mysqli_close($connect);
        echo json_encode(
            [
                "username" => $name,
                "access_token" => $access_token,
                "check" => 1
            ]
        );
        exit();
    }
} else {
    mysqli_close($connect);
    echo json_encode(
        [
            "check" => 2
        ]
    );
}
?>