<?php
  require_once (__DIR__.'/../config/config.php');
  $post_id = h($_POST['post_id']);
  $edit_content = h($_POST['post_edit']);
  $postModel = new \PhpBbs\Model\Post();
  $post = $postModel->fincEachPost($post_id);
  if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
    echo "トークンが有効ではありません";
    header('Location:'.SITE_URL.'/php-bbs/views/show.php?id='.$post_id);
    exit;
  }
  if ($post->user_id !== $_SESSION['user_id']){
    header('Location:'.SITE_URL.'/php-bbs/views/show.php?id='.$post_id);
    exit;
  } else {
    $commonModel = new \PhpBbs\Model\Common();
    $stmt = $commonModel->db->prepare('update posts set content = :content where id = :post_id');
    $stmt->bindValue(':content', $edit_content);
    $stmt->bindValue(':post_id', $post_id);
    $stmt->execute();
    header('Location:'.SITE_URL.'/php-bbs/views/show.php?id='.$post_id);
    exit;
  }