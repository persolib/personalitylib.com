<?php
    require_once '../../conf.php';
    // Create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    session_start();
    if (isset($_SESSION['user_id'])) {
        $logged = true;
        $user_id = $_SESSION['user_id'];
        
        $sql = "SELECT * FROM `tagdata` WHERE user_id = '$user_id'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = $result->fetch_assoc()) {
                $tag = $row['tag'];
            }
            $ready = true;
            header("location: ../../personality/".$tag);
            exit();
        }
    } else {
        if (isset($_COOKIE['email'], $_COOKIE['password'])) {
            $url = "../../auth/?back=profile/new";
            header("Location: $url");
            exit;
        } else {
            $url = "../../auth/?back=profile/new";
            header("Location: $url");
            exit;
        }
    }
    
    require_once '../../conf.php';
    
    
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
        $url = "../../auth";
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
    <script src="../../public/bootstrap/bootstrap.bundle.js"></script>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../../public/favicon.ico" type="image/x-icon">
    <?php echo"<title>$username - New</title>" ?>
    <?php echo "<meta name='title' content='".$username." - New' />" ?>
    <link rel="stylesheet" href="../../public/css/new.css" />
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
                <li class="breadcrumb-item"><a href="..">Profile</a></li>
                <?php echo"<li class='breadcrumb-item active' aria-current='page'>$username - New</li>" ?>
            </ol>
        </nav>

        <div class="link-tree p-2 ms-auto">
            <button type="button" class="btn btn-outline-primary home" onclick="window.location.href='../..'">
                Home
            </button>
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <?php $auth = "../../auth"; $profile = "../../profile"; $logout = "../../auth/logout"; $about = "../../about"; $personality = "../../profile/new";?>
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
    <main>
        <div class="container text-center">
            <form class="row g-3 needs-validation" action="submit.php" method="post" novalidate>
                <div class="col-md-4">
                    <label for="Song" class="form-label">Whats your favourite song?</label>
                    <input type="text" class="form-control" name="song" id="song" placeholder="Song" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="language" class="form-label">Whats your primary language?</label>
                    <input type="text" class="form-control" name="language" id="language" placeholder="Language"
                        required>
                    <div class="valid-feedback">
                        Cool!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="word" class="form-label">Whats your favourite word?</label>
                    <input type="text" class="form-control" name="word" id="word" placeholder="Word" required>
                    <div class="valid-feedback">
                        Nice!
                    </div>
                </div>
                <br>
                <br>
                <div class="col-md-2">
                    <label for="inoutside" class="form-label">Are you an introvert?</label>
                    <select class="form-select" name="inoutside" id="inoutside" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                        <option value="maybe">Maybe</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid option.
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="pronauns" class="form-label">What are your Pronauns?</label>
                    <select class="form-select" name="pronauns" id="pronauns" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="he/him">He/Him</option>
                        <option value="she/her">She/Her</option>
                        <option value="they/them">They/Them</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid option.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="sexuality" class="form-label">What is your gender?</label>
                    <select class="form-select" name="sexuality" id="sexuality" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="diverse">Diverse</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid option.
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="religion" class="form-label">Whats your religion?</label>
                    <select class="form-select" name="religion" id="religion" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="christianity">Christianity</option>
                        <option value="islam">Islam</option>
                        <option value="hinduism">Hinduism</option>
                        <option value="buddhism">Buddhism</option>
                        <option value="judaism">Judaism</option>
                        <option value="sikhism">Sikhism</option>
                        <option value="taoism">Taoism</option>
                        <option value="bahai">Bahai</option>
                        <option value="other">Other...</option>
                        <option value="none">None</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid option.
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="color" class="form-label">Whats your favourite color?</label>
                    <input type="color" class="form-control form-control-color" id="color"
                        title="Choose your favourite color">
                    <div class="invalid-feedback">
                        Please select a valid option.
                    </div>
                </div>
                <br>
                <br>
                <div class="col-md-12">
                    <label for="bio" class="form-label">Write somthing about your self</label>
                    <textarea class="form-control" maxlength="200" rows="6" name="bio" id="bio" placeholder="Bio"
                        required></textarea>
                    <div class="valid-feedback">
                        Awsome!
                    </div>
                </div>
                <br>
                <div class="col-md-6">
                    <label for="mentality" class="form-label">Describe your mentality</label>
                    <textarea class="form-control" maxlength="100" rows="3" name="mentality" id="mentality"
                        placeholder="Mentality" required></textarea>
                    <div class="valid-feedback">
                        OK!
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="music" class="form-label">Describe your music taste</label>
                    <textarea class="form-control" maxlength="100" rows="3" name="music" id="music" placeholder="Music"
                        required></textarea>
                    <div class="valid-feedback">
                        Wow!
                    </div>
                </div>
                <br>
                <br>
                <div class="col-md-4 range-wrap">
                    <label for="mental_health" class="form-label">How mentally healthy are you?</label>
                    <input type="range" class="form-range range" name="mental_health" min="0" max="50"
                        id="mental_health">
                    <br>
                    <output class="bubble"></output>
                </div>
                <div class="col-md-4 range-wrap">
                    <label for="physical_health" class="form-label">How physically healthy are you?</label>
                    <input type="range" class="form-range range" name="physical_health" min="0" max="50"
                        id="physical_health">
                    <br>
                    <output class="bubble"></output>
                </div>
                <div class="col-md-4 range-wrap">
                    <label for="empathy" class="form-label">How empathetic are you?</label>
                    <input type="range" class="form-range range" name="empathy" min="0" max="50" id="empathy">
                    <br>
                    <output class="bubble"></output>
                </div>
                <br>
                <br>
                <div class="col-md-6 range-wrap">
                    <label for="like_people" class="form-label">How much do you like people?</label>
                    <input type="range" class="form-range range" name="like_people" min="0" max="50" id="like_people">
                    <br>
                    <output class="bubble"></output>
                </div>
                <div class="col-md-6 range-wrap">
                    <label for="clean" class="form-label">How cleanly are you?</label>
                    <input type="range" class="form-range range" name="clean" min="0" max="50" id="clean">
                    <br>
                    <output class="bubble"></output>
                </div>
                <br>
                <div class="col-md-6 range-wrap">
                    <label for="meat_people" class="form-label">How many people do you meet per month?</label>
                    <input type="range" class="form-range range" name="meat_people" min="0" max="30" id="meat_people">
                    <br>
                    <output class="bubble"></output>
                </div>
                <div class="col-md-6 range-wrap">
                    <label for="friends" class="form-label">How many friends do you have?</label>
                    <input type="range" class="form-range range" name="friends" min="0" max="30" id="friends">
                    <br>
                    <output class="bubble"></output>
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
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
        </div>
        <script src="../../public/js/form.js"></script>
        <script src="../../public/js/range.js"></script>
    </main>
    <footer>
        <span>
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
                    <p class=""><a href="../../legalnotice/">Legal Notice</a></p>
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
</body>

</html>