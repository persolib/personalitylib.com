<?php //TODO: make changeble
session_start();
if (isset($_SESSION['user_id'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
} else {
    if (isset($_COOKIE['email'], $_COOKIE['password'])) {
        $url = "../auth?back=personality";
        header("Location: $url");
        exit;
    } else {
        $logged = false;
    }
}

require_once '../conf.php';

$url = $_SERVER['REQUEST_URI'];
// Prüfen auf das Vorhandensein eines "/"
$lastChar = substr($url, -1);

// Zurücknavigieren im Verzeichnis
if ($lastChar === '/') {
  header('HTTP/1.1 301 Moved Permanently');
  header('Location: ' . substr($url, 0, -1));
  exit;
}

$path = parse_url($url, PHP_URL_PATH);
$segments = explode('personality', $path);
$segments = array_filter($segments);
$path = end($segments);
$tag = intval(str_replace('/', '', $path));

if (!$tag == '') {
    // Create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Check connection
    if (!$conn) {
    $url = "https://error.personalitylib.com/500/?error=sql";
    header("Location: $url");
    exit;
    }

    // Define the SQL query
    $sql = "SELECT * FROM tagdata WHERE tag = '$tag' LIMIT 1";

    $result = mysqli_query($conn, $sql);

    // Check if any rows are returned (meaning the tag exists)
    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()) {
        $userid = $row["user_id"];
    }
    $sql = "SELECT * FROM userdata WHERE user_id = '$userid' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $username = $row["username"];
            $join = $row["data_join"];
        }
    } else {
        $url = "https://error.personalitylib.com/500/?error=userid&id=" . $userid;
        header("Location: $url");
        exit;
    }
    } else {
        $url = "https://error.personalitylib.com/500/?error=persotag&tag=" . $tag;
        header("Location: $url");
        exit;   
    }

    mysqli_close($conn);
}else{
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
    <script src="../public/bootstrap/bootstrap.bundle.js"></script>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../public/favicon.ico" type="image/x-icon">
    <?php echo"<title>$username</title>" ?>
    <?php echo "<meta name='title' content='".$username."' />" ?>
    <link rel="stylesheet" href="../public/css/personality.css" />
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
        <?php
            $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            // Check connection
            if (!$conn) {
                $url = "https://error.personalitylib.com/500/?error=sql";
                header("Location: $url");
                exit;
            }
            
            // Define the SQL query
            $sql = "SELECT * FROM persodata WHERE tag = '$tag' LIMIT 1";
    
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            while($row = $result->fetch_assoc()) {
                $id=$row["id"];
                $tag=$row["tag"];
                $mental_health=$row["mental_health"];
                $physical_health=$row["physical_health"];
                $hobbys=$row["hobbys"];
                $music=$row["music"];
                $like_people=$row["like_people"];
                $meat_people=$row["meat_people"];
                $friends=$row["friends"];
                $inoutside=$row["in/outside"];
                $empathy=$row["empathy"];
                $relegion=$row["relegion"];
                $mentality=$row["mentality"];
                $clean=$row["clean"];
                $word=$row["own_word"];
                $bio=$row["bio"];
                $song=$row["song"];
                $sex=$row["sex"];
                $pronauns=$row["pronauns"];
                $language=$row["language"];
                $favourite_color=$row["favourite_color"];
                }
            } else {
                $url = "https://error.personalitylib.com/500/?error=persotag&tag=" . $tag;
                header("Location: $url");
                exit;
            }

            //echo "<h2>" . $id . ", " . $tag . ", " . $mental_health . ", " . $physical_health . ", " . $hobbys . ", " . $music . ", " . $like_people . ", " . $meat_people . ", " . $friends . ", " . $inoutside . ", " . $empathy . ", " . $relegion . ", " . $mentality . ", " . $clean . ", " . $own_word . ", " . $bio . ", " . $song . "</h2>";
        ?>
        <div class="container text-center">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row" style="flex-wrap: nowrap;">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../public/img/profile-placeholder.jpeg" class="img-fluid rounded-start"
                                    alt="Profile Picture">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $username; ?></h5>
                                    <p class="card-text"><?php echo $bio; ?></p>
                                    <p class="card-text"><small
                                            class="text-body-secondary"><?php echo "Joint: ".$join; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <?php echo "Favorite Song: ". $song; ?>
                        </li>
                        <li class="list-group-item">
                            <?php echo "Sex: ". $sex;  ?>
                        </li>
                        <li class="list-group-item">
                            <?php echo "Own Word: ". $word;  ?>
                        </li>
                        <li class="list-group-item">
                            <?php echo "Pronauns: ". $pronauns;  ?>
                        </li>
                        <li class="list-group-item">
                            <?php echo "Primary Language: ". $language;  ?>
                        </li>
                        <li class="list-group-item">
                            <?php echo "Favourite Color: ". $favourite_color;  ?>
                        </li>
                        <li class='list-group-item'>
                            <?php echo "Religion: ". $relegion;  ?>
                        </li>
                    </ul>
                </div>
            </div>

            <br>
            <br>

            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
            <div class="row">
                <div class="col-6 col-md-6">
                    <div class="accordion" id="accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne-1" aria-expanded="true" aria-controls="collapseOne">
                                    Mentality
                                </button>
                            </h2>
                            <div id="collapseOne-1" class="accordion-collapse collapse show"
                                data-bs-parent="#accordion-1">
                                <div class="accordion-body">
                                    <?php
                                    echo $mentality;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo-1" aria-expanded="false" aria-controls="collapseTwo">
                                    Music
                                </button>
                            </h2>
                            <div id="collapseTwo-1" class="accordion-collapse collapse" data-bs-parent="#accordion-1">
                                <div class="accordion-body">
                                    <?php
                                    echo $music;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-6 col-md-6">
                    <div class="accordion" id="accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne-3" aria-expanded="true" aria-controls="collapseOne">
                                    Hobbys
                                </button>
                            </h2>
                            <div id="collapseOne-3" class="accordion-collapse collapse show"
                                data-bs-parent="#accordion-3">
                                <div class="accordion-body">
                                    <?php
                                    echo $hobbys;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo-3" aria-expanded="false" aria-controls="collapseTwo">
                                    Personality style
                                </button>
                            </h2>
                            <div id="collapseTwo-3" class="accordion-collapse collapse" data-bs-parent="#accordion-3">
                                <div class="accordion-body">
                                    <?php
                                    if($inoutside=="yes"){
                                        echo "<strong>Introverts</strong> are people who gain energy from being alone. They tend to be quiet, reserved, and thoughtful. Introverts often prefer to spend time in one-on-one or small group settings, and they may feel overwhelmed or drained by large social gatherings.";
                                    } else if ($inoutside=="maybe") {
                                        echo "<strong>Ambiverts</strong> are people who fall somewhere in the middle of the introvert-extrovert spectrum. They may exhibit characteristics of both introverts and extroverts, depending on the situation.";
                                    } else {
                                        echo "<strong>Extroverts</strong> are people who gain energy from being around other people. They tend to be outgoing, talkative, and social. Extroverts often enjoy spending time in large groups, and they may feel bored or restless when they are alone.";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>

            <!-- Columns are always 50% wide, on mobile and desktop -->
            <div class="row progress-div">
                <div class="col-12 progress-wrapper">
                    <div class="progress" role="progressbar" aria-label="Default striped example" aria-valuenow="10"
                        aria-valuemin="0" aria-valuemax="100">
                        <?php $with_pb1 = $mental_health * 2; ?>
                        <div class="progress-bar progress-bar-striped overflow-visible" echo
                            style="width: <?php echo $with_pb1; ?>%"><strong style="padding-left: 30px">Mentaly
                                Healthy</strong>
                        </div>
                    </div>
                    <?php $with_pb2 = $physical_health * 2; ?>
                    <div class="progress" role="progressbar" aria-label="Success striped example" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped overflow-visible" echo
                            style="width: <?php echo $with_pb2; ?>%"><strong style="padding-left: 30px">Physical
                                Health</strong>
                        </div>
                    </div>
                    <?php $with_pb3 = $like_people * 2; ?>
                    <div class="progress" role="progressbar" aria-label="Info striped example" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped overflow-visible" echo
                            style="width: <?php echo $with_pb3; ?>%"><strong style="padding-left: 30px">Likes
                                People</strong>
                        </div>
                    </div>
                    <?php $with_pb4 = $meat_people * 2; ?>
                    <div class="progress" role="progressbar" aria-label="Warning striped example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped overflow-visible" echo
                            style="width: <?php echo $with_pb4; ?>%"><strong style="padding-left: 30px">Meats
                                People</strong>
                        </div>
                    </div>
                    <?php $with_pb5 = $empathy * 2; ?>
                    <div class="progress" role="progressbar" aria-label="Danger striped example" aria-valuenow="100"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped overflow-visible" echo
                            style="width: <?php echo $with_pb5; ?>%"><strong style="padding-left: 30px">Empathy</strong>
                        </div>
                    </div>
                    <?php $with_pb6 = $clean * 2; ?>
                    <div class="progress" role="progressbar" aria-label="Danger striped example" aria-valuenow="100"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped overflow-visible" echo
                            style="width: <?php echo $with_pb6; ?>%"><strong style="padding-left: 30px">Clean</strong>
                        </div>
                    </div>
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