<?php
  require_once (__DIR__.'/../config/config.php');
  $post_id = h($_GET['id']);
  $postModel = new \PhpBbs\Model\Post();
  $post = $postModel->fincEachPost($post_id);
  if ($post->user_id !== $_SESSION['user_id']){
    header('Location:'.SITE_URL.'/php-bbs/views/show.php?id='.$post_id);
    exit;
  } else {
    $commonModel = new \PhpBbs\Model\Common();
    $stmt = $commonModel->db->prepare('delete from posts where id = :post_id');
    $stmt->bindValue(':post_id', $post_id);
    $stmt->execute();
    header('Location:'.SITE_URL.'/php-bbs/views/');
    exit;
  }