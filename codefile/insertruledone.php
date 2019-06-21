<?php

    $title=$_GET['title'];
    $content=$_GET['content'];  

    $link = @mysqli_connect('localhost','root','j0917510727','php');
    $sql_insert="INSERT INTO rule (title, content) VALUES ('$title', '$content')";
    $insert=mysqli_query($link,$sql_insert);
    header("Location:ruleadmin.php");
    mysqli_close($link);
?>