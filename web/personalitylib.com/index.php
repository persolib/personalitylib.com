<?php
    require_once './conf.php';

    $value = "PersoTag";
    if (isset($_GET['tag'])) {
        $tag = $_GET["tag"];    
        
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
            $url = "personality/?tag=" . $tag;
            header("Location: $url");
            exit;
        } else {
            $url = "https://error.personalitylib.com/500/?error=persotag&tag=" . $tag;
            header("Location: $url");
            exit;
        }
    }else{
        if (!isset($_POST["tag"]) || empty($_POST["tag"])) {
            $value = "PersoTag";
        } else if (!ctype_digit($_POST["tag"])) {
            $value = "The Tag can only contain Numbers";
        } else {
            $length = strlen($_POST["tag"]);
            if ($length < 6) {
                $value = "The Tag is too short";
            } else if ($length > 6) {
                $value = "The Tag is too long";
            } else{
                $url = "?tag=" . urlencode($_POST["tag"]);
                header("Location: $url");
                exit;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <script src="public/bootstrap/bootstrap.bundle.js"></script>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="public/favicon.ico" />
    <title>PersonalityLib</title>
    <meta name="title" content="PersonalityLib" />
    <link rel="stylesheet" href="public/css/style.css" />
    <!--Google Ads-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4168649657374641"
        crossorigin="anonymous"></script>
</head>

<body>
    <header class="hstack gap-2">
        <h1 class="titel p-2">
            <a href="https://personalitylib.com/">PersonalityLib</a>
            <span class="badge p-2 text-bg-light">BETA</span>
        </h1>
        <div class="link-tree p-2 ms-auto">
            <button type="button" class="btn btn-outline-primary active home"
                onclick="window.location.href='https://personalitylib.com/'">
                Home
            </button>
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <!--TODO: if allready signed in: link to Profile-->
                <button type="button" class="btn btn-outline-primary"
                    onclick="window.location.href='./auth/?back=home'">
                    LogIn
                </button>
                <!--TODO: if allready signed in: link to Personality (profile/new/submit.php?id=)-->
                <button type="button" class="btn btn-outline-primary" onclick="window.location.href='./profile/new'">
                    Create
                </button>
                <button type="button" class="btn btn-outline-primary" onclick="window.location.href='./about'">
                    About
                </button>
            </div>
        </div>
        </div>
    </header>
    <main>
        <div class="input-div">
            <nav class="navbar bg-body-tertiary">
                <form class="container-fluid" action="index.php" method="POST">
                    <div class="input-group">
                        <label for="tag" class="input-group-text" id="basic-addon1">#</label>
                        <input type="text" id="tag" class="form-control" placeholder="<?php echo $value;?>"
                            aria-label="PersoTag" name="tag" aria-describedby="basic-addon1" />

                    </div>
                    <div class="submit-div">
                        <div class="button-submit-div">
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <input type="submit" value="Send" class="input-button btn btn-outline-primary"
                                    style="border-top-right-radius:0; border-bottom-right-radius:0"></input>
                                <button type="button" class="input-button btn btn-outline-primary"
                                    data-bs-toggle="modal" data-bs-target="#Help"
                                    style="border-top-left-radius:0; border-bottom-left-radius:0">
                                    What is a PersoTag
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="Help" data-bs-backdrop="static" data-bs-keyboard="false"
                                    tabindex="-1" aria-labelledby="HelpLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="HelpLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                A PersoTag is a unique tag ID that you get when you create your own
                                                entry in the Personality Library. With a PersoTag, you can find other
                                                people's entries or let yourself be found by, for example, adding it to
                                                the bio of another social media platform.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="window.location.href='./profile/new'">Get your own
                                                    Tag</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal End-->
                            </div>
                        </div>
                    </div>
                </form>
            </nav>
        </div>
    </main>
    <footer>
        <span>
            <p>Links:</p>
            <span class="hstack gap-4 media-uvis">
                <p class="p-2"><a href="about/">About</a></p>
                <p class="p-2"><a href="legalnotice/">Legal Notice</a></p>
                <p class="p-2"><a href="licence/">Licence</a></p>
                <p class="p-2">
                    <a href="https://github.com/persolib/personalitylib.com">Github</a>
                </p>
            </span>
            <span class="media-vis">
                <span class="hstack gap-2">
                    <p class=""><a href="about/">About</a></p>
                    <p class=""><a href="legalnotice/">Legal Notice</a></p>
                </span>
                <span class="hstack gap-2">
                    <p class=""><a href="licence/">Licence</a></p>
                    <p class="">
                        <a href="https://github.com/persolib/personalitylib.com">Github</a>
                    </p>
                </span>
            </span>
        </span>
        <span class="footer-span">
            <p>© 2024 PersonalityLib</p>
        </span>
    </footer>
</body>

</html>