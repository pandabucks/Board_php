<?php
  namespace PhpBbs\Model;
  class Post extends \PhpBbs\Model\Common {
    public function findAll(){
      $stmt = $this->db->query("select * from posts");
      $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
      return $stmt->fetchAll();
    }
    public function fincEachPost($id){
      $stmt = $this->db->prepare("select * from posts where id = :id");
      $stmt->execute([
        ':id' => $id
        ]);
      $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
      $post = $stmt->fetch();
      return $post;
    }

    public function create($user_id, $title, $content){
      $stmt = $this->db->prepare("insert into posts (user_id, title, content) values (:user_id, :title, :content)");
      $stmt->execute([':title'=> $title,
        ':content' => $content,
        ':user_id' => $user_id]);
    }
  }