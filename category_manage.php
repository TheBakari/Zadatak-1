<?php
$db=mysqli_connect("localhost","root","","zadatak");

if(isset($_POST['category']))
{
    $category=$_POST['category'];
    mysqli_query($db,"SET NAMES UTF8");
    $res=mysqli_query($db, "SELECT * FROM category WHERE categories_id='$category'");
    $all=mysqli_fetch_all($res, MYSQLI_ASSOC);
    echo JSON_encode($all,256);
}
if(isset($_GET['funkcija']))
{
    $funkcija=$_GET['funkcija'];
    $category_id=$_POST['categories_id'];
    $category_manage=$_POST['category_manage'];
    $res=mysqli_query($db, "SELECT * FROM category WHERE categories_id='$category_id'");
    $row=mysqli_fetch_array($res);
    $category_name=$row['category_name'];
    if($funkcija=="change")
    {
        $sql="UPDATE category, products SET category.category_name='$category_manage', products.category_name='$category_manage' WHERE products.category_name='$category_name' AND products.category_name=category.category_name";  
        mysqli_query($db, $sql);
        echo "Uspesno ste izmenili naziv kategorije!!";
    }
    elseif($funkcija=="delete")
    {
        $sql="DELETE category_name from category JOIN products on category.category_name=products.category_name WHERE category_name='$category_name'";
        mysqli_query($db,$sql);
        echo "Uspesno ste obrisali  kategorije";
    }
    else
    {
        echo "Funkcija nije izabrana";
    }
}
?>