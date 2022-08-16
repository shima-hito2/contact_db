function cancelsubmit() {

  var $err = '';
  var $errMessage = '';
  var pattern = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/;

  if(document.getElementById("namae").value.trim() == "") {
    $errMessage = "氏名は必須項目です。10文字以内で入力して下さい。";
    $err = 'err';
  }
  // alert('JavaScriptのアラート');
  if(document.getElementById("namae").value.length >= "11") {
    $errMessage += "氏名は10文字以内で入力して下さい。";
    $err = 'err';
  }
  if(document.getElementById("hurigana").value.trim() == "") {
    if($err == 'err'){
      $errMessage += '\n';
    }
    $errMessage += "フリガナは必須項目です。10文字以内で入力して下さい。";
    $err = 'err';
  }
  if(document.getElementById("hurigana").value.length >= "11") {
    $errMessage += "フリガナは10文字以内で入力して下さい。";
    $err = 'err';
  }
  if(isNaN(document.getElementById("tel").value) == true) {
    if($err == 'err'){
      $errMessage += '\n'
    }
    $errMessage += "電話番号は0-9の数字のみで入力して下さい。";
    $err = 'err';
  }
  if(document.getElementById("email").value.trim() == "") {
    if($err == 'err'){
      $errMessage += '\n';
    }
    $errMessage += "メールアドレスは必須項目です。";
    $err = 'err';
  }else{
    var email = document.getElementById("email").value;
    if(email.length >= "11") {
      $errMessage += "メールアドレスは10文字以内で入力して下さい。";
      $err = 'err';
    }
    if(!pattern.test(email)) {
      if($err == 'err'){
      $errMessage += '\n';
      }
      $errMessage += "メールアドレスは正しい形式で入力してください。" ;
      $err = 'err';
    }
  }
  if(document.getElementById("inquiry").value.trim() == "") {
    if($err == 'err'){
      $errMessage += '\n';
    }
    $errMessage += "お問い合せ内容を入力して下さい。";
    $err = 'err';
  }
  
  if($err == 'err'){
    alert($errMessage);
    return false;
  }

}


