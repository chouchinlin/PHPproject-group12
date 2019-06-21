<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>學生宿舍網</title>
  <link rel="stylesheet" href="fix.css">
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
            <li class=List><a href="voteu.php">投票</a></li>
          </ul>
        </div>
        <div class="form">
        <?php
    session_start();
    if(!isset($_SESSION['root']) AND !isset($_SESSION['user'])){
        header("location:iliglelogin.php");
        // 只有登入後才有權限進入
    }
    else{
        ?>
    <form class="box" action="fixresult.php" method='POST'>
    申請人：<input type="text"  style="font-size:20px;" name='name'><br>
    學號：<input type="text"  style="font-size:20px;" name='ID'><br>
    連絡電話：<input type="text"  style="font-size:20px;" name='phone'><br>
    宿舍+房間(例：OA406)：<input type="text"  style="font-size:20px;" name='room'><br>
    報修物品：<input type="text"  style="font-size:20px;" name="thing" id=""><br>
    報修原因：<input type="text"  style="font-size:20px;" name='reason'><br>
    <input  style="font-size:20px;" type="submit">
    </form>
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

