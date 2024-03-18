<?php
    session_start();
    require_once '../conf.php';
    
    if (isset($_GET['id']) or isset($_SESSION['user_id'])) {
        if (isset($_GET['id'])) {
            $user_id = $_GET["id"]; 
        } else if ( isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id']; 
            unset($_SESSION['user_id']);
            $url = "?id=$user_id";
            header("Location: $url");
            exit;
        }
        
        // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // Check connection
        if (!$conn) {
            $url = "https://error.personalitylib.com/500/?error=sql";
            header("Location: $url");
            exit;
        }
        
        
        // Define the SQL query
        $sql = "SELECT * FROM userdata WHERE user_id = '$user_id' LIMIT 1";

        $result = mysqli_query($conn, $sql);

        // Check if any rows are returned (meaning the tag exists)
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['user_id'] = $user_id;
            while($row = $result->fetch_assoc()) {
                $name = $row["name"];
                $username = $row["username"];
                $join = $row["data_join"];
                $birth = $row["birthdate"];
                }
        } else {
            $url = "../auth/?back=profile";
            header("Location: $url");
            exit;
        }

        mysqli_close($conn);
    }else{
        //TODO: or check if allready signed in
        $url = "../auth/?back=profile";
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
    <script src="../public/bootstrap/bootstrap.bundle.js"></script>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../public/favicon.ico" type="image/x-icon">
    <?php echo"<title>$username - Account</title>" ?>
    <?php echo "<meta name='title' content='".$username." - Account'/>" ?>
    <link rel="stylesheet" href="../public/css/profile.css" />
    <!--Google Ads-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4168649657374641"
        crossorigin="anonymous"></script>
</head>

<body>
    <header class="z-1 hstack gap-2">
        <h1 class="titel p-2"><a href="https://personalitylib.com/">PersonalityLib</a></h1>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-2">
                <li class="breadcrumb-item"><a href="https://personalitylib.com">Home</a></li>
                <?php echo"<li class='breadcrumb-item active' aria-current='page'>$username</li>" ?>
            </ol>
        </nav>

        <div class="link-tree p-2 ms-auto">
            <button type="button" class="btn btn-outline-primary home"
                onclick="window.location.href='https://personalitylib.com/'">
                Home
            </button>
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <button type="button" class="btn btn-outline-primary"
                    onclick="window.location.href='../auth/?back=profile'">
                    LogIn
                </button>
                <button type="button" class="btn btn-outline-primary create" data-bs-toggle="modal"
                    data-bs-target="#betaModal">
                    Create
                </button>
                <button type="button" class="btn btn-outline-primary" onclick="window.location.href='../about/'">
                    About
                </button>
            </div>
        </div>
    </header>
    <main>
        <?php
            echo "<p style='color:white; display: flex; justify-content: center; text-allign: center;'>Username: " . $username . "<br>Userid: " . $user_id . "<br>Join: " . $join . "<br>Name: " . $name . "<br>Birth: " . $birth . "</p>";
        ?>

    </main>
    <footer>
        <span>
            <p>Links:</p>
            <span class="hstack gap-4 media-uvis">
                <p class="p-2"><a href="../about/">About</a></p>
                <p class="p-2"><a href="../legalnotice/">Legal Notice</a></p>
                <p class="p-2"><a href="../licence/">Licence</a></p>
                <p class="p-2"><a href="https://github.com/persolib/personalitylib.com">Github</a></p>
            </span>
            <span class="media-vis">
                <span class="hstack gap-2">
                    <p class=""><a href="../about/">About</a></p>
                    <p class=""><a href="../legalnotice/">Legal Notice</a></p>
                </span>
                <span class="hstack gap-2">
                    <p class=""><a href="../licence/">Licence</a></p>
                    <p class=""><a href="https://github.com/persolib/personalitylib.com">Github</a></p>
                </span>
            </span>
        </span>
        <span class="footer-span">
            <p>© 2024 PersonalityLib</p>
        </span>
    </footer>
</body>

</html>