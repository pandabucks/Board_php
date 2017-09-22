<?php
  require_once (__DIR__.'/../config/config.php');
  $post_id = h($_POST['post_id']);
  $comment_id = h($_POST['comment_id']);
  $edit_content = h($_POST['comment_edit']);
  $commentModel = new \PhpBbs\Model\Comment();
  $comment = $commentModel->findEachComment($comment_id);
  if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
    echo "トークンが有効ではありません";
    header('Location:'.SITE_URL.'/php-bbs/views/show.php?id='.$post_id);
    exit;
  }
  if ($comment->user_id !== $_SESSION['user_id']){
    header('Location:'.SITE_URL.'/php-bbs/views/show.php?id='.$post_id);
    exit;
  } else {
    $commonModel = new \PhpBbs\Model\Common();
    $stmt = $commonModel->db->prepare('update comments set content = :content where id = :content_id');
    $stmt->bindValue(':content', $edit_content);
    $stmt->bindValue(':content_id', $comment_id);
    $stmt->execute();
    header('Location:'.SITE_URL.'/php-bbs/views/show.php?id='.$post_id);
    exit;
  }