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
   margin-top:30px;
}
.result h2{
  font-family:'微軟正黑體';
  font-weight:bold;
  font-size:30px;
}

.result2{
  font-family:'微軟正黑體';
  font-weight:bold;
  font-size:30px;
}

.result3{
  float:left;
  margin-left:100px;
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
        <div class="result2">
        <div class="result3">
        <p>請選擇要查看的投票：</p>
    <form action="#" method='POST'>
    <select name="vote" id=""><br><br>
    <option value="">請選擇</option>
    <?php
    $SQLselect="SELECT * FROM vote ORDER BY ID ASC;";
    if($result=mysqli_query($link,$SQLselect)){
        while($row=mysqli_fetch_assoc($result)){
            echo "<option value='".$row['ID']."'>".$row['title']."</option>";
        }
        }
    ?>
    </select>
    <input type="submit" value="選擇">
    </form>
    </div>
    <?php 
    $ID=$_POST['vote'];
    if($ID){
        ?>
<div class="result">
<h2><?php
$SQLtitle="SELECT * FROM vote WHERE ID='$ID'";
if($result=mysqli_query($link,$SQLtitle)){
        while($row=mysqli_fetch_assoc($result)){
            echo $row['title'];
        }
        }?></h2>
<canvas id="chart" width="800" height="600"></canvas>
</div>
<?php
}
?>
<?php
$SQL=array("SELECT COUNT(*) as count FROM ".$ID."result WHERE choice1=1","SELECT COUNT(*) as count FROM ".$ID."result WHERE choice2=1","SELECT COUNT(*) as count FROM ".$ID."result WHERE choice3=1","SELECT COUNT(*) as count FROM ".$ID."result WHERE choice4=1","SELECT COUNT(*) as count FROM ".$ID."result WHERE choice5=1");
$voteresult=array();
for($i=0;$i<5;$i++){
    if($result=mysqli_query($link,$SQL[$i])){
        while($row=mysqli_fetch_assoc($result)){
            array_push($voteresult,$row['count']);
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
        $options="SELECT * from vote WHERE ID='$ID'";
        $result1=mysqli_query($link,$options);
        $row1=mysqli_fetch_assoc($result1);
        ?>
        labels: ["<?php echo $row1['choice1']; ?>", "<?php echo '選項2'?>", "<?php echo $row1['choice3'] ?>", "<?php echo $row1['choice4'] ?>", "<?php echo $row1['choice5'] ?>"],
        datasets: [{
            label: '# of Votes',
            data: [<?php echo $voteresult[0];?>, <?php echo $voteresult[1];?>, <?php echo $voteresult[2];?>, <?php echo $voteresult[3];?>, <?php echo $voteresult[4];?>],
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
</div>
</body>
</html>


