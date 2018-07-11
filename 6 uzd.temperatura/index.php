
<?php
if (isset($_GET['valandos'])) {
    $valandos = $_GET['valandos'];
    $time = explode(',' , $valandos);



if (isset($_GET['temperatura'])) {
    $temperatura = $_GET['temperatura'];
    $temp = explode(',', $temperatura);

    arsort($temp);
    foreach ($temp as $indeksas => $elementas) {
        break;
    }
    $didziausiaTemp = $temp[$indeksas];
    $didziausiosTempIndeksas = $indeksas;
    echo 'Aukščiausia temperatūra: ' . $didziausiaTemp . ' buvo ' . $time[$didziausiosTempIndeksas] . ' val.<br>';
    foreach ($temp as $indeksas => $elementas) {
        if ($indeksas != $didziausiosTempIndeksas
            &&
            $elementas >= $didziausiaTemp - 0.5
        ) {
            // artima auksciausiai
            echo 'Artima aukščiausiai: ' . $time[$indeksas] . ' val. ' . $elementas . '<br>';
        }


    }

    foreach ($temp as $indeksas => $elementas) {
        if (37.00 >= $elementas && $elementas >= 36.40) {
            echo 'Normali temperatūra buvo: ' . $time[$indeksas] . 'val.' . $temp[$indeksas] . '<br>';
        }
    }
}
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Užduotis </title>
</head>
<body>

<main role="main" class="container">

    <form action="index.php" method="GET">
        <div class="form-group">
            <label>Matavimo h:</label>
            <input type="text" name="valandos" class="form-control" placeholder="valandos" required>
        </div>
        <div class="form-group">
            <label>Temperatura:</label>
            <input type="text" name="temperatura" class="form-control" placeholder="laipsniais" required>
        </div>

        <button type="submit" class="btn btn-primary">Skaičiuoti</button>
    </form>

</main>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>


<!--UžduotisLigonio temperatūra per parą matuojama kas valandą arba kas kelias valandas ir užrašoma į ligonio kortelę.-->
<!--Parašykite programą, kuri rastų:●Kurią valandą temperatūra buvo aukščiausia●Kuriomis valandomis temperatūra buvo artima -->
<!--(+/- 0.5 laipsnio) aukščiausiai temperatūrai●Kuriomis valandomis temperatūra buvo gera (nuo 36.40 iki 37.00)Turimi -->
<!--du įvedimo laukai. Pirmame lauke įvedamos matavimo valandos atskirtos kableliais, antrame įvedamos temperatūros atskirtos -->
<!--taip pat kableliais.Rezultatas:●Aukščiausia temperatūra: 39.7 buvo 16 val.●Artima aukščiausiai: 16 val. 39.5●-->
<!--Normali temperatūra buvo: 17 val. 36.7-->