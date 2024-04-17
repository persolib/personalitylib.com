<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
} else {
    if (isset($_COOKIE['email'], $_COOKIE['password'])) {
        $url = "../auth?back=about";
        header("Location: $url");
        exit;
    } else {
        $logged = false;
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
    <script src="../public/bootstrap/bootstrap.bundle.js"></script>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../public/favicon.ico" type="image/x-icon">
    <title>About</title>
    <meta name="title" content="About" />
    <link rel="stylesheet" href="../public/css/about.css" />
    <!--Cookies-->
    <script
        src="https://cloud.ccm19.de/app.js?apiKey=48e8ec3f458ee0e3f9c85ab9e5753ed1313c04578c8b397d&amp;domain=65fb450aaaca388c810eafb2"
        referrerpolicy="origin"></script>
    <!--Google Ads-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4168649657374641"
        crossorigin="anonymous"></script>
</head>

<body>
    <header class="hstack gap-2">
        <h1 class="titel p-2"><a href="https://personalitylib.com/">PersonalityLib</a></h1>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-2">
                <li class="breadcrumb-item"><a href="https://personalitylib.com">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About</li>
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
                    onclick="window.location.href='<?php echo $personality;?>'">
                    <?php if($logged == true){echo "Personality";}else{echo "Create";}?>
                </button>
                <button type="button" class="btn btn-outline-primary"
                    onclick="window.location.href='<?php if($logged == true){echo $logout;}else{echo $about;}?>'">
                    <?php if($logged == true){echo "Logout";}else{echo "About";}?>
                </button>
            </div>
        </div>
    </header>
    <main class="z-0">
        <div class="about-card">
            <div class="card text-center">
                <div class="card-header">
                    <strong>About PersonalityLib</strong>
                </div>
                <div class="card-body">
                    <p class="card-text">
                    <p>is an open-source project that allows individuals to share their personality data with others.
                        The
                        project is based on the idea that by sharing our personality information, we can learn more
                        about ourselves
                        and connect with others who are similar to us.</p>

                    <p>The PersoLib platform allows users to create profiles that describe their personality traits,
                        interests,
                        and
                        values. Users can then share their profiles with others, either privately or publicly. When
                        users connect
                        with others on PersoLib, they can see how their personalities compare to each other. This can
                        help them to
                        identify potential friends, romantic partners, and collaborators.</p>

                    <p> PersoLib project is still in its early stages of development, but it has the potential to
                        revolutionize
                        the way we interact with each other online. By sharing our personality data, we can create a
                        more
                        personalized and meaningful online experience.</p><br>

                    <strong>Here are some of the benefits of using PersoLib:</strong><br>

                    Improved self-understanding: By reflecting on our personality traits, interests, and values, we can
                    gain a
                    better understanding of who we are. <br>
                    Enhanced connection with others: PersoLib can help us to connect with people who share our interests
                    and
                    values. <br>
                    Reduced social isolation: PersoLib can help us to overcome social anxiety and build meaningful
                    relationships. <br>
                    Increased productivity: PersoLib can help us to identify our strengths and weaknesses, which can
                    improve our
                    productivity. <br>
                    Personalized recommendations: PersoLib can provide us with personalized recommendations for
                    products,
                    services, and activities.
                </div>
                <div class="card-footer text-body-secondary">
                    If you are interested in learning more about PersoLib, please visit the project's website at
                    https://personalitylib.com.
                </div>
            </div>
        </div>

    </main>
    <footer>
        <span class="">
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