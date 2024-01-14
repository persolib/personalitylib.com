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
    echo("succes");
exit();
  } else {
    echo ("failed");
  }
  ?>