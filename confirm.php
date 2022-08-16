<?php
include('head.php');
?>
<body>
<?php
include('header.php');
if(!strstr($_SERVER['HTTP_REFERER'],'contact.php')){
  header('Location:contact.php');
  exit;
}
session_start();
?>
<div class = "contact">
  <h5>お問い合せ</h5>
  <p>下記の内容をご確認の上、送信ボタンを押して下さい。<br>内容を訂正する場合は戻るを押して下さい。</p>
  <form action = "complete.php" method = "POST">

    <div class = "contacts under">氏名</div>
    <p class = "text"><?php echo htmlspecialchars($_SESSION["namae"], ENT_QUOTES, "UTF-8"); ?></p>
    <div class = "contacts under">フリガナ</div>
    <p class = "text"><?php echo htmlspecialchars($_SESSION["hurigana"], ENT_QUOTES, "UTF-8"); ?></p>
    <div class = "contacts under">電話番号</div>
    <p class = "text"><?php echo htmlspecialchars($_SESSION["tel"], ENT_QUOTES, "UTF-8"); ?></p>
    <div class = "contacts under">メールアドレス</div>
    <p class = "text"><?php echo htmlspecialchars($_SESSION["email"], ENT_QUOTES, "UTF-8"); ?></p>
    <div class = "contacts under">お問い合わせ内容</div>
    <p class = "text"><?php echo nl2br(str_replace('<br>', '<br>', htmlspecialchars( $_SESSION['inquiry'] , ENT_QUOTES))); ?></p>
    <div class = "subflex">
    <input type="submit" class = "sub2r" value = "戻る" name = "back">
    <input type="submit" class = "sub2g" value = "送信">
    </div>

    <input type="hidden" name="namae" value=<?php echo htmlspecialchars($_SESSION["namae"], ENT_QUOTES, "UTF-8") ?>>
    <input type="hidden" name="hurigana" value=<?php echo htmlspecialchars($_SESSION["hurigana"], ENT_QUOTES, "UTF-8") ?>>
    <input type="hidden" name="tel" value=<?php echo htmlspecialchars($_SESSION["tel"], ENT_QUOTES, "UTF-8") ?>>
    <input type="hidden" name="email" value=<?php echo htmlspecialchars($_SESSION["email"], ENT_QUOTES, "UTF-8") ?>>
    <!-- <input type="hidden" name="inquiry" value=<?php echo str_replace('<br>', '<br>', htmlspecialchars( $_SESSION['inquiry'] , ENT_QUOTES) ); ?>> -->
    <textarea class = "textarea_hide" name="inquiry" cols="30" rows="10"><?php echo str_replace('<br>', '<br>', htmlspecialchars( $_SESSION['inquiry'] , ENT_QUOTES)); ?></textarea>

  </form>
</div>

<?php
include('footer.php');
?>
</body>
</html>