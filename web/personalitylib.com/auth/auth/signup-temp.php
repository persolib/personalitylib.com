<?php
require_once '../../conf.php';

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$email = $_POST["email"];
$name = $_POST["name"];

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if (!$conn) {
    $url = "https://error.personalitylib.com/500/?error=sql";
    header("Location: $url");
    exit;
}

while (true) {
    $user_id = rand(10000000,99999999);
    $sql = "SELECT * FROM `userlogin` WHERE userid = '$user_id'";
    $result = $conn->query($sql);
    
    if (!mysqli_num_rows($result) > 0) {
        break;
    }
}


$sql = "SELECT * FROM `userlogin` WHERE email = '$email'";
$result = $conn->query($sql);
if (!mysqli_num_rows($result) > 0) {
    
} else {
    $url = "https://error.personalitylib.com/500/?msg=2";
    header("Location: $url");
    exit;
}
?>