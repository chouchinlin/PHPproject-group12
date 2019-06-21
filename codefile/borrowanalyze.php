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
    padding-left:10%;
    padding-right:10%;
   float:left;
}
.result h2{
  font-family:'微軟正黑體';
  font-weight:bold;
  font-size:30px;
}

.result p{
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
        <p>請選擇要查看的類別：</p>
    <form action="#" method='POST'>
    <select name="class" id=""><br><br>
    <option value="">請選擇</option>
    <option value="all">類別比例</option>
    <option value="game">桌遊</option>
    <option value="place">宿舍空間</option>
    <option value="item">設備</option>
    </select>
    <input type="submit" value="選擇">
    </form>
    <?php 
    $class=$_POST['class'];
    if($class){
        if($class=="game"){
            $name="桌遊";
        }
        if($class=="place"){
            $name="宿舍空間";
        }
        if($class=="item"){
            $name="設備";
        }
        if($class=="all"){
            $name="全部類別";
        }
        ?>
<div class="result2">
<h2><?php echo $name."分析"; ?></h2>
<canvas id="chart" width="800" height="600"></canvas>
</div>
<?php
if($_POST['class']=='game'){
    $h=0;
}
if($_POST['class']=='place'){
    $h=1;
}
if($_POST['class']=='item'){
    $h=2;
}
if($_POST['class']=='all'){
    $h=3;
}
$SQL=array("SELECT game as project ,count(*) as count FROM borrowresult GROUP BY game HAVING game NOT IN(' ','NULL')","SELECT place as project,count(*) as count from borrowresult GROUP BY place HAVING place NOT IN(' ','NULL')","SELECT item as project,count(*) as count from borrowresult GROUP BY item HAVING item NOT IN(' ','NULL')","SELECT count(*) as count FROM borrowresult WHERE game NOT IN(' ','NULL')","SELECT count(*) as count FROM borrowresult WHERE place NOT IN(' ','NULL')","SELECT count(*) as count FROM borrowresult WHERE item NOT IN(' ','NULL')");
$answer=array();
$answer2=array();
$i=0;
if($h<3){
if($result=mysqli_query($link,$SQL[$h])){
    while($row=mysqli_fetch_assoc($result)){
        $answer[$i][0]=$row['project'];
        $answer[$i][1]=$row['count'];
        $i++;
    }
}
}
else{
    for($j=3;$j<6;$j++){
        if($result=mysqli_query($link,$SQL[$j])){
            while($row=mysqli_fetch_assoc($result)){
                $answer2[$j-3]=$row['count'];
            }
        }
    }
}
?>
<script>
var ctx = document.getElementById('chart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        // labels: ["Red", "Blue", "Yellow", "Green", "Purple"],
        <?php
        if($h<3){
        ?>
        labels: [<?php
        for($j=0;$j<$i;$j++){
            if($j<$i-1){
                echo '"'.$answer[$j][0].'",';
            }
            else{
                echo '"'.$answer[$j][0].'"';
            }
        }
        ?>],
        datasets: [{
            label: '# of Votes',
            data: [<?php 
            for($j=0;$j<$i;$j++){
                if($j<$i-1){
                    echo $answer[$j][1].',';
                }
                else{
                    echo $answer[$j][1];
                }
            }
            ?>],
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
        <?php
        }
        else{
        ?>
        labels: ["遊戲","宿舍空間","設備"],
        datasets: [{
            label: '# of Votes',
            data: [<?php 
            for($j=0;$j<3;$j++){
                if($j<2){
                    echo $answer2[$j].',';
                }
                else{
                    echo $answer2[$j];
                }
            }
            ?>],
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
        <?php
        }
        ?>
    }
});</script>
<?php
}
}
?>

</div>
</body>
</html>