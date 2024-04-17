<?php
    if (isset($_GET['back'])) {
        $back = $_GET['back']; 
    } else {
        $back = "";
    }

    session_start();
    require_once '../../conf.php';

    // Create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Check connection
    if (!$conn) {
        $url = "https://error.personalitylib.com/500/?error=sql";
        header("Location: $url");
        exit;
    }

    if (!isset($_SESSION['user_id'], $_SESSION['password_hash'], $_SESSION['email'], $_SESSION['name'])) {
        $url = "..";
        header("Location: $url");
        exit;
    } else {
        if (isset($_POST["data"])) {
            if (!isset($_POST['username'], $_POST['phone'], $_POST['picture'])) {
                $url = ".";
                header("Location: $url");
                exit;
            } else {
                $user_id = $_SESSION['user_id'];
                $password_hash = $_SESSION['password_hash'];
                $email = $_SESSION['email']; 
                $name = $_SESSION['name'];

                $username = $_POST['username'];
                $phone = $_POST['phone'];
                $picture = $_POST['picture']; //TODO: Add Profile Picture

                $sql = "SELECT * FROM `userdata` WHERE username = '$username'";
                $result = $conn->query($sql);
                if (!mysqli_num_rows($result) > 0) {
                    //Finish with SQL
                    $sql = "INSERT INTO `userlogin`(`userid`, `email`, `password_hash`) VALUES ('$user_id','$email','$password_hash')";
                    if ($conn->query($sql) === TRUE) {
                        $sql = "INSERT INTO `userdata`(`user_id`, `name`, `username`, `phone`) VALUES ('$user_id','$name','$username','$phone')";
                        if ($conn->query($sql) === TRUE) {
                            $conn->close();
                            
                            unset($_SESSION['user_id']);
                            unset($_SESSION['password_hash']);
                            unset($_SESSION['email']);
                            unset($_SESSION['name']);

                            $url = "../?back=$back";
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
                    $url = "?error=1";
                    header("Location: $url");
                    exit;
                }
            }
        } 
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
    <title>Data</title>
    <meta name='title' content='Data' />
    <link rel="stylesheet" href="../../public/css/data.css" />
    <!--Cookies-->
    <script
        src="https://cloud.ccm19.de/app.js?apiKey=48e8ec3f458ee0e3f9c85ab9e5753ed1313c04578c8b397d&amp;domain=65fb450aaaca388c810eafb2"
        referrerpolicy="origin"></script>
    <!--Google Ads-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4168649657374641"
        crossorigin="anonymous"></script>
</head>

<body>
    <header class="z-1 hstack gap-2">
        <h1 class="titel p-2"><a href="https://personalitylib.com/">PersonalityLib</a></h1>
    </header>
    <main class="row g-0">
        <div class="card row g-3">
            <?php if (isset($_GET["error"])) {?> <div class="alert alert-danger error" role="alert">
                <?php if ($_GET["error"] == 1) {
                    echo "There is already an account associated with this Username!";
                } else {
                    echo "There was an error with this form! ";
                }
            ?>
            </div>
            <?php } ?>
            <div class="card-body">
                <h5 class="card-title">One last Step</h5>
                <br>
                <form class="needs-validation" action=".<?php echo '/?back=' . $back;?>" method="post" novalidate>
                    <div class="col-md-12 input-group">
                        <span class="input-group-text" id="addon-wrapping">@</span>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                            aria-label="Username" aria-describedby="addon-wrapping" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12 input-group">
                        <span class="input-group-text" id="addon-wrapping">#</span>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone"
                            aria-label="Phone" aria-describedby="addon-wrapping" required>
                        <div class="valid-feedback">
                            Nice!
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12 input-group">
                        <span class="input-group-text" id="addon-wrapping">Profile Picture</span>
                        <input type="file" class="form-control" name="picture" id="picture" placeholder="Picture"
                            aria-label="Picture" aria-describedby="addon-wrapping">
                    </div>
                    <br>
                    <br>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-12">
                        <button name="data" class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="../../public/js/form.js"></script>
    </main>
</body>

</html>