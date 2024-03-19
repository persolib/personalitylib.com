<?php
    session_start();

    $user_id = $_SESSION['user_id'];
    $password_hash = $_SESSION['password_hash'];
    $email = $_SESSION['email']; 
    $name = $_SESSION['name'];

    if (!isset($user_id) && !isset($password_hash) && !isset($email) && !isset($name)) {
        $url = "..";
        header("Location: $url");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<!--TODO: CHeck if allready signed in-->

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
    <script src="../public/bootstrap/bootstrap.bundle.js"></script>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../../public/favicon.ico" type="image/x-icon">
    <title>Auth</title>
    <meta name="title" content="Auth" />
    <link rel="stylesheet" href="../../public/css/auth.css" />
    <!--Google Ads-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4168649657374641"
        crossorigin="anonymous"></script>
</head>

<body>
    <main>
        <p>User_id: <?php echo $user_id;?></p>
        <p>Password_hash: <?php echo $password_hash;?></p>
        <p>Email: <?php echo $email;?></p>
        <p>Name <?php echo $name;?></p>
    </main>
    <footer>
        <span class="">
            <p>Links:</p>
            <span class="hstack gap-4 media-uvis">
                <p class="p-2"><a href="../../about/">About</a></p>
                <p class="p-2"><a href="../../legalnotice/">Legal Notice</a></p>
                <p class="p-2"><a href="../../licence/">Licence</a></p>
                <p class="p-2"><a href="https://github.com/persolib/personalitylib.com">Github</a></p>
            </span>
            <span class="media-vis">
                <span class="hstack gap-2">
                    <p class=""><a href="../../about/">About</a></p>
                    <p class=""><a href="../auth/">Legal Notice</a></p>
                </span>
                <span class="hstack gap-2">
                    <p class=""><a href="../../licence/">Licence</a></p>
                    <p class=""><a href="https://github.com/persolib/personalitylib.com">Github</a></p>
                </span>
            </span>
        </span>
        <span class="footer-span">
            <p>© 2024 PersonalityLib</p>
        </span>
    </footer>
    <script src="../../public/js/auth.js"></script>
</body>

</html>