function get_captcha() {
const secretKey = process.env.SECRET_KEY;
  const data = {
    secret: secretKey,
    response: $_POST["h-captcha-response"],
  };

  const verify = curl_init();
  curl_setopt(verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
  curl_setopt(verify, CURLOPT_POST, true);
  curl_setopt(verify, CURLOPT_POSTFIELDS, http_build_query(data));
  curl_setopt(verify, CURLOPT_RETURNTRANSFER, true);

  const response = curl_exec(verify);
  // var_dump(response);

  const responseData = JSON.parse(response);

  if (responseData.success) {
    echo("success");
    exit();
  } else {
    echo("failed");
  }
}
