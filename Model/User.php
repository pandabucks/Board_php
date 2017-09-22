<?php
  namespace PhpBbs\Model;

  class User extends \PhpBbs\Model\Common {
    public function create($values) {
      $stmt = $this->db->prepare("insert into users (email, password) values (:email, :password)");
      $res = $stmt->execute([
        ':email' => $values['email'],
        ':password' => password_hash($values['password'], PASSWORD_DEFAULT)
      ]);
      if ($res === false) {
        throw new \PhpBbs\Exception\DuplicateEmail();
      }
    }

    public function signin($values) {
      $stmt = $this->db->prepare("select * from users where email = :email");
      $stmt->execute([
        ':email' => $values['email']
      ]);
      $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
      $user = $stmt->fetch();

      //　ユーザーが存在しない時
      if (empty($user)) {
        throw new \PhpBbs\Exception\UnMatchEmailOrPassword();
      }

      if (!password_verify($values['password'], $user->password)) {
        throw new \PhpBbs\Exception\UnMatchEmailOrPassword();
      }
      return $user;
    }
  }