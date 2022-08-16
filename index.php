<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>

<?php
  
  session_start();
  $_SESSION = array();
  
  ?>
  
    <header>
      <div>CafeBlog</div>
      <ul>
        <li><a href="#">NEW</a></li>
        <li><a href="#">MENU</a></li>
        <li><a href="#">SERIES</a></li>
        <li><a href="#">RANKING</a></li>
        <li><a href="contact.php">CONTACT</a></li>
      </ul>
    </header>

    <div class = "flex">

      <div class = "item">
        <img src="image/pickup1.jpg" alt="">
        <p class = "title">タイトルテキストテキストテキストテキストテキストテキストテキスト</p>
        <p class = "link">READ MORE</p>
      </div>
      <div class = "item">
        <img src="image/pickup2.jpg" alt="">
        <p class = "title">タイトルテキストテキストテキストテキストテキストテキストテキスト</p>
        <p class = "link">READ MORE</p>
      </div>
      <div class = "item">
        <img src="image/pickup3.jpg" alt="">
        <p class = "title">タイトルテキストテキストテキストテキストテキストテキストテキスト</p>
        <p class = "link">READ MORE</p>
      </div>

    </div>

    <div class = "flex2">

      <div class = "blog">
        <div class = "item">
          <p class = "title">タイトルテキストテキストテキストテキストテキスト</p>
          <p class = "date">2022/01/01  カテゴリ１</p>
          <img src="image/main1.jpg" alt="">
          <p class = "main">本文テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
          <p class = "link">READ MORE</p>
        </div>
        <div class = "item">
          <p class = "title">タイトルテキストテキストテキストテキストテキスト</p>
          <p class = "date">2022/01/01  カテゴリ１</p>
          <img src="image/main2.jpg" alt="">
          <p class = "main">本文テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
          <p class = "link">READ MORE</p>
        </div>
        <div class = "item">
          <p class = "title">タイトルテキストテキストテキストテキストテキスト</p>
          <p class = "date">2022/01/01  カテゴリ１</p>
          <img src="image/main3.jpg" alt="">
          <p class = "main">本文テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
          <p class = "link">READ MORE</p>
        </div>
      </div>

      <div class = "side">
        <div class = "item-pro">
          <img src="image/human.png" alt="">
          <p class = "name">Name Name</p>
          <p class = "profile">プロフィールテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
        </div>
        <div class = "item">
          <h1>Ranking</h1>
          <img src="image/side1.jpg" alt="">
          <p>タイトルテキストテキストテキストテキストテキストテキスト</p>
        </div>
        <div class = "item">
          <img src="image/side2.jpg" alt="">
          <p>タイトルテキストテキストテキストテキストテキストテキスト</p>
        </div>
        <div class = "item">
          <img src="image/side3.jpg" alt="">
          <p>タイトルテキストテキストテキストテキストテキストテキスト</p>
        </div>
      </div>

    </div>

   <footer>
    <div class = "item">
      <h2>Navi</h2>
      <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
    </div>
    <div class = "item under">
      <h2>Menu</h2>
      <ul>
        <li>NEW</li>
        <li>MENU</li>
        <li>SERIES</li>
        <li>RANKING</li>
        <li>CONTACT</li>
      </ul>
    </div>
    <div class = "item left">
      <h2>About</h2>
      <p>▶︎プロフィール詳細</p>
      <p>▶︎お仕事の依頼</p>
      <p>▶︎お問い合わせ</p>
    </div>
  </footer>

  <div class = "last">©️ Cafe & Blog</div>

</body>
</html>