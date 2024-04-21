<?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        $logged = true;
        $user_id = $_SESSION['user_id'];
    } else {
        if (isset($_COOKIE['email'], $_COOKIE['password'])) {
            $url = "../auth/?back=profile";
            header("Location: $url");
            exit;
        } else {
            $url = "../auth/?back=profile";
            header("Location: $url");
            exit;
        }
    }
    
    require_once '../conf.php';
        
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
        while($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $username = $row["username"];
            $join = $row["data_join"];
            }
    } else {
        $url = "../auth/?back=profile";
        header("Location: $url");
        exit;
    }

    mysqli_close($conn);
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
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-2">
                <li class="breadcrumb-item"><a href="https://personalitylib.com">Home</a></li>
                <?php echo"<li class='breadcrumb-item active' aria-current='page'>$username</li>" ?>
            </ol>
        </nav>

        <div class="link-tree p-2 ms-auto">
            <button type="button" class="btn btn-outline-primary home" onclick="window.location.href='..'">
                Home
            </button>
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <?php $auth = "../auth"; $profile = "../profile"; $logout = "../auth/logout"; $about = "../about"; $personality = "../profile/new";?>
                <button type="button" class="btn btn-outline-primary"
                    onclick="window.location.href='<?php if($logged == true){echo $profile;}else{echo $auth;}?>'">
                    <?php if($logged == true){echo "Profile";}else{echo "LogIn";}?>
                </button>
                <button type="button" class="btn btn-outline-primary"
                    onclick="window.location.href='<?php $personality?>'">
                    <?php if($logged == true){echo "Personality";}else{echo "Create";}?>
                </button>
                <button type="button" class="btn btn-outline-primary"
                    onclick="window.location.href='<?php if($logged == true){echo $logout;}else{echo $about;}?>'">
                    <?php if($logged == true){echo "Logout";}else{echo "About";}?>
                </button>
            </div>
        </div>
    </header>
    <main>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    1 of 3
                </div>
                <div class="col-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../public/img/profile-placeholder.jpeg" class="img-fluid rounded-start"
                                    alt="Profile Picture">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to
                                        additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    3 of 3
                </div>
            </div>
            <div class="row">
                <div class="col">
                    1 of 3
                </div>
                <div class="col-5">
                    2 of 3 (wider)
                </div>
                <div class="col">
                    3 of 3
                </div>
            </div>
        </div>
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