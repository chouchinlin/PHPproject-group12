<?php
header("Content-Type:text/html; charset=utf-8");
//開啟Session
session_start();
//清除Session
session_destroy();
//導到login.php
header("Location:home.php");
?>