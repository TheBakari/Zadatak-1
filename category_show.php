<?php 
    if(isset($_GET['categories_id']))
    {
        $categories_id=$_GET['categories_id'];
        $db=mysqli_connect("localhost", "root", "", "zadatak");
        mysqli_query($db,"SET NAMES UTF8");
        $res=mysqli_query($db,"SELECT * FROM products_view WHERE categories_id='$categories_id'");
        $all=mysqli_fetch_all($res, MYSQLI_ASSOC);
        echo JSON_encode($all,256);
    }
    else {
        echo "Kategorija nije izabrana";
    };
    ?>