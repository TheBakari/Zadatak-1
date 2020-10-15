
<?php
session_start();
require_once("function.php");
require_once("klase/classBaze.php");
require_once("klase/classLog.php");
$db=new Baza();
$db->connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--Custom JavaScript configuration-->
    <script src="jscript/config.js"></script>

    <!--Custom CSS stylesheet-->
    <!--<link href="css/style.css" rel="stylesheet">-->
    <title>Document</title>
</head>
<body>
    <?php
        include("header.php");
    ?>
    <main id="main">
    <div class="container">
        <h2 class="text-center"> Zadatak  </h2>
        <div class="input-group mb-3 col-md-10 central">
            <div class="input-group-text" >
                <label for="intpuGroupSelect01"> kategorije</label>
            </div>
            <select class="custom-select select_category"name="inputGroupSelect01" id="inputGroupSelect01">
            </select>
            <button id="category_search" class='btn btn-outline-info' style="margin-left: 20px">Pretrazi prema Kategoriji</button>
            <button id="product_search" class='btn btn-outline-info' style="margin-left: 20px">Prikaz svih proizvoda</button>
        </div>
    </div>
    <div class="container-fluid">
                <div class="text-center">
                        <img src="pics/loading.gif" id="loader" width="200" style="display: none;">
                </div>
        <div class="row" id="product_show">
        
        </div>
        <div class="row" id="allProduct_show">
                
        </div>
</div>
    </main>
</body>
</html>