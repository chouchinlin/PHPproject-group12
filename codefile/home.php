<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>學生宿舍網</title>
  <link rel="stylesheet" href="home.css">
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
            <li class=List><a href="albumu.php">相簿</a></li>
            <li class=List><a href="voteu.php">投票</a></li>
          </ul>
        </div>
        <div class="new">
          <div class="newh"><h3>最新消息</h3></div>
            <?php
            // mysql_connect("localhost","ttom","candy24");//連結伺服器
            // mysql_select_db("php");//選擇資料庫
            $link=mysqli_connect("localhost",'root','j0917510727',"php");
            $SQL1234="select * from news order by ID desc limit 5";
            ?>
            <table width="800"class=table frame=void>
              <tr>
                <td class=conh>日期</td>
                <td class=conh>標題</td>
                <td class=conh>發布者</td>
                <td class=conh>公告內容</td>
              </tr>
            <?php
            if($result=mysqli_query($link,$SQL1234)){
              while($row=mysqli_fetch_assoc($result)){
                echo "<tr><td>".$row['date']."</td>
                <td>".$row['title']."</td><td>".$row['author']."</td><td>".$row['content']."</tr>";
              }
            }
            ?> 
            </table>
            <div class="more"><a href="news.php">更多...</a></div>
      </div>
      </div>
      <div class="c"></div>
      <div class="footer"></div>
    </div>
</body>
</html>