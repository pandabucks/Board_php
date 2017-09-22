<?php
  namespace PhpBbs\Controller;

  class Signin extends \PhpBbs\Controller\Common {
    public function run() {
      if ($this->isLoggedIn()) {
        header('Location:'.SITE_URL.'/php-bbs/views/');
      }
      if ($_SERVER['REQUEST_METHOD'] === POST) {
        $this->postProcess();
      }
    }

    protected function postProcess(){
      // validate
      try{
        $this->_validate();
      } catch(\PhpBbs\Exception\EmptyPost $e) {
        $this->setErrors('signin', $e->getMessage());
      } 
      $this->setValues('email', $_POST['email']);
      // フォーム入力時に何かしらのエラーが発生した場合
      if ($this->hasError()){
        return;
      } else { 
        // signin user
        try {
          $userModel = new \PhpBbs\Model\User();
          $user = $userModel->signin([
            'email' => $_POST['email'],
            'password' => $_POST['password']
          ]);
        } catch (\PhpBbs\Exception\UnMatchEmailOrPassword $e) {
          $this->setErrors('signin', $e->getMessage());
          return;
        }

        // ログイン処理
        // session_regenerate_id(true);
        $_SESSION['user_id'] = $user->id;

        // redirect to home
        header('Location:'.SITE_URL.'/php-bbs/views');
        exit;
      }
    }
    private function _validate(){
      // CSRF対策
      if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        echo "トークンが有効ではありません";
        exit;
      }
      if (!isset($_POST['email']) || !isset($_POST['password'])) {
        echo "入力された値が有効ではありません";
        exit;
      }

      if ($_POST['email'] === '' || $_POST['password'] === '') {
        throw new \PhpBbs\Exception\EmptyPost();
      }

    }

  }