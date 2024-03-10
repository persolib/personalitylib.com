<?php
  declare(strict_types=1);

  require('vendor/autoload.php');

  use Auth0\SDK\Auth0;
  use Auth0\SDK\Configuration\SdkConfiguration;

  $configuration = new SdkConfiguration(
    domain: 'dev-bw8n0lrv0tmm5rgb.us.auth0.com',
    clientId: 'M5j3ZO0DqG0nzSv5weIiC9CC5FCSCkLx',
    clientSecret: 'cm-rGis9jk_ub2bgYgorkqc2ji75_tId0kogWmi2js-Uuy9_Iwg-d9mAyRDGHYPQ',
    redirectUri: 'http://' . $_SERVER['HTTP_HOST'] . '/callback',
    cookieSecret: '4f60eb5de6b5904ad4b8e31d9193e7ea4a3013b476ddb5c259ee9077c05e1457'
  );

  $sdk = new Auth0($configuration);

  require('router.php');