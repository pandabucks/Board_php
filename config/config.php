<?php
  define('DB_NAME', 'bbs_board');
  define('DB_USERNAME', 'dbuser');
  define('DB_PASSWORD', 'hogehoge');
  define('PDO_DSN', 'mysql:host=127.0.0.1;dbname=' . DB_NAME);

  require_once(__DIR__.'/../utils/functions.php');
  require_once(__DIR__.'/autoload.php');
  session_start();
?>