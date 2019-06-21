<?php
    $link=mysqli_connect('localhost','root','j0917510727','php');
    session_start();
    if(!isset($_SESSION['root'])){
        header("location:iliglelogin.php");
        // 只有管理者有權限進入
    }
    else{
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案上傳</title>
</head>
<body>
    <div class="upload">
    <form action="#" method='POST' enctype="multipart/form-data">
    請選擇您要上傳的檔案：<input type="file" name="file[]" multiple><br><br>
    <input type="submit" value="上傳">
    </form>
    </div>
    
</body>
</html>

<?php
$fileCount = count($_FILES['file']['name']);
for($i=0;$i<$fileCount;$i++){
$ID=rand(1,2147483647);
$extension=pathinfo($_FILES['file']['name'][$i],PATHINFO_EXTENSION);
if ($_FILES["file"]["error"][$i] > 0){
echo "Error: " . $_FILES["file"]["error"];
}
else{
$fn=$_FILES["file"]["name"][$i];
$ft=$ID.".".pathinfo($fn, PATHINFO_EXTENSION);
echo "檔案名稱: " . $_FILES["file"]["name"][$i]."<br/>";
echo "檔案類型: " . $_FILES["file"]["type"][$i]."<br/>";
echo "檔案大小: " . ($_FILES["file"]["size"][$i] / 1024)." Kb<br />";
echo "暫存名稱: " . $_FILES["file"]["tmp_name"][$i].'<br/>';
if (file_exists("fileupload/".iconv("UTF-8","big5",$_FILES["file"]["name"][$i]))){
echo "檔案已經存在，請勿重覆上傳相同檔案";
}
else{
if (move_uploaded_file($_FILES["file"]["tmp_name"][$i],"fileupload/".$ft)) {
   echo "檔案上傳成功<br/><br><br>";
$SQLup="INSERT INTO download(realname,name) VALUES('$ft','$fn')";
mysqli_query($link,$SQLup);
//    unlink($_FILES["file"]["tmp_name"][$i]);
}
else
   echo "檔案上傳失敗<br/><br><br>";

}
}
}
    }
?>
<a href="homer.php">回首頁</a>