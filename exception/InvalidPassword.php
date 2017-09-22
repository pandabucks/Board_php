<?php
  namespace PhpBbs\Exception;

  class InvalidPassword extends \Exception {
    protected $message = "有効なメッセージを入力してください";
  }