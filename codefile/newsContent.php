<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>學生宿舍網</title>
  <link rel="stylesheet" href="newsContent.css">
  <script> 
$(document).ready(function(){
  $(".dropdown").hover(function(){
    $('dropdown').toggleClass('open');
    $( ".dropdownMenu" ).slideToggle( "slow");
  });
});
</script> 
</head>
<body>
  <div class="wrap">
    <div class="header">
      <div class="topbar"></div>
      <div class="logo"><h1>學生宿舍網</h1></div>
      <ul class=headMenu>
        <li><a class="home"href="home.php">首頁</a></li>
        <li><a class="tell" href="tell.php">聯絡我們</a></li>
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
            <li class=List><a href="">宿舍公約</a></li>
            <li class=List><a class=dropdown href="">相關服務<div class="caret"></div></a>
            <ul class=dropdownMenu>
              <li class=><a href="dormitory">住宿申請</a></li>
              <li class=><a href="fix.php">報修申請</a></li>
              <li class=><a href="">設備借用</a></li>
            </ul>
          </li>
            <li class=List><a href="">表單下載</a></li>
            <li class=List><a href="">相簿</a></li>
            <li class=List><a href="">投票</a></li>
          </ul>
        </div>
        <div class="newsContent">
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
                <!-- <td class=conh>發布者</td> -->
                <!-- <td>公告內容</td> -->
              </tr>
            <?php
            for($i=1;$i<=mysql_num_rows($data);$i++){
            $rs=mysql_fetch_row($data);
            ?> 
            <?php if($rs[1]!=null){?>
              <tr>               
                <td class=con><?php echo $rs[2]?></td>
                <td class=con><?php echo "<a href=''>$rs[1]</a>"?></td>
                <!-- <td class=con><?php echo $rs[3]?></td> -->
                <!-- <td><?php echo $rs[4]?></td> -->
              </tr>
            <?php
            }
            }
            ?>
            </table>
            <div class="more"><a href="">更多...</a></div>
      </div>
      </div>
      <div class="c"></div>
      <div class="footer"></div>
    </div>
</body>
</html>