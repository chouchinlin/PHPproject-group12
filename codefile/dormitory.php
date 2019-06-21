<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>學生宿舍網</title>
  <link rel="stylesheet" href="dormitory.css">
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
<form class="box" action="dormitoryresult.php" method='post'>
姓名：<input type="text"  style="font-size:25px;" name="name"><br>
學號：<input type="text"  style="font-size:25px;" name="ID"><br>
申請宿舍：<select class=type name="place"><option value="OA">學一(男)</option><option value="OB">學一(女)</option><option value="OE">學二(男)</option><option value="OF">學二(女)</option><option value="OD">綜宿</option></select><br><br>
申請時間：<br>
<input type="radio" name="time" value='first'>上學期<br>
<input type="radio" name='time' value='second'>下學期<br>
<input type="radio" name="time" value='both'>上+下學期<br><br>
是否符合清寒學子：<br>
<input type="radio" style="font-size:25px;" name='money' value='low'>是<br>
<input type="radio" style="font-size:25px;" name='money' value='normal'>否<br><br>
<input type="submit" style="font-size:25px;" value="提交">
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
