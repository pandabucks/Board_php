<?php
  require_once (__DIR__.'/../config/config.php');
  $app = new PhpBbs\Controller\Show();
  $app->run($_GET['id']);
?>  
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../assets/stylesheets/main.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="../assets/javascripts/main.js"></script>
  <title><?= $app->getValues()->post->title ?></title>
</head>
<body>
<header class="top-nav">
  <div class="header-wrapper clearfix">
    <div class="ribbon ribbon-top-left">
      <span>研修1修了テスト</span>
    </div>
    <div class="header-content">
      <h1 class="headler-main-title"><?= $app->getValues()->post->title ?></h1>
      <p><a href="./index.php">トップページに戻る</a></p>
    </div>
  </div>
</header>
<div class="main-wrapper clearfix">
  <div class="main-content-area">
    <div class="main-show-page-wrapper">
      <article>
        <div class="show-page-title-area">
          <h2><?= $app->getValues()->post->title ?></h2>
        </div>
        <div class="show-page-main-area">
          <div class="show-topic-area">
            <div class="show-meta-data">
              投稿者：<span class="meta-name">ユーザーID:<?= $app->getValues()->post->user_id?></span>
              <span>2017/09/16(土) 12:11:02.47</span>
            </div>
            <div class="show-comement-data">
              <p>
                <?= $app->getValues()->post->content ?>
            </div>
            <?php if ($app->getValues()->post->user_id === $_SESSION['user_id']) { ?>
              <div class="show-edit-delete-button-area">
                <button id="edit-post-button">投稿編集</button>
                <button type="button"onclick="location.href='deletepost.php?id=<?=$_GET['id']?>'" style="background: red;">投稿削除</button>
              </div>
              <div class="show-post-edit-area hidden-form">
                <h5>投稿を編集する</h5>
                <form action="editpost.php" method="post">
                  <p>
                    <textarea name="post_edit" rows="3" class="show-edit-topic-textarea"><?= $app->getValues()->post->content ?></textarea>
                  </p>
                  <input type="hidden" name="post_id" value="<?= $app->getValues()->post->id?>">
                  <input type="hidden" name="token" value="<?= h($_SESSION['token']);?>">
                  <p>
                    <input type="submit" value="編集">
                  </p>
                </form>
              </div>
            <?php } ?>
          </div>



          <?php $count = 1 ?>
          <?php foreach($app->getValues()->comments as $comment) :?>
          <div class="show-comment-area">
            <div class="show-meta-data">
              <span class="meta-number"><?= $count?></span>
              <span class="meta-name">ユーザーID：<?= $comment->user_id?></span>
              <span>2017/09/16(土) 12:11:02.47</span>
            </div>
            <div class="show-comement-data">
              <p>
                <?= h($comment->content); ?>
              </p>
            </div>
            <?php if ($comment->user_id === $_SESSION['user_id']) { ?>
            <div class="show-edit-delete-button-area">
              <button class="edit-comment-button">コメント編集</button><button type="button"onclick="location.href='deletecomment.php?post_id=<?=h($_GET['id']);?>&comment_id=<?= $comment->id?>'" style="background: red;">コメント削除</button>
            </div>
            <div class="show-post-edit-comment-area hidden-form">
              <h5>コメントを編集する</h5>
              <form action="editcomment.php" method="post">
                <p>
                  <textarea name="comment_edit" rows="3" lass="show-edit-topic-textarea"><?= h($comment->content); ?></textarea>
                </p>
                <input type="hidden" name="comment_id" value="<?= h($comment->id);?>">
                <input type="hidden" name="token" value="<?= h($_SESSION['token']);?>">
                <input type="hidden" name="post_id" value="<?= h($app->getValues()->post->id);?>">
                <p>
                  <input type="submit" value="編集">
                </p>
              </form>
            </div>
           <?php } ?>

          </div>
          <?php $count = $count +1 ?>
          <?php endforeach; ?>
        </div>
      </article>
      <div class="show-bottom-comment-num">
        コメント<?= count($app->getValues()->comments);?>件
      </div>
      <div class="show-page-comment-area">
      <h4>この記事にコメントを残す</h4>
        <div class="page-comment-area">
          <form action="" method="POST">
            <p>
            <textarea class="show-page-comment-textarea" rows="5" cols="70" name="comment"></textarea></p>
            <input type="hidden" name="token" value="<?= h($_SESSION['token']);?>">
            <p><input type="submit" value="コメント" class="page_comment_submit"></p>
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

