<?php
    include("klase/_csv.php");
    $csv = new csv();
    if(isset($_POST['sub'])) {
        $csv->import($_FILES['file']['tmp_name']);
    }
    if(isset($_POST['exp'])) {
        $csv->export();

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="sub" value="Import">
    </form>

    <form action="#" method="POST">
        <input type="submit" name="exp" value="Export">
    </form>
    <div>
        <a href="index.php">nazad na glavnu stranicu </a>
    </div>
</body>
</html>