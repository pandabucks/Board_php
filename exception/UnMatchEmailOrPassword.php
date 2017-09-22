<?php
  namespace PhpBbs\Exception;

  class UnMatchEmailOrPassword extends \Exception {
    protected $message = "パスワードまたはemailを入力してください。";
  }