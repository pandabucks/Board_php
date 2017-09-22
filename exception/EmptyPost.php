<?php
  namespace PhpBbs\Exception;

  class EmptyPost extends \Exception {
    protected $message = "パスワードまたはemailを入力してください。";
  }