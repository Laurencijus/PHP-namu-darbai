<?php

if (isset($_GET['x'])){
    $x = $_GET["x"];
    $y = $_GET["y"];
    $rezultatas = $x + $y;
}



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="index.php" method="GET">
    x
    <input type="number" name="x">
    <br>
    y
    <input type="number" name="y">
    <br>
    <input type="submit" value="paskaiciuoti"
           <br>
 <?php  if (isset($_GET["x"])) {
    echo 'rezultatas:'.$rezultatas.'<br />';
    echo "pirmas skaicius buvo:".$x.'<br />';
    echo "antras skaicius buvo:".$y.'<br />';
    }
    ?>

</form>
</body>
</html>