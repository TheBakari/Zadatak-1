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
    <h2 class="text-center">Upravljanje kategorijama</h2>
    <div class="input-group mb-3 col-md-10 central">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Kategorije</label>
        </div>
        <select class="custom-select select_category_manage" id="inputGroupSelect01">
            
        </select>
        <button id="category_chose" class='btn btn-success' style="margin-left: 20px;">Izaberite kategoriju</button>
    </div>   
</div>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <tr>
                        <th>Naziv kategorije</th>
                        <td><input type='text' class="col-12"  name='category_manage' id='category_manage' value=''></td>
                    </tr>
                </table>
            </div>
            
        </div>
    </div>
    <button id="category_change" class='btn btn-success' style="margin-left: 20px;">Izmenite naziv kategorije</button> <button id="category_delete" class='btn btn-success' style="margin-left: 20px;">Obrisite kategoriju</button>
    <div class="text-danger" id="answer">

    </div>
</div>