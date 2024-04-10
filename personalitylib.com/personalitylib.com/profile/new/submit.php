<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
} else {
    if (isset($_COOKIE['email'], $_COOKIE['password'])) {
        $url = "../../auth/?back=new/submit.php";
        header("Location: $url");
        exit;
    } else {
        $url = "../../auth";
        header("Location: $url");
        exit;
    }
}

require_once '../../conf.php';

    
$tag = rand(100000,999999);
$ready = false;   

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if (!$conn) {
    $url = "https://error.personalitylib.com/500/?error=sql";
    header("Location: $url");
    exit;
}

$required_fields = ['song', 'language', 'word', 'inoutside', 'pronauns', 'sexuality', 'religion', 'color', 'mentality', 'music', 'mental_health', 'physical_health', 'like_people', 'meat_people', 'friends', 'empathy', 'clean', 'bio'];

foreach ($required_fields as $field) {
    if (!isset($_POST[$field])) {
        $url = ".";
        header("Location: $url");
        exit;
    }
}

// Prüfen, ob der Tag bereits existiert
$sql = "SELECT * FROM `tagdata` WHERE user_id = '$user_id'";
$result = $conn->query($sql);
if (!mysqli_num_rows($result) > 0) {
    // Construct the SQL statement with actual values
    $sql = "INSERT INTO `tagdata` (`tag`, `user_id`) VALUES ('$tag', '$user_id')";

if ($conn->query($sql) === TRUE) {

    $song = $_POST['song'];
    $language = $_POST['language'];
    $word = $_POST['word'];
    $inoutside = $_POST['inoutside'];
    $pronauns = $_POST['pronauns'];
    $sexuality = $_POST['sexuality'];
    $religion = $_POST['religion'];
    $color = $_POST['color'];
    $mentality = $_POST['mentality'];
    $music = $_POST['music'];
    $mental_health = $_POST['mental_health'];
    $physical_health = $_POST['physical_health'];
    $like_people = $_POST['like_people'];
    $meat_people = $_POST['meat_people'];
    $friends = $_POST['friends'];
    $empathy = $_POST['empathy'];
    $clean = $_POST['clean'];
    $bio = $_POST['bio'];
    
    $sql = "INSERT INTO `persodata`(`tag`, `mental_health`, `physical_health`, `hobbys`, `music`, `like_people`,
    `meat_people`, `friends`, `in/outside`, `empathy`, `relegion`, `mentality`, `clean`, `own_word`, `bio`, `song`, `sex`,
    `pronauns`, `language`, `favourite_color`) VALUES
    ('$tag','$mental_health','$physical_health','TODO','$music','$like_people','$meat_people','$friends','$inoutside','$empathy','$religion','$mentality','$clean','$word','$bio','$song','$sexuality','$pronauns','$language','$color')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
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
    while($row = $result->fetch_assoc()) {
    $tag = $row['tag'];
}
    $ready = true;
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
    <title>Your Tag</title>
    <meta name='title' content='Your Tag' />
    <link rel="stylesheet" href="../../public/css/submit.css" />
    <!--Google Ads-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4168649657374641"
        crossorigin="anonymous"></script>
</head>

<body>
    <header class="z-1 hstack gap-2">
        <h1 class="titel p-2"><a href="https://personalitylib.com/">PersonalityLib</a></h1>
    </header>
    <main class="row g-0">
        <div class="wrapper" style="<?php if($ready==true){echo "display: none;";}?>">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../../public/img/profile-placeholder.jpeg" class="img-fluid rounded-start"
                            alt="Profile Picture">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Your Personality Page is ready!</h5>
                            <br>
                            <p class="card-text">Your Personality Page has been saved and can be accessed below
                                throughout
                                the Tag</p>
                            <div class="alert alert-secondary" role="alert">
                                Your Tag: <strong><?php echo $tag;?></strong>
                            </div>
                            <p class="card-text"><small class="text-body-secondary">Your page URL:
                                    <strong><a
                                            href="../../personality/?tag=<?php echo $tag;?>">https://personalitylib.com/personality/?tag=<?php echo $tag;?></a></strong></small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="preview col-md-2">
                <?php
                if($ready==true){
                    // Ausgabe aller Variablen
                    echo "<pre style='color: white;'>";
                    echo "<strong>Song: </strong>" . $song . "\n";
                    echo "<strong>Sprache: </strong>" . $language . "\n";
                    echo "<strong>Lieblingswort: </strong>" . $word . "\n";
                    echo "<strong>Introvertiert: </strong>" . $inoutside . "\n";
                    echo "<strong>Pronomen: </strong>" . $pronauns . "\n";
                    echo "<strong>Sexualität: </strong>" . $sexuality . "\n";
                    echo "<strong>Religion: </strong>" . $religion . "\n";
                    echo "<strong>Lieblingsfarbe: </strong>" . $color . "\n";
                    echo "<strong>Mentalität: </strong>" . $mentality . "\n";
                    echo "<strong>Musikgeschmack: </strong>" . $music . "\n";
                    echo "<strong>Mentale Gesundheit: </strong>" . $mental_health . "\n";
                    echo "<strong>Körperliche Gesundheit: </strong>" . $physical_health . "\n";
                    echo "<strong>Menschen mögen: </strong>" . $like_people . "\n";
                    echo "<strong>Menschen treffen: </strong>" . $meat_people . "\n";
                    echo "<strong>Freunde: </strong>" . $friends . "\n";
                    echo "</pre>"; 
                }
            ?>
            </div>
        </div>
        <div class="wrapper" style="<?php if($ready==false){echo "display: none;";}?>">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../../public/img/profile-placeholder.jpeg" class="img-fluid rounded-start"
                            alt="Profile Picture">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">You allready have a Personality!</h5>
                            <br>
                            <div class="alert alert-secondary" role="alert">
                                Your Tag: <strong><?php echo $tag;?></strong>
                            </div>
                            <p class="card-text"><small class="text-body-secondary">Your page URL:
                                    <strong><a
                                            href="../../personality/?tag=<?php echo $tag;?>">https://personalitylib.com/personality/<?php echo $tag;?></a></strong></small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>