<?php
$db=mysqli_connect("localhost", "root", "", "zadatak");
?>
<?php 

    if(isset($_POST['product_id']))
    {
        $product_id=$_POST['product_id'];
        mysqli_query($db, "SET NAMES UTF8");
        $res=mysqli_query($db, "SELECT * FROM products WHERE id='$product_id'");
        $all=mysqli_fetch_all($res, MYSQLI_ASSOC);
        echo JSON_encode($all,256);

    }
   
?>
<?php 
    if(isset($_GET['function']))
    {
        $funkcija=$_GET['function'];
        $model_number=$_POST['model_number'];
        $category=$_POST['category'];
        $manufacturer_name=$_POST['manufacturer_name'];
        $upc=$_POST['upc'];
        $sku=$_POST['sku'];
        $regular_price=$_POST['regular_price'];
        $sale_price=$_POST['sale_price'];
        $description=$_POST['description'];
        $url=$_POST['url'];
        $deparment_name=$_POST['deparment_name'];
        $product_id=$_POST['product_id'];
        if($funkcija=="change")
        {
            $sql="UPDATE products SET model_number='{$model_number}', category_name='{$category}', manufacturer_name='{$manufacturer_name}', upc='{$upc}', sku='{$sku}', regular_price='{$regular_price}', sale_price='{$sale_price}', description='{$description}', url='{$url}', deparment_name='{$deparment_name}' WHERE id='{$product_id}'";
                mysqli_query($db, $sql);
                echo "Uspesno ste izmenili proizvod!!";
        }
        elseif($funkcija=="delete")
        {
            $sql="DELETE FROM products WHERE id='$product_id'";
            mysqli_query($db,$sql);
            echo "Uspesno ste obrisali kategoriju";
        }
        else
        {
            echo "Funkcija nije izabrana";
        }
    }

?>