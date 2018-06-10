<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form input</title>
</head>
<body>
<form ACTION="form.php" method="POST">
    <input type="number" name="num1">
    <input type="number" name="num2">
    <button type="submit">Submit</button>
</form>

</body>
</html>


<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 5/8/2017
 * Time: 9:21 PM
 */
if(isset($_POST['add'])){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}

