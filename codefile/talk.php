<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>學生宿舍網</title>
  <link rel="stylesheet" href="talk.css">
</head>
<body>
  <div class="wrap">
    <div class="header">
      <div class="topbar"></div>
      <div class="logo"><h1>學生宿舍網</h1></div>
      <ul class=headMenu>
        <li><a class="home"href="home.php">首頁</a></li>
        <li><a class="tell" href="talk.php">聯絡我們</a></li>
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
        <div class="new">
        <form method="post">
<input type="text" style="width:300px;height:200px;font-size:20px;" name="talk" placeholder="請留言">
<?php
$link=mysqli_connect('localhost','root','j0917510727','php');
$talk=$_POST['talk'];
$SQLInsert="INSERT INTO talk(comment) VALUES('$talk')";
mysqli_query($link,$SQLInsert);
mysqli_close($link);
?>
<input type="submit" style="font-size:20px" value="送出" onclick="ale()">
<script>
function ale(){
alert("留言完成！");
}
</script>
</form>
      </div>
      </div>
      <div class="c"></div>
      <div class="footer"></div>
    </div>
</body>
</html>