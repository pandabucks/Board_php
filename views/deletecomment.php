<?php
  require_once (__DIR__.'/../config/config.php');
  $post_id = h($_GET['post_id']);
  $comment_id = h($_GET['comment_id']);
  $commentModel = new \PhpBbs\Model\Comment();
  $comment = $commentModel->findEachComment($comment_id);
  if ($comment->user_id !== $_SESSION['user_id']){
    header('Location:'.SITE_URL.'/php-bbs/views/show.php?id='.$post_id);
    exit;
  } else {
    $commonModel = new \PhpBbs\Model\Common();
    $stmt = $commonModel->db->prepare('delete from comments where id = :comment_id');
    $stmt->bindValue(':comment_id', $comment_id);
    $stmt->execute();
    header('Location:'.SITE_URL.'/php-bbs/views/show.php?id='.$post_id);
    exit;
  }