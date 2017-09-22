<?php
  namespace PhpBbs\Exception;

  class DuplicateEmail extends \Exception {
    protected $message = "メッセージが重複しています。";
  }