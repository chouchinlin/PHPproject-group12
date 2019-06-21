<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>住宿申請結果</title>
    <?php
        session_start();
        if(!isset($_SESSION['root']) AND !isset($_SESSION['user'])){
            header("location:iliglelogin.php");
            // 只有登入後才有權限進入
        }
        else{
    $name=$_POST['name'];
    $ID=$_POST['ID'];
    $place=$_POST['place'];
    $time=$_POST['time'];
    $identity=$_POST['money'];
    if($place){
        if($place='OA' or $place='OB'){
        $money=7000;
        }
        if($place='OE' or $place='OF'){
        $money=9000;
    }
    else{
        $money=6000;
    }
    }
    if($time){
        if($time='both'){
        $count=2;
    }
        else{
        $count=1;
    }
    }
    $shouldpay=$count*$money;
    $number=time();
    $link=mysqli_connect('localhost','root','j0917510727','php');
    $SQLInsert="INSERT INTO dormitory(number,name,ID,place,time,identity,money,state) VALUES('$number','$name','$ID','$place','$time','$identity','$shouldpay',0)";
    mysqli_query($link,$SQLInsert);
    ?>
</head>
<body>
    <h1>住宿申請結果</h1>
    <table border='1'>
    <tr>
        <td>流水號</td>
        <td>姓名</td>
        <td>學號</td>
        <td>申請宿舍</td>
        <td>申請期間</td>
        <td>總計金額</td>
    </tr>
    <tr>
    <td><?php echo $number ?></td>
    <td><?php echo $name ?></td>
    <td><?php echo $ID ?></td>
    <td><?php echo $place ?></td>
    <td><?php echo $time ?></td>
    <td><?php echo ($count*$money).'元' ?></td>
    </tr>
    </table>
    <p>請於宿辦上班時攜帶此單來繳費。</p>
</body>
</html>
<?php
        }
        ?>