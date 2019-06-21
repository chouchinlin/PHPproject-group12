<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if(!isset($_SESSION['root']) and !isset($_SESSION['user'])){
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
  <link rel="stylesheet" href="voteu.css">
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
      <div class="identity"><span>您是使用者</span></div>
      <ul class=headMenu>
        <li><a class="home"href="homeu.php">首頁</a></li>
        <li><a class="tell" href="talku.php">聯絡我們</a></li>
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
            <li class=List><a href="newsu.php">最新消息</a></li>
            <li class=List><a href="calendaru.php">行事曆</a></li>
            <li class=List><a href="ruleu.php">宿舍公約</a></li>
            <li class=List><div class='jjj'><a class=dropdown href="">相關服務<div class="caret"></div></a>
            <ul class=dropdownMenu2>
              <li class=dlist><a href="dormitory.php">住宿申請</a></li>
              <li class=dlist><a href="fix.php">報修申請</a></li>
              <li class=dlist><a href="borrow.php">設備借用</a></li>
            </ul>
</div>
          </li>
            <li class=List><a href="downloadu.php">表單下載</a></li>
            <li class=List><a href="albumu.php">相簿</a></li>
            <li class=List><a href="vote.php">投票</a></li>
          </ul>
          <div class="clear"></div>
        </div>
        <div class="vote">
          <div class="choose">
        <h1>請選擇要參與的投票：</h1>
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
    <div class="voting">
    <?php
     $ID=$_POST['vote'];
    $SQL="SELECT * FROM vote WHERE ID='$ID'";

        ?>
    <form action="#" method='POST'>
    <?php
    
    if($result=mysqli_query($link,$SQL)){
        while($row=mysqli_fetch_assoc($result)){
            echo "<h1>投票議題：".$row['title'].'</h1>';
            echo "<span class='test'>";
            for($j=1;$j<=$row['number'];$j++){
            echo "<span><input type='radio' name='option' value='".$j."'>".$row["choice".$j]."<br></span>";
        }
        }
        
        echo '<input type="hidden" name="ID" value='.$ID.'>';
        echo "<input type='submit'>";
        echo "</span>";
    }
    ?>
    </form>
</body>
</html>
<?php

$answer=$_POST['option'];
$ID=$_POST['ID'];
$table=$ID."result";
$SQLtest="SELECT DISTINCT * FROM $table ORDER BY voter ASC;";
$k=0;
if($result=mysqli_query($link,$SQLtest)){
    while($row=mysqli_fetch_assoc($result)){
        $array[$k]=$row['voter'];
        $k++;
    }
}
$user=$_SESSION['user'];
if($answer){
  if(in_array($user,$array)){
        echo "<h2>您已針對此議題投過票，請遵守一人一票的原則！</h2>";
    }
    else{
    echo "<h2>您已成功投票！</h2>";
    $SQLInsert="INSERT INTO ".$ID."result(voter,choice".$answer.") VALUES('$user',1)";
    mysqli_query($link,$SQLInsert);
}
}
?>
</div>
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