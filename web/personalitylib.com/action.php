<?php
    function reCaptcha($recaptcha)
    {
        $secret = "6LfZ_08pAAAAAJ_F3MaWw2JM7qBX7-IbtEexyn7W";
        $ip = $_SERVER['REMOTE_ADDR'];

        $postvars = array("secret" => $secret, "response" => $recaptcha, "remoteip" => $ip);
        $url = "https://www.google.com/recaptcha/api/siteverify";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        $data = curl_exec($ch);
        curl_close($ch);

        return json_decode($data, true);
    }

    $recaptcha = $_POST['g-recaptcha-response'];

    $res = reCaptcha($recaptcha);

    if ($res['success']) {
        $email = $_POST['email'];
        echo "Success " . $email;
    } else {
        echo "CAPTCHA Failed";
    }
    ?>