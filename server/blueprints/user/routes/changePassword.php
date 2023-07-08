<?php

include('./../../../configs/conn.php');

$headers = getallheaders();

if (!array_key_exists('Authorization', $headers)) {

    echo json_encode(["error" => "Authorization header is missing"]);
    exit;
} else {

    if (substr($headers['Authorization'], 0, 7) !== 'Bearer ') {

        echo json_encode(["error" => "Bearer keyword is missing"]);
        exit;
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $newpass1 = $_POST['newpass1'];
        $newpass2 = $_POST['newpass2'];
        $token = trim(substr($headers['Authorization'], 7));
        $object = json_decode(base64_decode(str_replace('_', '/', str_replace('-', '+', explode('.', $token)[1]))));

        if ($object->username == $username) {
            if (empty($username) || empty($password) || empty($newpass1) || empty($newpass2)) {
                mysqli_close($connect);
                echo json_encode(
                    [
                        "check" => 1
                    ]
                );
            } else {
                if ($newpass1 != $newpass2) {
                    mysqli_close($connect);
                    echo json_encode(
                        [
                            "check" => 4
                        ]
                    );
                } else {
                    $account = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `account` WHERE `username`='" . $username . "'"));
                    if ($account) {
                        if ($account['password'] == $password) {
                            $sql = "UPDATE `account` SET `password`='{$newpass1}' WHERE`username`='" . $username . "'";
                            if (mysqli_query($connect, $sql)) {
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
        }else{
            mysqli_close($connect);
            echo json_encode(
                [
                    "message" => "Error token",
                    "status" => 403
                ]
            );
        }
    }
}
?>