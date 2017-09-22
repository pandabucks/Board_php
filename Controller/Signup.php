<?php
  namespace PhpBbs\Controller;

  class Signup extends \PhpBbs\Controller\Common {
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
      } catch(\PhpBbs\Exception\InvalidEmail $e) {
        $this->setErrors('email', $e->getMessage());
      } catch(\PhpBbs\Exception\InvalidPassword $e) {
        $this->setErrors('password', $e->getMessage());
      }

      // フォーム入力時に何かしらのエラーが発生した場合
      if ($this->hasError()){
        return;
      } else { 
        // create user
        try {
          $userModel = new \PhpBbs\Model\User();
          $userModel->create([
            'email' => $_POST['email'],
            'password' => $_POST['password']
          ]);
        } catch (\PhpBbs\Exception\DuplicateEmail $e) {
          $this->setErrors('email', $e->getMessage());
          return;
        }
        // redirect to login 
        header('Location:'.SITE_URL.'/php-bbs/views/signin.php');
        exit;
      }
    }
    private function _validate(){
      // CSRF対策
      if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        echo "トークンが有効ではありません";
        exit;
      }
      if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        throw new \PhpBbs\Exception\InvalidEmail();
      }

      if (!preg_match('/\A[a-zA-Z0-9]+\z/', $_POST['password'])) {
        throw new \PhpBbs\Exception\InvalidPassword();
      }
    }

  }