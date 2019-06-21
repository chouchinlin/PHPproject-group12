<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>學生宿舍網</title>
  <link rel="stylesheet" href="homeu.css">
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
        </div>
        <div class="box">
		<form action="borrowresult.php" method="POST">
			<h3>宿舍設備借用系統</h3>

<?php  
    session_start();
	if(!isset($_SESSION['root']) AND !isset($_SESSION['user'])){
		header("location:iliglelogin.php");
		// 只有登入後才有權限進入
	}
	else{
	$dbServer = "localhost"; 
	$dbName = "php";
	$dbUser = "root"; 
	$dbPass = "j0917510727"; 
	 
	$conn = mysql_pconnect($dbServer, $dbUser, $dbPass) or trigger_error(mysql_error(),E_USER_ERROR);  
	mysql_query("SET NAMES utf8"); 
	mysql_select_db($dbName,$conn); 
	 
	echo "宿舍空間"."<br>"."<br>"; 
	$sql="SELECT * FROM place"; 
	$result = mysql_query($sql,$conn) or die(mysql_error()); 
	$row_result = mysql_fetch_assoc($result); 
	echo "<select  style='font-size:25px;' name='place'>"; 
	echo "<option value=''>請選擇</option>";
	do 
	{ 
	echo "<option value = ".$row_result['place'].">"; 
	echo $row_result['place']; 
	echo "</option>"; 
	}while($row_result = mysql_fetch_assoc($result)); 
	echo "</select>"."<br>"."<br>"; 

	echo "設備"."<br>"."<br>";
	$sql2="SELECT * FROM item"; 
	$result = mysql_query($sql2,$conn) or die(mysql_error()); 
	$row_result = mysql_fetch_assoc($result); 

	echo "<select style='font-size:25px;' name='item'>"; 
	echo "<option value=''>請選擇</option>";
	do 
	{ 
	echo "<option value = ".$row_result['item'].">"; 
	echo $row_result['item']; 

	echo "</option>"; 
	}while($row_result = mysql_fetch_assoc($result)); 
	echo "</select>"."<br>"."<br>";

	echo "桌遊"."<br>"."<br>";
	$sql3="SELECT * FROM game"; 
	$result = mysql_query($sql3,$conn) or die(mysql_error()); 
	$row_result = mysql_fetch_assoc($result); 
	echo "<select style='font-size:25px;' name='game'>"; 
	echo "<option value=''>請選擇</option>";
	do 
	{ 
	echo "<option value = ".$row_result['game'].">"; 
	echo $row_result['game']; 
	echo "</option>"; 
	}while($row_result = mysql_fetch_assoc($result)); 
	echo "</select>"."<br>"."<br>";
?>
您的學號：<br><br>
<input type="text" name="userID"><br><br>
<input type="submit" value="確認借用">
</form>
<?php
	}
	?>
      </div>
      </div>
      <div class="c"></div>
      <div class="footer"></div>
    </div>
</body>
</html>
