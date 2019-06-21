<?php
$file=$_GET['file'];
if(is_file(iconv('UTF-8','GB2312',$file))){
header("Content-type:application/octet-stream");
$filename = basename($file);
header("Content-Disposition:attachment;filename = ".$filename);
header("Accept-ranges:bytes");
header("Accept-length:".filesize($file));
readfile($file);
}else{
echo "<script>alert('檔案不存在')</script>";
echo "下載失敗/非法登入 <a href=download.php>按我回檔案目錄</a>";
}
?>
