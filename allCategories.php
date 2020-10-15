<?php
    $db=mysqli_connect("localhost", "root", "", "zadatak");
?>

<?php
    $db=mysqli_connect("localhost", "root", "", "zadatak");
    mysqli_query($db, "SET NAMES UTF8");
    $res=mysqli_query($db, "SELECT * FROM category");
    $all=mysqli_fetch_all($res, MYSQLI_ASSOC);
    echo JSON_encode($all, 256); 
?>

