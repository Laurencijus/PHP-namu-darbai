
<?php
if (isset($_POST['svoris'])){

$svorisKg = $_POST['svoris'];
$ugisCm = $_POST['ugis'];
$ugisMetrais = $ugisCm / 100;

// round suapvalina skaiciu iki nurodyto skaiciaus po kablelio
// siuo atveju 2
// ** - kelimas laipsniu
$kmi = round($svorisKg / ($ugisMetrais ** 2), 2);
if ($kmi < 18.5) {
    $kmiPaaiskinimas = 'Per mažas svoris';
} elseif ($kmi < 25) {
    $kmiPaaiskinimas = "Normalus svoris";
} elseif ($kmi < 30) {
    $kmiPaaiskinimas = "Antsvoris";
} elseif ($kmi < 35) {
    $kmiPaaiskinimas = "I laipsnio nutukimas";
} elseif ($kmi < 40) {
    $kmiPaaiskinimas = "II laipsnio nutukimas";
} else {
    $kmiPaaiskinimas = "III laipsnio nutukimas";
}}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>KMI skaičiuoklė</title>
    <style>
        table, th, td {
            border: 1px solid #ff5a3d;
        }
    </style>
</head>
<body>
<main role="main" class="container">
    <h1>Kūno masės indekso (KMI) skaičiuoklė:</h1>
    <p>
        KMI - tai ūgio ir svorio santykio rodiklis, leidžiantis
        įvertinti ar žmogaus svoris normalus ar yra antsvoris bei nutukimas.
        <br/>
        Norėdami apskaičiuoti savo KMI, įveskite žemiau nurodytus duomenis.
    </p>
    <form action="index1.php" method="POST">
        <div class="form-group">
            <label>Svoris (kg):</label>
            <input type="number" name="svoris" class="form-control" placeholder="kg" required>
        </div>
        <div class="form-group">
            <label>Ūgis (cm):</label>
            <input type="number" name="ugis" class="form-control" placeholder="cm" required>
        </div>
        <button type="submit" class="btn btn-primary">Skaičiuoti KMI</button><br><br>
    </form>
</main>


<main role="main" class="container">
    <p>Jūsų KMI: <?php

           if (isset($kmi)) {
               echo 'KMI:' . $kmi . '(' . $kmiPaaiskinimas . ')';
               echo '<table style="width:45%">
    <tr>
        <th>KMI</th>
        <th>IŠVADA</th>
    </tr>
    <tr>
        <td><18,5</td>
        <td>Per mazas svoris/mitybos nepakankamumas</td>
    </tr>
    <tr>
        <td>18,5-24,9</td>
        <td>Normalus svoris,normali kuno mase</td>
    </tr>
    <tr>
        <td>25,0-29,9</td>
        <td>Antsvoris</td>
    </tr>
    <tr>
        <td><30,0-34,9</td>
        <td>1 laipsnio nutukimas</td>
    </tr>
    <tr>
        <td>35,0-39,9</td>
        <td>II laipsnio nutukimas</td>
    </tr>
    <tr>
        <td>>40,0</td>
        <td>III laipsnio nutukimas</td>
    </tr>
</table> ';
           }
           ?>
    </p> <br >


    <a class="btn btn-primary" href="index1.php">Grįžti į skaičiuoklę</a>
</main>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>




