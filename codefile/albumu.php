<!DOCTYPE html>
<html lang="en">
<?php
$link=mysqli_connect('localhost','root','j0917510727','php');
$SQL="SELECT * FROM album ORDER BY name";
session_start();
if(!isset($_SESSION['root']) AND !isset($_SESSION['user'])){
    header("location:iliglelogin.php");
    // 只有登入後才有權限進入
}
else{
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>學生宿舍網-相簿</title>
  <script src="jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="lightbox.css">
    <link rel="stylesheet" href="swiper.min.css">
    <script src="lightbox.js"></script>
    <script src="swiper.min.js"></script>
  <link rel="stylesheet" href="albumu.css">
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
            <ul class=dropdownMenu>
              <li class=dlist><a href="dormitory.php">住宿申請</a></li>
              <li class=dlist><a href="fix.php">報修申請</a></li>
              <li class=dlist><a href="borrow.php">設備借用</a></li>
            </ul>
</div>
          </li>
            <li class=List><a href="downloadu.php">表單下載</a></li>
            <li class=List><a href="albumu.php">相簿</a></li>
            <li class=List><a href="voteu.php">投票</a></li>
          </ul>
          <div class="clear"></div>
        </div>
        <div class="album">
          <h1>宿舍相簿^_^</h1>
          <div class='forma'>
        <form action="#" method='POST'>
    請選擇要查看的相簿名稱：<select name="album" id="">
    <option value="">請選擇相簿</option>
    <?php
    if($result=mysqli_query($link,$SQL)){
        while($row=mysqli_fetch_assoc($result)){
            echo "<option value='".$row['name']."'>".$row['name']."</option>";
        }
    }
    ?>
    </select>
    <input type="submit" value="提交" class=submit><br>
    </div>
</body>
</html>
<?php
// $page=$_GET['page'];//獲取當前頁數
$i=0;
$album=$_POST['album'];
$SQLUP="SELECT * FROM album WHERE name='$album'";
if($result=mysqli_query($link,$SQLUP)){
    while($row=mysqli_fetch_assoc($result)){
$handle = opendir('albumupload/'.$row['albumID']); //當前目錄
    while (false !== ($file = readdir($handle))) { //遍歷該php檔案所在目錄
      list($filesname,$kzm)=explode(".",$file);//獲取副檔名
        if($kzm=="gif" or $kzm=="jpg" or $kzm=="png") { //檔案過濾
          if (!is_dir('./'.$file)) { //資料夾過濾
            $array[]=$file;//把符合條件的檔名存入陣列
            $i++;//記錄圖片總張數
           }
          }
    }
    $arraycount=count($array);
echo "<div class='swiper-container'><div class='swiper-wrapper'>";
for ($j=0;$j<$arraycount;$j++){//迴圈條件控制顯示圖片張數
    // echo $array[$j];
    echo "<div class='swiper-slide'><img width='100%' src='./albumupload/".$row['albumID']."/".$array[$j]."'></div>";//輸出圖片陣列
}
echo '</div>
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
</div>';
    }
}
?>
      </div>
      <div class="clear"></div>
      </div>
      <div class="c"></div>
      <div class="footer"></div>
    </div>
</body>
</html>
<?php
}
?>
<script>
    var swiper = new Swiper('.swiper-container', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>