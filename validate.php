
<?php

if(!strstr($_SERVER['HTTP_REFERER'],'contact.php')){
  header('Location:contact.php');
  exit;
}

//  echo $_POST["namae"];
//  echo $_POST["hurigana"];
//  echo $_POST["tel"];
//  echo $_POST["email"];
//  echo nl2br($_POST["inquiry"]); 

 $link = "confirm.php";

 $pattern = "/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/";

 $err_message = array('','','','','','','','','');
 $err = '';

  if(empty(preg_replace("/( |　)/", "",($_POST["namae"])))){
    $err_message[0] = '氏名は必須項目です。10文字以内で入力してください。';
    $err = 'err';
  } 
  if(mb_strlen($_POST["namae"]) > 11){
    $err_message[1] = '氏名は10文字以内で入力してください。';
    $err = 'err';
  }
  if(empty(preg_replace("/( |　)/", "",($_POST["hurigana"])))){
    $err_message[2] = 'フリガナは必須項目です。10文字以内で入力してください。';
    $err = 'err';
  }
  if(mb_strlen($_POST["hurigana"]) > 11){
    $err_message[3] = 'フリガナは10文字以内で入力してください。';
    $err = 'err';
  }
  if(!empty($_POST["tel"]) && (!preg_match("/^[0-9]+$/", $_POST['tel']))) {
    $err_message[4] = '電話番号は0-9の数字のみで入力してください。';
    $err = 'err';
  }
  if(empty(preg_replace("/( |　)/", "",($_POST["email"])))){
    $err_message[5] = 'メールアドレスは必須項目です。';
    $err = 'err';
  }else{
    if(!preg_match($pattern,$_POST["email"])){
      $err_message[6] = 'メールアドレスは正しい形式で入力してください。';
      $err = 'err';
    }
  }
  if(strlen($_POST["email"]) > 11){
    $err_message[7] = 'メールアドレスは10文字以内で入力してください。';
    $err = 'err';
  }
  if(empty(preg_replace("/( |　)/", "",($_POST["inquiry"])))){
    $err_message[8] = 'お問い合わせ内容は必須項目です。';
    $err = 'err';
  }

  if($err == 'err'){
    $link = "contact.php";
  }

  ?>

  <?php
  session_start();
  for ($i = 0;$i <= 8;$i++){
    $_SESSION['err_message'.$i] = $err_message[$i];
  }

  $_SESSION['namae'] = $_POST["namae"];
  $_SESSION['hurigana'] = $_POST["hurigana"];
  $_SESSION['tel'] = $_POST["tel"];
  $_SESSION['email'] = $_POST["email"];
  $_SESSION['inquiry'] = str_replace('<br>', '<br>', htmlspecialchars( $_POST['inquiry'] , ENT_QUOTES) ); 
  // $_SESSION['inquiry'] = $_POST["inquiry"];



  header('Location: '.$link);

  ?>

</form>
