<?php
define ('DB_NAME','bbs_board1');
define ('DB_USERNAME', 'dbuser');
define ('DB_PASSWORD','hogehoge');
define('PDO_DSN', 'mysql:host=127.0.0.1;dbname=' . DB_NAME);

try {
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $db->query("select * from engineers");
  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $db = null;

} catch(PDOException $e) {
  echo $e->getMessage();
  exit;
}
?>

<!DOCTYPE html>
<html>
<body>
  <ul>
    <?php foreach ($users as $user) {
      echo "<li>".$user['name'].":".$user['age']."</li>";
    } 
    ?>
  </ul>
</body>
</html>