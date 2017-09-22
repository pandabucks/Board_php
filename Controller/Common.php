<?php
  // Namesppaceは必ず定義すること。
  namespace PhpBbs\Controller;

  class Common {
    private $_errors;
    private $_values;

    public function __construct(){
      if (!isset($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
      }
      $this->_errors = new \stdClass();
      $this->_values = new \stdClass();
    }

    protected function setValues($key, $value) {
      $this->_values->$key = $value;
    }

    public function getValues(){
      return $this->_values;
    }

    public function getErrors($key){
      return isset($this->_errors->$key) ? $this->_errors->$key : '';
    }

    protected function hasError() {
      return !empty(get_object_vars($this->_errors));
    }

    protected function setErrors($key, $error) {
      $this->_errors->$key = $errors;
    }

    protected function isLoggedIn(){
      return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
    }

    public function me(){
      return $this->isLoggedIn() ? $_SESSION['user_id'] : null;
    }
  }