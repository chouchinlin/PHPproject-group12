<?php
    $uID=$_POST['ID'];
    $link = @mysqli_connect('localhost','root','j0917510727','php');
    $title=$_POST['title'];
    $content=$_POST['content'];
 
    $sql_update="UPDATE rule SET title='$title', content='$content' WHERE ID=$uID";
    $update=mysqli_query($link,$sql_update);

    $sql="SELECT * FROM rule";
    $result=mysqli_query($link,$sql);

    echo "<button onclick="."location.href='insertrule.php'>"."新增資料"."</button><br/>";
    echo "<table cellpadding=3 border=1>";
    echo "<tr>";
    echo "<th>"."標題"."</th>";
    echo "<th>"."內容"."</th>";
    echo "<th>"."刪除資料"."</th>";
    echo "<th>"."更新資料"."</th>";
    echo "</tr>";
    echo "<br>";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        $ID=$row['ID'];
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['content']."</td>";
        echo "<td><center>"."<button onclick="."location.href='deleterule.php?ID=$ID'>"."刪除資料"."</center></button>"."</td>";
        echo "<td><center>"."<button onclick="."location.href='updaterule.php?ID=$ID'>"."更新資料"."</center></button>"."</td>";
        echo "</tr>";
    }
    echo "</table>";
    header('location:ruleadmin.php');
    mysqli_close($link);
?>