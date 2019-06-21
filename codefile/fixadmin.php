<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>學生宿舍網</title>
  <link rel="stylesheet" href="fixadmin.css">
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
        <div class="fix">
        <h2>維修狀態管理</h2>
        <?php
    session_start();
    if(!isset($_SESSION['root'])){
        header("location:iliglelogin.php");
        // 只有管理者有權限進入
    }
    else{    
$link=mysqli_connect('localhost','root','j0917510727','php');
$SQL='SELECT * FROM fix ORDER BY number';
?>
<table width="800"class=table frame=void>
<tr><td>流水號</td>
<td>申請人</td>
<td>學號</td>
<td>連絡電話</td>
<td>宿舍房間</td>
<td>報修物品</td>
<td>報修原因</td>
<td>目前狀態</td>
<td>狀態更動</td></tr>
<?php
    $fixed=$_GET['number'];
    if($fixed){
        $SQLChange="UPDATE fix SET state=1 WHERE number='$fixed';";
        mysqli_query($link,$SQLChange);
    }
    if($result=mysqli_query($link,$SQL)){
        while($row=mysqli_fetch_assoc($result)){
            echo '<tr>
                <td>'.$row['number'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['ID'].'</td>
                <td>'.$row['phone'].'</td>
                <td>'.$row['room'].'</td>
                <td>'.$row['thing']."</td>
                <td>".$row['reason']."</td>";
                if($row['state']==0){
                    echo "<td>尚未維修</td>";
                }
                else{
                    echo "<td>維修完畢</td>";
                }
                echo "<td><a href='fixadmin.php?number=".$row['number']."'>維修完成！</a></td>
            </tr>";
        }
    }
?>
</table>
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