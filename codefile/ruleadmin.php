<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>學生宿舍網</title>
  <link rel="stylesheet" href="ruleadmin.css">
</head>
<body>
  <div class="wrap">
    <div class="header">
      <div class="topbar"></div>
      <div class="logo"><h1>學生宿舍網</h1></div>
      <div class="identity"><span>您是管理者</span></div>
      <ul class=headMenu>
        <li><a class="home"href="homer.php">首頁</a></li>
        <li><a class="tell" href="talkr.php">聯絡我們</a></li>
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
            <li class=List><a href="newsadmin.php">最新消息管理</a></li>
            <li class=List><a href="calendarr.php">行事曆</a></li>
            <li class=List><a href="ruleadmin.php">宿舍公約管理</a></li>
            <li class=List><div class='jjj'><a class=dropdown href="">相關服務<div class="caret"></div></a>
            <ul class=dropdownMenu>
              <li class=dlist><a href="dormitoryadmin.php">住宿申請管理</a></li>
              <li class=dlist><a href="fixadmin.php">報修申請管理</a></li>
              <li class=dlist><a href="borrowadmin.php">設備借用管理</a></li>
            </ul>
</div>
          </li>
            <li class=List><a href="downloadadmin.php">表單下載管理</a></li>
            <li class=List><a href="albumadmin.php">相簿管理</a></li>
            <li class=List><a href="voteadmin.php">投票系統管理</a></li>
            <li class=List><div class='jjj'><a class=dropdown href="">後臺分析<div class="caret"></div></a>
            <ul class=dropdownMenu>
              <li class=dlist><a href="fixanalyze.php">維修分析</a></li>
              <li class=dlist><a href="borrowanalyze.php">借用分析</a></li>
              <li class=dlist><a href="voteanalyze.php">投票分析</a></li>
            </ul>
</div>
          </li>
          </ul>
        </div>
        <div class="rule">
<?php 

$link=@mysqli_connect('localhost','root','j0917510727','php');
mysqli_query($link,'SET NAMES utf-8');
$sql="SELECT * FROM rule";
$result=mysqli_query($link,$sql);

  echo "<button class='plus' onclick="."location.href='insertrule.php'>"."新增資料"."</button><br/>";
  echo "<table cellpadding=3 border=1>";
  echo "<tr>";
  echo "<th>"."標題"."</th>";
  echo "<th>"."內容"."</th>";
  echo "<th>"."刪除資料"."</th>";
  echo "<th>"."更新資料"."</th>";
  echo "</tr>";
  echo "<br>";

  while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        $ID=$row['ID'];
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['content']."</td>";
        echo "<td><center>"."<button onclick="."location.href='deleterule.php?ID=$ID'>"."刪除資料"."</center></button>"."</td>";
        echo "<td><center>"."<button onclick="."location.href='updaterule.php?ID=$ID'>"."更新資料"."</center></button>"."</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($link);

 ?>
      </div>
      </div>
      <div class="c"></div>
      <div class="footer"></div>
    </div>
</body>
</html>