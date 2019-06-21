<?php
$link=mysqli_connect('localhost','root','j0917510727','php');
session_start();
if(!isset($_SESSION['root']) and !isset($_SESSION['user'])){
    header("location:iliglelogin.php");
    // 只有登入後才有權限進入
}
else{
$user=$_SESSION['user'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>請選擇要參與的投票：</p>
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
    <?php
    $ID=$_POST['vote'];
    $SQL="SELECT * FROM vote WHERE ID='$ID'";
    if($ID){
        ?>
    <form action="#" method='POST'>
    <?php
    if($result=mysqli_query($link,$SQL)){
        while($row=mysqli_fetch_assoc($result)){
            echo "投票標題：".$row['title'].'<br>';
            for($j=1;$j<=$row['number'];$j++){
            echo "<input type='radio' name='option' value='".$j."'>".$row["choice".$j]."<br>";
        }
        }
        }
        echo '<input type="hidden" name="ID" value='.$ID.'>';
        echo "<input type='submit'>";
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
        echo "您已針對此議題投過票，請遵守一人一票的原則！";
    }
    else{
    echo "您已成功投票！";
    $SQLInsert="INSERT INTO ".$ID."result(voter,choice".$answer.") VALUES('$user',1)";
    mysqli_query($link,$SQLInsert);
}
}
?>
<?php
}
?>