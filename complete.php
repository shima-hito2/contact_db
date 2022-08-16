<?php
include('head.php');
?>
<body>
<?php
include('header.php');

if(!strstr($_SERVER['HTTP_REFERER'],'confirm.php')){
  header('Location:contact.php');
  exit;
}

session_start();

if(isset($_POST["back"])){

  $_SESSION['namae'] = $_POST["namae"];
  $_SESSION['hurigana'] = $_POST["hurigana"];
  $_SESSION['tel'] = $_POST["tel"];
  $_SESSION['email'] = $_POST["email"];
  $_SESSION['inquiry'] = str_replace('<br>', '<br>', htmlspecialchars( $_POST['inquiry'] , ENT_QUOTES) );

  header('Location:contact.php');
  echo $_SESSION['tel'];
  exit;
}
  
  DB_Exequte();
  $_SESSION = array();

?>
<div class = "contact">
  <h5>お問い合せ</h5>
  <p>お問い合わせ頂きありがとうございます。<br>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
  <a href="index.php" class = "topGo">トップへ戻る</a>
</div>
<?php
include('footer.php');
?>
<?php

date_default_timezone_set('Asia/Tokyo');

function DB_Exequte(){

  try{

    $db = new PDO('mysql:dbname=cafe;host=localhost;charset=utf8','root', 'root');
    if(isset($_SESSION['state'])){

      $sql = 'update contacts SET name = ?,kana = ?,tel = ?,email = ?,body = ?,created_at = ? WHERE id = ?';
      $stmt = $db->prepare($sql);
      $stmt->execute(array($_POST['namae'],$_POST['hurigana'],$_POST['tel'],$_POST['email'],$_POST['inquiry'],date("Y-m-d H:i:s"),$_SESSION['id']));

    }else{

    $sql = 'insert into contacts(name,kana,tel,email,body,created_at) values (?,?,?,?,?,?)';
    $stmt = $db->prepare($sql);
    $stmt->execute(array($_POST['namae'],$_POST['hurigana'],$_POST['tel'],$_POST['email'],$_POST['inquiry'],date("Y-m-d H:i:s")));

    }

    $stmt = null;
    $db = null;    

    return;

  } catch(PDOException $e){
    
    echo $e;
    return;
  
  }

}

?>
</body>
</html>