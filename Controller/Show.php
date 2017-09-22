<?php
  namespace PhpBbs\Controller;

  class Show extends \PhpBbs\Controller\Common {
    public function run($id) {
      $postModel = new \PhpBbs\Model\Post();
      $this->setValues('post', $postModel->fincEachPost($id));
      $postComment = new \PhpBbs\Model\Comment();
      $this->setValues('comments', $postComment->findAllComment($id)); 
      if ($_SERVER['REQUEST_METHOD'] === POST) {
        $this->createComment($id);
      }
    }

    protected function createComment($post_id){
      try {
        $user_id = ((int)$this->me());
        $comment = $_POST['comment'];
        $commentModel = new \PhpBbs\Model\Comment();
        $comment = $commentModel->create($user_id, $comment, $post_id);
      } catch(PDOException $e) {
        $message = 'Error: ' . $e->getMessage();
        var_dump($message);
      }
      header('Location:'.SITE_URL.'/php-bbs/views/show.php?id='.$post_id);
      exit;
    }
  }