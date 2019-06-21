<?php
$link=mysqli_connect('localhost','root','j0917510727','php');
session_start();
if(!isset($_SESSION['root'])){
    header("location:iliglelogin.php");
    // 只有管理者有權限進入
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>學生宿舍網</title>
  <link rel="stylesheet" href="fixanalyze.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<style>
.result{
    width:50%;
   float:left;
   padding-left:10%;
   padding-right:10%;
}
.result h2{
  font-family:'微軟正黑體';
  font-weight:bold;
  font-size:30px;
}
</style>
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
        <div class="result">
<h2>維修分析</h2>
<canvas id="chart" width="800" height="600"></canvas>
</div>

<?php
$SQL="SELECT thing,COUNT(*) as count FROM fix GROUP BY thing";
$fixresult=array();
$i=0;
if($result=mysqli_query($link,$SQL)){
    while($row=mysqli_fetch_assoc($result)){
        $fixresult[$i][0]=$row['thing'];
        $fixresult[$i][1]=$row['count'];
        $i++;
    }
    }
// echo $fixresult[0][0];
// echo $i;
?>
      <div class="c"></div>
      <div class="footer"></div>
    </div>
</body>
</html>
<script>
var ctx = document.getElementById('chart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        // labels: ["Red", "Blue", "Yellow", "Green", "Purple"],
        labels: [
        <?php
        for($j=0;$j<$i;$j++){
            if($j!=$i-1){
                echo '"'.$fixresult[$j][0].'",';
            }
            else{
                echo '"'.$fixresult[$j][0].'"';
            }
        }
        echo "],";
        ?>
        datasets: [{
            label: '# of Votes',
            data: [<?php
        for($j=0;$j<$i;$j++){
            if($j!=$i-1){
                echo '"'.$fixresult[$j][1].'",';
            }
            else{
                echo '"'.$fixresult[$j][1].'"';
            }
        }
        echo "],";
        ?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    }
});</script>
<?php
}
?>
