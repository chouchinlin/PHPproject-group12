<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>登入</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="wrap">
    <div class="header">
      <div class="topbar"></div>
      <div class="logo"><h1>學生宿舍網</h1></div>
      <ul class=headMenu>
        <li><a class="home"href="home.php">首頁</a></li>
        <li><a class="tell" href="">聯絡我們</a></li>
        <li><a class="log" href="login.php">登入</a></li>
      </ul>
      <div class="c"></div>
      </div>
      <div class="content">
        <div class="menu">
        <div class="menuh">
        <div class="bf"><h3>分類清單</h3></div>
        </div>
          <ul class=cmenu >
            <li class=List><a href="news.php">最新消息</a></li>
            <li class=List><a href="calendar.php">行事曆</a></li>
            <li class=List><a href="rule.php">宿舍公約</a></li>
            <li class=List><div class='jjj'><a class=dropdown href="">相關服務<div class="caret"></div></a>
            <ul class=dropdownMenu>
              <li class=dlist><a href="dormitory.php">住宿申請</a></li>
              <li class=dlist><a href="fix.php">報修申請</a></li>
              <li class=dlist><a href="borrow.php">設備借用</a></li>
            </ul>
</div>
          </li>
            <li class=List><a href="download.php">表單下載</a></li>
            <li class=List><a href="album.php">相簿</a></li>
            <li class=List><a href="vote.php">投票</a></li>
          </ul>
        </div>
        <div class="login">
        <form class="box" action="login.php" method="post">
    <h1>登入</h1>
    <input type="text" name="id" style="font-size:25px;"placeholder="使用者帳號">
    <input type="password" name="pw" style="font-size:25px;" placeholder="使用者密碼">
    <input type="submit" name="" style="font-size:25px;" value="登入">
    </form>
</div>
<?php
session_start();
$id=$_POST['id'];
$pw=$_POST['pw'];
if(isset($_POST['id'])){
if($id=='root'&& $pw=='123'){
    $_SESSION['root']='success';
    ?>
    <script>alert('歡迎管理者登入');</script>
    <?php
    header("refresh:0.1 ; url=homer.php");
}
elseif($id=='A1063312'&& $pw=='123'){
    $_SESSION['user']='A1063312';
    $_SESSION['name']='周君臨';
    ?>
    <script>alert('歡迎使用者 周君臨登入');</script>
    <?php
    header("refresh:0.1 ; url=homeu.php");
}
elseif($id=='A1063323'&& $pw=='123'){
    $_SESSION['user']='A1063323';
    $_SESSION['name']='覃喆明';
    ?>
    <script>alert('歡迎使用者 覃喆明登入');</script>
    <?php
    header("refresh:0.1 ; url=homeu.php");
}elseif($id=='A1063330'&& $pw=='123'){
    $_SESSION['user']='A1063330';
    $_SESSION['name']='孫子淵';
    ?>
    <script>alert('歡迎使用者 孫子淵登入');</script>
    <?php
    header("refresh:0.1 ; url=homeu.php");
}else{
    ?>
    <script>alert('帳號或密碼錯誤，請重新輸入');</script>
    <?php
}
}
?>
        </div>  
      </div>
      <div class="c"></div>
      <div class="footer"></div>
    </div>
</body>
</html>
