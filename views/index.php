<?php
  require_once (__DIR__.'/../config/config.php');
  $app = new PhpBbs\Controller\Index();
  $app->run();
?>  
<!DOCTYPE>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
  <link rel="stylesheet" type="text/css" href="../assets/stylesheets/main.css">
  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <title>Finc研修1 　トップページ</title>
</head>
<body>
<header class="top-nav">
  <div class="header-wrapper clearfix">
    <div class="ribbon ribbon-top-left">
      <span>研修1修了テスト</span>
    </div>
    <div class="header-content">
      <h1 class="headler-main-title">
        トップページ
      </h1>
      <p><a href="./index.php">トップページ</a></p>
    </div>
  </div>
</header>
<div class="main-wrapper clearfix">
  <div class="main-content-area">
    <div class="main-show-page-wrapper">
      <div class="top-main-area-box">
        <h3>Finc研修1終了課題の掲示板</h3>
        <p>  
          <h4>技術仕様</h4>
          <ul class="top-main-area-box-list">
            <li>php</li>
            <li>MySQL</li>
            <li>Apache</li>
            <li>hogehoge</li>
          </ul>
        </p>
        <div class="top-logout-area">
          <form action="logout.php" method="post" id="logout">
            <?= h($app->me()->email); ?> <input type="submit" value="Log Out">
            <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
          </form>
        </div>
      </div>
      <div class="top-main-area-box">
        <h3>スレッド一覧（<?= count($app->getValues()->posts);?>）</h3>
        <div>
          <ul class="top-main-thread-list-box">
            <?php foreach($app->getValues()->posts as $post) :?>
              <li class="top-main-thread-list"><a href="show.php?id=<?= h($post->id);?>"><?= h($post->title); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="top-main-area-box">
        <h3>新規スレッド作成</h3>
        <div class="top-main-thread-build-area">
          <form action="" method="POST">
            <p class="top-main-thread-build-content">
              <label for="title">スレッド名</label>
              <input name="title" class="top-main-thread-inputarea">
            </p>
            <p class="top-main-thread-build-content">
              <label for="content">本文</label>
              <textarea name="content" class="top-main-thread-textarea" rows="5"></textarea>
            </p>
            <input type="hidden" name="token" value="<?= h($_SESSION['token']);?>">
            <div class="top-main-thread-build-button-area">
              <button type="submit">投稿する</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <aside class="right-sidebar">
    <img src="../assets/img/ad_sample.png">
  </aside>
</div>
</body>
</html>
