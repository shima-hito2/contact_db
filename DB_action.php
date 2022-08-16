<?php

try{

  $db = new PDO('mysql:dbname=cafe;host=localhost;charset=utf8','root', 'root');
  $sql = 'delete from contacts where id = ?';
  $stmt = $db->prepare($sql);
  $stmt->execute(array($_POST['id']));
  $stmt = null;
  $db = null;
  
  return;

} catch(PDOException $e){
  
  echo $e;
  return;

}


 
?>