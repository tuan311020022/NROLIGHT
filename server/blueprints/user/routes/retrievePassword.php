<?php

require './controller.php';

try {
    $username = $_POST['username'];
    $password = uniqid();

    sendMail($username, $password);
    getPasswordFromMail($username, $password);
    
    $content = [
        "username" => $username,
        "message" => "Message has been sent"
    ];
    echo json_encode($content);
} catch (Exception $e) {
    $content = [
        "errors" => $e->getMessage()
    ];
    echo json_encode($content);
}

?>