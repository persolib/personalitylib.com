<html>

<head>
  <title>hCaptcha Demo</title>
  <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
</head>

<body>
  <form action="#" method="POST">
    <input type="text" name="email" placeholder="Email" />
    <input type="password" name="password" placeholder="Password" />
    <div class="h-captcha" data-sitekey="d34e4db5-5695-4abb-be9a-c475793946e1" data-theme="dark">
    </div>
    <br />
    <input type="submit" value="Submit" />
  </form>
  <?php
  $data = array(
    'secret' => "ES_2866cf23d12b446492e55e7d96719c56",
    'response' => $_POST['h-captcha-response']
  );
  $verify = curl_init();
  curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
  curl_setopt($verify, CURLOPT_POST, true);
  curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
  curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($verify);
  // var_dump($response);
  $responseData = json_decode($response);
  if ($responseData->success) {
    echo ("succes");
  } else {
    echo ("failed");
  }
  ?>

</body>

</html>