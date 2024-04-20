<?php
    if (isset($_GET['back'])) {
        $back = $_GET['back']; 
    } else {
        $back = "";
    }

    session_start();

    // Laden des Composer Autoloaders
    require_once __DIR__ . '/vendor/autoload.php';

    // PHPMailer-Namespace importieren
    use PHPMailer\PHPMailer\PHPMailer;

    if (!isset($_SESSION['user_id'], $_SESSION['password_hash'], $_SESSION['email'], $_SESSION['name'])) {
            $url = "..";
            header("Location: $url");
            exit;
    } else if (isset($_GET["error"])) {
        if ($_GET["error"] == "2") {
            $error = "The verification code that you entered is incorrect!";
        } else if ($_GET["error"] == "1") {
            $error = "There was an error sending the email!";
        } else {
            $error = $_GET["error"];
        }
    } else if (isset($_POST["data"])) {
        $form_code = $_POST["code"];
        $code = $_SESSION["code"];

        if ($code == $form_code) {
            $_SESSION["email_verify"] = true;
            header("Location: ../data/?back=$back");
            exit;
        } else {
            header("Location: .?error=2&back=$back");
            exit;
        }
    } else {
        $user_id = $_SESSION['user_id'];
        $email = $_SESSION['email']; 
        $name = $_SESSION['name'];
        $code = rand(100000,999999);
        
        $_SESSION["code"] = $code;

        // HTML-Nachrichtentext laden
        $html = file_get_contents('contents.html');

        // Dynamische Inhalte in HTML einfügen
        $html = str_replace('{{email}}', $email, $html);
        $html = str_replace('{{code}}', $code, $html);

        // Neue PHPMailer-Instanz erstellen
        $mail = new PHPMailer();

        // SMTP-Einstellungen festlegen
        $mail->isSMTP();
        $mail->Host = 'mail.manitu.de';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->Username = 'support@personalitylib.com';
        $mail->Password = 'HvDDpq5U4Zejqwgu';

        // Absender- und Empfängerinformationen
        $mail->setFrom('noreply@manitu.de', "Support");
        $mail->addAddress($email, $name);

        // HTML-Nachrichtentext und Content-Type festlegen
        $mail->msgHTML($html, __DIR__);
        $mail->ContentType = 'text/html';

        // Combine subject, name, and message for plain text body
        $plainTextBody = "Subject: Verify your Email \n From: PersonalityLib \n\n Code: $code";

        // Set the plain text body
        $mail->AltBody = $plainTextBody;

        // Betreff festlegen
        $mail->Subject = "Verify your Email";

        // E-Mail versenden und Fehlermeldung behandeln
        if (!$mail->send()) {
            header("Location: .?error=1&back=$back");
            exit;
        }
    }?>
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
            <?php if (isset($error)) {?> <div class="alert alert-danger error" role="alert">
                <?php echo $error;?>
            </div>
            <?php } ?>
            <div class="card-body">
                <h5 class="card-title">Verify your Email</h5>
                <p class="card-text">We have sent an verification email to
                    <strong><?php if (isset($email)){echo $email;}else{echo "you";}?></strong>
                </p>
                <br>
                <form class="needs-validation" action=".<?php echo '/?back=' . $back;?>" method="post" novalidate>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="addon-wrapping">#</span>
                        <input type="number" min="100000" max="999999" class="form-control" name="code" id="code"
                            placeholder="Code" aria-label="Code" aria-describedby="resent" required>
                        <div class="valid-feedback">
                            Nice!
                        </div>
                        <button class="btn btn-outline-secondary" type="button" id="resent"
                            onclick="window.location.href='.'">Resent Email</button>
                    </div>
                    <br>
                    <div class="col-12">
                        <button name="data" class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="../../public/js/form.js"></script>
    </main>
</body>

</html>