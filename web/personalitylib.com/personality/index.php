<?php
    //sql-local
    $servername = "localhost";
    $sql_username = "root";
    $password = "";
    $dbname = "db100110";
    
    //sql-server
    // $servername = "mysql10.manitu.net";
    // $sql_username = "u100110";
    // $password = "ShJ6nHfvrWFyr9Nu";
    // $dbname = "db100110";
    
    if (isset($_GET['tag'])) {
        // Create connection
        $conn = mysqli_connect($servername, $sql_username, $password, $dbname);

        // Check connection
        if (!$conn) {
            $url = "https://error.personalitylib.com/500/?error=sql";
            header("Location: $url");
            exit;
        }
        
        $tag = $_GET["tag"]; 
        
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
                $birth = $row["birthdate"];
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
                <button type="button" class="btn btn-outline-primary" onclick="window.location.href='../auth/'">
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
    <main class="z-0">
        <?php
            $conn = mysqli_connect($servername, $sql_username, $password, $dbname);

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
                    </ul>
                </div>
            </div>

            <br>
            <br>

            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
            <div class="row">
                <div class="col-6 col-md-4">
                    <div class="accordion" id="accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne-1" aria-expanded="true" aria-controls="collapseOne">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div id="collapseOne-1" class="accordion-collapse collapse show"
                                data-bs-parent="#accordion-1">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                    our default variables. It's also worth noting that just about any HTML can go within
                                    the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo-1" aria-expanded="false" aria-controls="collapseTwo">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div id="collapseTwo-1" class="accordion-collapse collapse" data-bs-parent="#accordion-1">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                    our default variables. It's also worth noting that just about any HTML can go within
                                    the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree-1" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="collapseThree-1" class="accordion-collapse collapse" data-bs-parent="#accordion-1">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                    our default variables. It's also worth noting that just about any HTML can go within
                                    the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-6 col-md-4">
                    <div class="accordion" id="accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne-2" aria-expanded="true" aria-controls="collapseOne">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div id="collapseOne-2" class="accordion-collapse collapse show"
                                data-bs-parent="#accordion-2">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                    our default variables. It's also worth noting that just about any HTML can go within
                                    the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo-2" aria-expanded="false" aria-controls="collapseTwo">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div id="collapseTwo-2" class="accordion-collapse collapse" data-bs-parent="#accordion-2">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                    our default variables. It's also worth noting that just about any HTML can go within
                                    the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree-2" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="collapseThree-2" class="accordion-collapse collapse" data-bs-parent="#accordion-2">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                    our default variables. It's also worth noting that just about any HTML can go within
                                    the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-6 col-md-4 accordion-none">
                    <div class="accordion" id="accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne-3" aria-expanded="true" aria-controls="collapseOne">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div id="collapseOne-3" class="accordion-collapse collapse show"
                                data-bs-parent="#accordion-3">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                    our default variables. It's also worth noting that just about any HTML can go within
                                    the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo-3" aria-expanded="false" aria-controls="collapseTwo">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div id="collapseTwo-3" class="accordion-collapse collapse" data-bs-parent="#accordion-3">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                    our default variables. It's also worth noting that just about any HTML can go within
                                    the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree-3" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="collapseThree-3" class="accordion-collapse collapse" data-bs-parent="#accordion-3">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                    our default variables. It's also worth noting that just about any HTML can go within
                                    the <code>.accordion-body</code>, though the transition does limit overflow.
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