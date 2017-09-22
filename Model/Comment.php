<?php
  namespace PhpBbs\Model;
  class Comment extends \PhpBbs\Model\Common {
    public function findAllComment($post_id){
      $stmt = $this->db->prepare("select * from comments where post_id = :post_id");
      $stmt->execute([
        ':post_id' => $post_id
      ]);
      $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
      return $comments = $stmt->fetchAll();
    }

    public function create($user_id, $content, $post_id){
      $stmt = $this->db->prepare("insert into comments (user_id, content, post_id) values (:user_id, :content, :post_id)");
      $stmt->execute([':content'=> $content,
        ':post_id' => $post_id,
        ':user_id' => $user_id]);
    }

    public function findEachComment($id){
      $stmt = $this->db->prepare("select * from comments where id = :id");
      $stmt->execute(['id' => $id]);
      $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
      $comment = $stmt->fetch();
      return $comment;
    }


  }