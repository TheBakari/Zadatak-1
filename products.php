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

    <!--Custom CSS stylesheet
    <link href="css/style.css" rel="stylesheet">-->
    <title>Document</title>
</head>
<body>
<?php
    include("header.php");
?>
<div class="container">
    <h2 class="text-center">Upravljanje proizvodima</h2>
    <div class="input-group mb-3 col-md-10 central">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Proizvodi</label>
        </div>
        <select class="custom-select select_products" id="inputGroupSelect01">
            
        </select>
        <button id="product_chose" class='btn btn-success' style="margin-left: 20px;">Izaberite proizvod</button>
    </div>   
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <tr>
                        <th>Product ID</th>
                        <td><input type='text' class="col-12" name='product_id' id='product_id' value=''></td>
                    </tr>
                    <tr>
                        
                        <th>Model number</th>
                        <td><input type='text' class="col-12" name='model_number' id='model_number' value=''></td>
                    </tr>
                    <tr>
                        <th>Naziv kategorije</th>
                        <td><input type='text' class="col-12"  name='category' id='category' value=''></td>
                    </tr>
                    <tr>
                        <th>Deparment name</th>
                        <td><input type='text' class="col-12"  name='deparment_name' id='deparment_name' value=''></td>
                    </tr>
                    <tr>
                        <th>Manufacturer name</th>
                        <td><input type='text' class="col-12"  name='manufacturer_name' id='manufacturer_name' value=''></td>
                    </tr>
                    <tr>
                        <th>UPC</th>
                        <td><input type='text' class="col-12"  name='upc' id='upc' value=''></td>
                    </tr>
                    <tr>
                        <th>SKU</th>
                        <td><input type='text' class="col-12"  name='sku' id='sku' value=''></td>
                    </tr>
                    <tr>
                        <th>Regular price</th>
                        <td><input type='text' class="col-12"  name='regular_price' id='regular_price' value=''></td>
                    </tr>
                    <tr>
                        <th>Sale price</th>
                        <td><input type='text' class="col-12"  name='sale_price' id='sale_price' value=''></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><input type='text' class="col-12"  name='description' id='description' value=''></td>
                    </tr>
                    <tr>
                        <th>URL</th>
                        <td><input type='text' class="col-12"  name='url' id='url' value=''></td>
                    </tr>
                </table>
            </div>
            
        </div>
    </div>
    <button id="product_change" class='btn btn-success' style="margin-left: 20px;">Izmenite proizvod</button> <button id="product_delete" class='btn btn-success' style="margin-left: 20px;">Obrisite proizvod</button>
</div>