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
    $sql = "INSERT INTO `userlogin`(`userid`, `email`, `password_hash`, `valid`) VALUES ('$user_id','$email','$password_hash', 'false')";
    if ($conn->query($sql) === TRUE) {
        $sql = "INSERT INTO `userdata`(`user_id`, `name`, `username`, `birthdate`, `valid`) VALUES ('$user_id','$name','?','?','false')";
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            $url = "../email/?id=$user_id";
            header("Location: $url");
            exit;
        } else {
            $url = "https://error.personalitylib.com/500/?error=sql";
            header("Location: $url");
            exit;
        }
    } else {
        $url = "https://error.personalitylib.com/500/?error=sql";
        header("Location: $url");
        exit;
    }
} else {
    $url = "https://error.personalitylib.com/500/?msg=2";
    header("Location: $url");
    exit;
}



print_r($_POST);
var_dump($password_hash);
?>