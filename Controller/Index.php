<?php
  namespace PhpBbs\Controller;

  class Index extends \PhpBbs\Controller\Common {
    public function run() {
      if (!$this->isLoggedIn()) {
        //  login
        header('Location:'.SITE_URL.'/php-bbs/views/signin.php');
      }
      $postModel = new \PhpBbs\Model\Post();
      $this->setValues('posts', $postModel->findAll());
      if ($_SERVER['REQUEST_METHOD'] === POST) {
        $this->createPost();
      }
    }

    protected function createPost(){
      try{
        $user_id = ((int)$this->me());
        $title = $_POST['title'];
        $content = $_POST['content'];
        $postModel = new \PhpBbs\Model\Post();
        $post = $postModel->create($user_id,$title, $content);
      } catch(PDOException $e) {
        $message = 'Error: ' . $e->getMessage();
        var_dump($message);
      }

      header('Location:'.SITE_URL.'/php-bbs/views');
      exit;
    }

  }