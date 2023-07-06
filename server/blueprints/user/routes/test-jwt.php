<?php
// $host = "host";
// $dbname = "database";
// $username = "username";
// $password = "password";

// $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$headers = getallheaders();

if (!array_key_exists('Authorization', $headers)) {

    echo json_encode(["error" => "Authorization header is missing"]);
    exit;
}
else {
    
    if (substr($headers['Authorization'], 0, 7) !== 'Bearer ') {

        echo json_encode(["error" => "Bearer keyword is missing"]);
        exit;
    }
    else {
    
        $token = trim(substr($headers['Authorization'], 7));

    }
}
?>