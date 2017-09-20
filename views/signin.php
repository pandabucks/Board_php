<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../assets/stylesheets/main.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
  <title>Finc最終研修 　ログインページ</title>
</head>
<body>
<header class="top-nav">
  <div class="header-wrapper clearfix">
    <div class="ribbon ribbon-top-left">
      <span>研修1修了テスト</span>
    </div>
    <div class="header-content">
      <h1 class="headler-main-title">
        ログインページ
      </h1>
      <p><a href="#">file:///Library/WebServer/Documents/php-bbs/views/show.html</a></p>
    </div>
  </div>
</header>
<div class="main-wrapper">
  <div class="signinup_form_area">
    <h2>ログイン</h2>
    <form action="" method="POST">
      <div ng-class="signinup_form_item">
        <label for="email"></label>
        <input type="email" name="email" placeholder="email" class="signinup_input_email"></input>
        <label for="password"></label>
        <input type="password" name="password" placeholder="password" class="signinup_input_password">
        <div class="signinup_button-panel">
          <input type="submit" class="button" value="Sign In">
        </div>
        <p>
          登録がまだの方はこちらから<a href="./signup.php">サインアップ</a>
        </p>
      </div>
    </form>
  </div>
</div>
</body>
</html>

