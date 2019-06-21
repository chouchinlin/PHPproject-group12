<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if(!isset($_SESSION['root'])){
      header("location:iliglelogin.php");
      // 只有登入後才有權限進入
  }
    else{
      $user=$_SESSION['user'];
      $link=mysqli_connect('localhost','root','j0917510727','php');
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>學生宿舍網-相簿管理</title>
  <script src="jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="lightbox.css">
    <link rel="stylesheet" href="swiper.min.css">
    <script src="lightbox.js"></script>
    <script src="swiper.min.js"></script>
  <link rel="stylesheet" href="voter.css">
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
            <ul class=dropdownMenu3>
              <li class=dlist><a href="dormitoryadmin.php">住宿申請管理</a></li>
              <li class=dlist><a href="fixadmin.php">報修申請管理</a></li>
              <li class=dlist><a href="borrowadmin.php">設備借用管理</a></li>
            </ul>
      </div>
          </li>
            <li class=List><a href="downloadadmin.php">表單下載管理</a></li>
            <li class=List><a href="albumadmin.php">相簿管理</a></li>
            <li class=List><a href="voteadmin.php">投票系統管理</a></li>
            <li class=List><div class='aaa'><a class=dropdown href="">後臺分析<div class="caret"></div></a>
            <ul class=dropdownMenu2>
              <li class=dlist><a href="fixanalyze.php">維修分析</a></li>
              <li class=dlist><a href="borrowanalyze.php">借用分析</a></li>
              <li class=dlist><a href="voteanalyze.php">投票分析</a></li>
            </ul>
</div>
          </li>
        </ul>
        </div>
        <div class="vote">
        <div class="choose">
        <form action="#" method='POST'>
<h1>       
請輸入選項數目(至多五個)：</h1>   <input type="text" name="number" id="">
<input type="submit" value="選項生成">

</form>
</div>
<?php
$number=$_POST['number'];
if($number){
  echo "<div class='voting'>";
}
if($number && $number<=5){
?>
<form action="#" method='POST'>
<h1>新增投票：</h1>
<span>標題：<input type="text" name="title" id=""></span>
<?php
$i=0;
for($j=1;$j<=$number;$j++){
    echo '<span>選項'.$j.'：<input type="text" name="choice'.$j.'" id=""></span>';
    $i++;
}
    echo '<input type="hidden" name="count" value='.$i.'>';
?>
<input type="hidden" name="trigger" value=1>
<input type="submit" value="提交">
</form>
<?php
}
else if(!$number){
}
else{
    echo '<h2>選項數目不可超過5！</h2>';
}
$trigger=$_POST['trigger'];
$title=$_POST['title'];
$count=$_POST['count'];
$choice1=$_POST['choice1'];
$choice2=$_POST['choice2'];
$choice3=$_POST['choice3'];
$choice4=$_POST['choice4'];
$choice5=$_POST['choice5'];
$ID=time();
$SQLCreate="INSERT INTO vote(ID,title,number,choice1,choice2,choice3,choice4,choice5) VALUES ('$ID','$title','$count','$choice1','$choice2
','$choice3','$choice4','$choice5')";
$SQLResulttable="CREATE TABLE ".$ID."result(voter varchar(255),choice1 int(10),choice2 int(10),choice3 int(10),choice4 int(10),choice5 int(10))";
if($trigger){
  echo "<div class='voting'>";
mysqli_query($link,$SQLCreate);
mysqli_query($link,$SQLResulttable);
echo '<h2>投票已生成！請至投票系統查看。<h2>';
}
?>
      </div>
      </div>
      <div class="c"></div>
      <div class="footer"></div>
    </div>
</body>
</html>
<?php
}
?>