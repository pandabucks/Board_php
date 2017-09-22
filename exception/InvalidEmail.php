<?php
  namespace PhpBbs\Exception;

  class InvalidEmail extends \Exception {
    protected $message = "有効なメッセージを入力してください";
  }