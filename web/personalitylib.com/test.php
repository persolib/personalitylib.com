<html>

<head>
  <title>hCaptcha Demo</title>
  <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
</head>

<body>
  <form action="action.php" method="POST">
    <input type="text" name="email" placeholder="Email" />
    <input type="password" name="password" placeholder="Password" />
    <div class="h-captcha" data-sitekey="d34e4db5-5695-4abb-be9a-c475793946e1" data-theme="dark">
    </div>
    <br />
    <input type="submit" value="Submit" />
  </form>
</body>

</html>