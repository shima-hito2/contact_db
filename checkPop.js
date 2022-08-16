function check_pop(id){
  var result = window.confirm('削除しますか？');
      if( result ) {
        //「true」の処理
      xmlhttp = new XMLHttpRequest();
      xmlhttp.open("POST","DB_action.php");
      xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
      xmlhttp.send("id=" + id);

  }
  else {
      //「false」の処理
  }
}
// function sendReturn(sendPara){
//   xmlhttp = new XMLHttpRequest();
//   xmlhttp.onreadystatechange = returnDataSHow;
//   xmlhttp.open("POST","DB_action.php");
//   xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
//   xmlhttp.send(sendPara);
// }



