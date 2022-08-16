<?php
include('head.php');
?>
<body>
<?php
include('header.php');
session_start();

$err_message = array('','','','','','','','','');

if(isset($_SESSION["err_message0"])){
  $err_message = array();
  for ($i = 0;$i <= 8;$i++){
    $err_message[] = $_SESSION["err_message".$i];
  }
}

if(isset($_POST['id'])){
  set_DB($_POST['id']);
}else{

if(isset($_SESSION["namae"])){
  $Pnamae = $_SESSION["namae"];
}
if(isset($_SESSION["hurigana"])){
  $Phurigana = $_SESSION["hurigana"];
}
if(isset($_SESSION["tel"])){
  $Ptel = $_SESSION["tel"];
}
if(isset($_SESSION["email"])){
  $Pemail = $_SESSION["email"];
}
if(isset($_SESSION["inquiry"])){
  $Pinquiry = $_SESSION["inquiry"];
}  

}


function set_DB($id){

try{

  $db = new PDO('mysql:dbname=cafe;host=localhost;charset=utf8','root', 'root');
  $sql = 'select * from contacts where id = ?';
  $stmt = $db->prepare($sql);
  $stmt->execute(array($id));
  $datas = $stmt->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
  $stmt = null;
  $db = null;

  global $Pnamae;
  global $Phurigana;
  global $Ptel;
  global $Pemail;
  global $Pinquiry;

  $Pnamae = $datas[$id]['name'];
  $Phurigana = $datas[$id]['kana'];
  $Ptel = $datas[$id]['tel'];
  $Pemail = $datas[$id]['email'];
  $Pinquiry = $datas[$id]['body'];

  $_SESSION['id'] = $id;
  $_SESSION['state'] = 'update';

  return;

} catch(PDOException $e){
  
  echo $e;
  return;

}

}

function DB_List(){

try{

  $db = new PDO('mysql:dbname=cafe;host=localhost;charset=utf8','root', 'root');
  $sql = 'select * from contacts';
  $stmt = $db->query($sql);
  $datas = $stmt->fetchAll();
  // print_r($data);
  echo '<table border="1" style="border-collapse: collapse">';

  echo '<th>id</th>';
  echo '<th>name</th>';
  echo '<th>kana</th>';
  echo '<th>tel</th>';
  echo '<th>email</th>';
  echo '<th>body</th>';
  echo '<th>created_at</th>';

  foreach($datas as $data){

    echo '<tr>';
    echo '<td>'.$data['id'].'</td>';
    echo '<td>'.$data['name'].'</td>';
    echo '<td>'.$data['kana'].'</td>';
    echo '<td>'.$data['tel'].'</td>';
    echo '<td>'.$data['email'].'</td>';
    echo '<td>'.$data['body'].'</td>';
    echo '<td>'.$data['created_at'].'</td>';
    echo '<form method="POST" name="form'.$data['id'].'" action="contact.php">';
    echo '<td class = "td_a">';
    echo '<a class = "DB_a" href="javascript:form'.$data['id'].'.submit()">編集</a>';
    echo '</td>';
    echo '<td class = "td_a">';
    echo '<a class = "DB_a" href="" id = "Delete" onclick = "check_pop('.$data['id'].')">削除</a>';
    echo '<input type="hidden" value='.$data['id'].' name = "id">';
    // echo '<a class = "DB_a" href="#" id = "Delete" onclick = "check_pop()">削除</a>';
    echo '</td>';
    echo '</form>';
    echo '</tr>';

  }

  echo '</table>';

  $stmt = null;
  $db = null;
  return;

} catch(PDOException $e){
  
  echo $e;
  return;

}

}

?>
<div class = "contact">
  <h5>お問い合せ</h5>
  <p>下記の項目を入力し、送信ボタンを押して下さい。</p>
  <form action = "validate.php" method = "POST" onsubmit = "return cancelsubmit()">
    <div class = "contacts"><span>必須</span>氏名</div>
    <p class = 'errs'><?php if($err_message[0] != ""){echo "{$err_message[0]}";} if($err_message[1] != ""){echo "{$err_message[1]}";} ?></p>
    <input type="text" id = "namae" name = "namae"   value = <?php if(isset($Pnamae)){ echo htmlspecialchars($Pnamae, ENT_QUOTES, "UTF-8");} ?>>
    <div class = "contacts"><span>必須</span>フリガナ</div>
    <p class = 'errs'><?php if($err_message[2] != ""){echo "{$err_message[2]}";} if($err_message[3] != ""){echo "{$err_message[3]}";} ?></p>
    <input type="text" id = "hurigana" name = "hurigana"   value = <?php if(isset($Phurigana)){ echo htmlspecialchars($Phurigana, ENT_QUOTES, "UTF-8");} ?>>
    <div class = "contacts">電話番号</div>
    <p class = 'errs'><?php if($err_message[4] != ""){echo "{$err_message[4]}";} ?></p>
    <input type="text" id = "tel" name = "tel"   value = <?php if(isset($Ptel)){ echo htmlspecialchars($Ptel, ENT_QUOTES, "UTF-8");} ?>>
    <div class = "contacts"><span>必須</span>メールアドレス</div>
    <p class = 'errs'><?php if($err_message[5] != ""){echo "{$err_message[5]}";} if($err_message[6] != ""){echo "{$err_message[6]}";} if($err_message[7] != ""){echo "{$err_message[7]}";} ?></p>
    <input type="text" id = "email" name = "email"   value = <?php if(isset($Pemail)){ echo htmlspecialchars($Pemail, ENT_QUOTES, "UTF-8");} ?>>
    <div class = "contacts"><span>必須</span>お問い合わせ内容</div>
    <p class = 'errs'><?php if($err_message[8] != ""){echo "{$err_message[8]}";} ?></p>
    <textarea name="inquiry" id="inquiry" wrap = "hard" cols="30" rows="10"><?php if(isset($Pinquiry)){ echo str_replace('<br>', '<br>', htmlspecialchars( $Pinquiry , ENT_QUOTES));} ?></textarea>
    <input type="submit" class = "sub" value = "送信" Id = "sub">
  </form>
</div>

    <?php DB_List() ?>  

<?php
include('footer.php');
?>
</body>
</html>