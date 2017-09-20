<?php
define('DB_NAME', 'bbs_board');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'hogehoge');
define('PDO_DSN', 'mysql:host=127.0.0.1;dbname=' . DB_NAME);

define('HOGE','hogehoge')

try {
  // DBCONNECT
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // SELECT_POST
  $stmt = $db->prepare("select * from posts limit ?");
  $stmt->bindValue(1,1, PDO::PARAM_INT);
  $stmt->execute();
  $post = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // disconect
  $db = null;
} catch(PDOException $e) {
  echo $e->getMessage();
  exit;
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../assets/stylesheets/main.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
  <title>Finc最終研修 - <?php echo htmlspecialchars($post[0]["title"], ENT_QUOTES, "UTF-8"); ?></title>
</head>
<body>
<header class="top-nav">
  <div class="header-wrapper clearfix">
    <div class="ribbon ribbon-top-left">
      <span>研修1修了テスト</span>
    </div>
    <div class="header-content">
      <h1 class="headler-main-title">
        <?php echo htmlspecialchars($post[0]["title"], ENT_QUOTES, "UTF-8"); ?>
      </h1>
      <p><a href="#">file:///Library/WebServer/Documents/php-bbs/views/show.html</a></p>
    </div>
  </div>
</header>
<div class="main-wrapper clearfix">
  <div class="main-content-area">
    <div class="main-show-page-wrapper">
      <div class="show-top-comment-num">
        コメント14件
      </div>
      <div class="show-top-nav-area">
        <ul class="show-top-nav-list">
          <li><a href="#" class="show-to-nav-link">全部見る</a></li>
          <li><a href="#" class="show-to-nav-link">1-100</a></li>
          <li><a href="#" class="show-to-nav-link">最新50</a></li>
          <li><a href="#" class="show-to-nav-link">経緯版へ戻る</a></li>
        </ul>
      </div>
      <article>
        <div class="show-page-title-area">
          <h2><?php echo htmlspecialchars($post[0]["title"], ENT_QUOTES, "UTF-8"); ?></h2>
        </div>
        <div class="show-page-main-area">
          <div class="show-toic-area">
            <div class="show-meta-data">
              <span class="meta-number meta-number-first">1</span>
              <span class="meta-name">風吹けば名無し＠無断転載禁止</span>
              <span>2017/09/16(土) 12:11:02.47</span>
            </div>
            <div class="show-comement-data">
              <p>
              </p>
            </div>
          </div>
          <div class="show-comment-area">
            <div class="show-meta-data">
              <span class="meta-number">2</span>
              <span class="meta-name">風吹けば名無し＠無断転載禁止</span>
              <span>2017/09/16(土) 12:11:02.47</span>
            </div>
            <div class="show-comement-data">
              <p>
                また実話 じゃなかった
              </p>
            </div>
          </div>
          <div class="show-comment-area">
            <div class="show-meta-data">
              <span class="meta-number">3</span>
              <span class="meta-name">風吹けば名無し＠無断転載禁止</span>
              <span>2017/09/16(土) 12:11:02.47</span>
            </div>
            <div class="show-comement-data">
              <p>
                トルシエの時と似てるな
              </p>
            </div>
          </div>
        </div>
      </article>
      <div class="show-bottom-comment-num">
        コメント14件
      </div>
      <div class="show-page-comment-area">
      <h4>この記事にコメントを残す</h4>
      </div>
      <div class="page-comment-area">
        <form action="" method="POST">
          <p>
          <textarea class="page_comment_textarea" placeholder="コメント内容" rows="5", cols="70", name="COMMENT"></textarea></p>
          <p><input type="submit" value="コメントする" class="page_comment_submit"></p>
        </form>
      </div>

    </div>
  </div>

  <aside class="right-sidebar">
    <img src="../assets/img/ad_sample.png">
  </aside>
</div>
</body>
</html>

