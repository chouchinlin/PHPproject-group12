<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>學生宿舍網</title>
  <link rel="stylesheet" href="homer.css">
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
          <div class="newh"><h3>最新消息</h3></div>
            <?php
            mysql_connect("localhost",'root','j0917510727');//連結伺服器
            mysql_select_db("php");//選擇資料庫
            $data=mysql_query("select * from news order by ID desc limit 5");
            ?>
            <table width="800"class=table frame=void>
              <tr>
                <td class=conh>日期</td>
                <td class=conh>標題</td>
                <td class=conh>發布者</td>
                <td class=conh>公告內容</td>
              </tr>
            <?php
            for($i=1;$i<=mysql_num_rows($data);$i++){
            $rs=mysql_fetch_row($data);
            ?> 
            <?php if($rs[1]!=null){?>
              <tr>               
                <td class=con><?php echo $rs[2]?></td>
                <td class=con><?php echo "<a href='newsContent.php'>$rs[1]</a>"?></td>
                <td class=con><?php echo $rs[3]?></td>
                <td class=con><?php echo $rs[4]?></td>
              </tr>
            <?php
            }
            }
            ?>
            </table>
            <div class="more"><a href="newsadmin.php">更多...</a></div>
      </div>
      </div>
      <div class="c"></div>
      <div class="footer"></div>
    </div>
</body>
</html>