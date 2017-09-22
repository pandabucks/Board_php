<?php
  require_once (__DIR__.'/../config/config.php');

  // 新規登録画面の処理
  $app = new PhpBbs\Controller\Signup();
  $app->run();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../assets/stylesheets/main.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
  <title>Finc最終研修 　新規登録ページ</title>
</head>
<body>
<header class="top-nav">
  <div class="header-wrapper clearfix">
    <div class="ribbon ribbon-top-left">
      <span>研修1修了テスト</span>
    </div>
    <div class="header-content">
      <h1 class="headler-main-title">
        新規登録ページ
      </h1>
      <p><a href="#">file:///Library/WebServer/Documents/php-bbs/views/show.html</a></p>
    </div>
  </div>
</header>
<div class="main-wrapper">
  <div class="signinup_form_area">
    <h2>新規登録</h2>
    <form action="" method="POST">
      <div ng-class="signinup_form_item">
        <label for="email"></label>
        <input type="text" name="email" placeholder="email" class="signinup_input_email"></input>
        <p class="signinup-form-erros">
          <?= h($app->getErrors('email'));?>
        </p>
        <label for="password"></label>
        <input type="password" name="password" placeholder="password" class="signinup_input_password">
        <p class="signinup-form-erros">
          <?= h($app->getErrors('password'));?>
        </p>
        <input type="hidden" name="token" value="<?= h($_SESSION['token']);?>">
        <div class="signinup_button-panel">
          <input type="submit" class="button" value="Sign Up">
        </div>
        <p>
          登録がお済みの方はこちらから<a href="./signin.php">ログイン</a>
        </p>
      </div>
    </form>
  </div>
</div>
</body>
</html>

