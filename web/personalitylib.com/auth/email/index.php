<?php
require_once '../../conf.php';

if (isset($_GET['id'])) {
    $user_id = $_GET["id"]; 

    // Create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Check connection
    if (!$conn) {
        $url = "https://error.personalitylib.com/500/?error=sql";
        header("Location: $url");
        exit;
    }
    
    // Define the SQL query
    $sql = "SELECT * FROM userlogin WHERE userid = '$user_id' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    // Check if any rows are returned (meaning the tag exists)
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['user_id'] = $user_id;
        while($row = $result->fetch_assoc()) {
            $email = $row["email"];
            }
    } else {
        $url = "..";
        header("Location: $url");
        exit;
    }
    mysqli_close($conn);
    
    
} else {
    $url = "..";
    header("Location: $url");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="PersoLib is an open-source project that allows individuals to share their personality data with others." />
    <meta name="keywords"
        content="personality, libary, exchange, explore, perso, dating, friends, personalitylib, personalitylib.com, justwait" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="English" />
    <meta name="revisit-after" content="2 days" />
    <meta name="author" content="JustWait" />
    <!-- BOOTTSTRAP -->
    <script src="../../public/bootstrap/bootstrap.bundle.js"></script>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../../public/favicon.ico" type="image/x-icon">
    <title>Email Verify</title>
    <meta name='title' content='Email Verify' />
    <link rel="stylesheet" href="../../public/css/email.css" />
    <!--Google Ads-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4168649657374641"
        crossorigin="anonymous"></script>
</head>

<body>
    <header class="z-1 hstack gap-2">
        <h1 class="titel p-2"><a href="https://personalitylib.com/">PersonalityLib</a></h1>
    </header>
    <main class="row g-0">
        <div class="wrapper">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../../public/img/verified-email.png" class="img-fluid rounded-start"
                            alt="Profile Picture">

                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Auto Email Verification</h5>
                            <br>
                            <p class="card-text">
                                <?php
                                $api_key = EMAIL_API;

                                $ch = curl_init();

                                curl_setopt_array($ch, [
                                    CURLOPT_URL => "https://api.emailable.com/v1/verify?email=$email&api_key=$api_key",
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_FOLLOWLOCATION => true
                                ]);

                                $response = curl_exec($ch);

                                curl_close($ch);

                                $data = json_decode($response, true);

                                if ($data['state'] === "undeliverable") {
                                    echo "Undeliverable";
                                } elseif ($data["disposable"] === true) {
                                    echo "Disposable";
                                } else {
                                    echo "email address is valid";
                                }
                            ?>
                            </p>
                            <div class="alert alert-warning" role="alert">
                                The Signup Engin isn't ready yet!
                            </div>
                            <p class="card-text"><small class="text-body-secondary"><a href="../..">Go back</a></small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>