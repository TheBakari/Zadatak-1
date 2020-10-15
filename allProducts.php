<?php
$db=mysqli_connect("localhost", "root", "", "zadatak");
?>
<?php
    mysqli_query($db, "SET NAMES UTF8");
    $res=mysqli_query($db, "SELECT * FROM products");
    $all=mysqli_fetch_all($res, MYSQLI_ASSOC);
    echo JSON_encode($all, 256);
  
?>