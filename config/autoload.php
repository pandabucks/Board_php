<?php
  spl_autoload_register(function($class){
    $prefix = 'PhpBbs\\';
    // もし、$クラス名にPhpBbsがあった場合、
    if (strpos($class, $prefix) ===0 ){
      // classNameには、Controller\Indexなどが入っている。
      $className = substr($class, strlen($prefix));
      $classFilePath = __DIR__.'/../' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($classFilePath)) {
      require_once $classFilePath;
    }
    }
  });


?>