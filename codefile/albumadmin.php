<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if(!isset($_SESSION['root'])){
        header("location:iliglelogin.php");
        // 只有管理者有權限進入
    }
    else{
$link=mysqli_connect('localhost','root','j0917510727','php');
$SQL="SELECT name FROM album ORDER BY name";
function delTree($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
foreach ($files as $file) {
    (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
}
return rmdir($dir);
}
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
  <link rel="stylesheet" href="albumr.css">
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
        <div class="album">
        <div class="upload">
    <form action="#" method='POST' enctype="multipart/form-data">
    <h1>上傳照片：</h1>
    請選擇您要上傳的相片：<input type="file" name="file[]" multiple><br><br>
    請選擇要上傳的相簿：<select name="albumforupload" id="">
    <option value="">請選擇相簿</option>
    <?php
    if($result=mysqli_query($link,$SQL)){
        while($row=mysqli_fetch_assoc($result)){
            echo "<option value='".$row['name']."'>".$row['name']."</option>";
        }
    }
    ?>
    </select>
    <input type="submit" value="上傳">
    </form>
    </div>
    <div class='createAlbum'>
    <h1>建立相簿：</h1>
    <form action="#" method='POST'>
    請輸入要創建的相簿名稱：<input type="text" name="albumname" id="">
    <input type="submit" value="建立">
    </form>
    </div>
    <div class="remove">
    <h1>移除相簿：</h1>
    <form action="#" method='POST'>
    請選擇要移除的相簿名稱：<select name="removealbum" id="">
    <option value="">請選擇相簿</option>
    <?php
    if($result=mysqli_query($link,$SQL)){
        while($row=mysqli_fetch_assoc($result)){
            echo "<option value='".$row['name']."'>".$row['name']."</option>";
        }
    }
    ?>
    </select>
    <input type="submit" value="移除">
    </div>
    
</body>
</html>

<?php
$albumname=$_POST['albumname'];
$albumforupload=$_POST['albumforupload'];
$removealbum=$_POST['removealbum'];
date_default_timezone_set("Asia/Taipei");
$ID=time();
$date= date("Y-m-d");
$fileCount = count($_FILES['file']['name']);
if($albumname){
    // $dirori="./albumupload/".$albumname;
    // $dir=iconv("UTF-8", "big5", $dirori );
    // echo is_dir($dir);
    if(is_dir("./albumupload/".$ID)){
        echo "相簿已存在，請重試！";
    }
    else{
    if(mkdir("./albumupload/".$ID)){
    $SQLCreate="INSERT INTO album(albumID,name,date) values('$ID','$albumname','$date');";
    mysqli_query($link,$SQLCreate);
    echo '相簿創建成功！';
    header('refresh:1; url=albumadmin.php');
    }
    // else{
    //     echo '取名包含非法字元，請重新檢查！';
    //     header('refresh:1; url=albumadmin.php');
    // }
}
}
if($removealbum){
    $sqlremove="SELECT albumID from album where name='$removealbum';";
    if($result=mysqli_query($link,$sqlremove)){
        while($row=mysqli_fetch_assoc($result)){
    if(is_dir("albumupload/".$row['albumID'])){
        delTree("albumupload/".$row['albumID']);
        echo '相簿已連同照片全數刪除！';
        $SQLDel="DELETE FROM album WHERE name='$removealbum';";
        mysqli_query($link,$SQLDel);
        header('refresh:1; url=albumadmin.php');
    }
}
    }
}
$SQLUP="SELECT * FROM album WHERE name='$albumforupload'";
if($result=mysqli_query($link,$SQLUP)){
    while($row=mysqli_fetch_assoc($result)){
for($i=0;$i<$fileCount;$i++){
$extension=pathinfo($_FILES['file']['name'][$i],PATHINFO_EXTENSION);
if(in_array($extension,array('jpg','png','gif','jpeg'))){
if ($_FILES["file"]["error"][$i] > 0){
echo "Error: " . $_FILES["file"]["error"];
}
else{
$fn=$_FILES["file"]["name"][$i];
echo "檔案名稱: " . $_FILES["file"]["name"][$i]."<br/>";
echo "檔案類型: " . $_FILES["file"]["type"][$i]."<br/>";
echo "檔案大小: " . ($_FILES["file"]["size"][$i] / 1024)." Kb<br />";
echo "暫存名稱: " . $_FILES["file"]["tmp_name"][$i].'<br/>';
if (file_exists("albumupload/".$row['albumID']."/".iconv("UTF-8","big5",$_FILES["file"]["name"][$i]))){
echo "檔案已經存在，請勿重覆上傳相同檔案";
}
else{
if (move_uploaded_file($_FILES["file"]["tmp_name"][$i],"albumupload/".$row['albumID']."/".iconv("UTF-8", "big5", $fn ))) {
   echo "檔案上傳成功<br/><br><br>";
//    unlink($_FILES["file"]["tmp_name"][$i]);
}
else
   echo "檔案上傳失敗<br/><br><br>";

}
}
}
else{
    echo "檔案格式錯誤，僅允許jpeg,jpg,png,gif";
}
}
}
}
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
?>
<script>
    var swiper = new Swiper('.swiper-container', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>