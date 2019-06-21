<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>學生宿舍網</title>
  <link rel="stylesheet" href="updaterule.css">
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
        <div class="new">
        <?php
    $ID=10;
    $link = mysqli_connect('localhost','root','j0917510727','php');
    $sql="SELECT * FROM rule WHERE ID=$ID";
    if($result=mysqli_query($link,$sql)){
    while($row=mysqli_fetch_assoc($result)){
        echo "<form action='updateruledone.php' method='post'>";
        echo "<input type='hidden' name='ID' value=".$row["ID"].">";
        echo "<h2>請更改欲修改欄位：</h2>";
        echo "標題: "."<input type='text' name='title' value=".$row["title"]."><br/><br/>";
        echo "內容: "."<input type='text' name='content' value=".$row["content"]."><br/><br/>";
        echo "<input type='submit'>";
        echo "<input type='reset'>";
        echo "</form>";
    }
}
    mysqli_close($link);
?>
      </div>
      </div>
      <div class="c"></div>
      <div class="footer"></div>
    </div>
</body>
</html>