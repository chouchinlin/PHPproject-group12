<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>學生宿舍網</title>
  <link rel="stylesheet" href="borrow.css">
</head>
<body>
  <div class="wrap">
    <div class="header">
      <div class="topbar"></div>
      <div class="logo"><h1>學生宿舍網</h1></div>
      <div class="identity"><span>您是使用者</span></div>
      <ul class=headMenu>
        <li><a class="home"href="homeu.php">首頁</a></li>
        <li><a class="tell" href="talku.php">聯絡我們</a></li>
        <li><a class="log" href="logout.php">登出</a></li>
      </ul>
      <div class="c"></div>
      </div>
      <div class="content">
        <div class="menu">
        <div class="menuh">
          <div class="bf"><h3>分類清單</h3></div>
        </div>
          <ul class=cmenu >
            <li class=List><a href="newsu.php">最新消息</a></li>
            <li class=List><a href="calendaru.php">行事曆</a></li>
            <li class=List><a href="ruleu.php">宿舍公約</a></li>
           <li class=List><div class='jjj'><a class=dropdown href="">相關服務<div class="caret"></div></a>
            <ul class=dropdownMenu>
              <li class=dlist><a href="dormitory.php">住宿申請</a></li>
              <li class=dlist><a href="fix.php">報修申請</a></li>
              <li class=dlist><a href="borrow.php">設備借用</a></li>
            </ul>
</div>
          </li>
            <li class=List><a href="downloadu.php">表單下載</a></li>
            <li class=List><a href="albumu.php">相簿</a></li>
            <li class=List><a href="vote.php">投票</a></li>
          </ul>
        </div>
        <div class="box">
        <?php 
    session_start();
    if(!isset($_SESSION['root']) AND !isset($_SESSION['user'])){
        header("location:iliglelogin.php");
        // 只有登入後才有權限進入
    }
    else{
    

$link=mysqli_connect("localhost","root","j0917510727","php");
$place=$_POST['place'];
$item=$_POST['item'];
$game=$_POST['game'];
$userID=$_POST['userID'];

$SQLInsert="INSERT INTO borrowresult(userID,place,item,game) VALUES('$userID','$place','$item','$game')";
mysqli_query($link,$SQLInsert);
?>
<h3>借用成功！<br><br>請在使用結束後至宿辦登記！</h3>
<?php
header("refresh:2;url=borrow.php");
?>
<?php
    }
    ?>

      </div>
      </div>
      <div class="c"></div>
      <div class="footer"></div>
    </div>
</body>
</html>
