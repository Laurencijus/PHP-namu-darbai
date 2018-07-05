
<?php

 if(isset($_POST['Atlyginimas'])) {
     $dabartinisAtlyginimas = $_POST['Atlyginimas'];
     $procentai = $_POST['Procentai'];
     $tikslas = $_POST['Atlyginimas2'];
     $kiekMetuPraejo = 0;

     $suma = $dabartinisAtlyginimas;



 };
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid lightpink;
        }
        </style>
</head>
<body>
<main role="main" class="container">
    <h1>Norimo atlyginimo skaiciuokle</h1><br>
    <p>

        <br/>
       Iveskite zemiau savo duomenis:
    </p>


<form action="index3.php" method="POST">
    <div class="form-group">
        <label>Atlyginimas</label>
        <input type="number" name="Atlyginimas" class="form-control" placeholder="Iveskite skaiciu" required><br>
    </div>
    <div class="form-group">
        <label>Procentai(kiek padidina kas metus)</label>
        <input type="number" name="Procentai" class="form-control" placeholder="Iveskite skaiciu" required><br>
    </div>
     <div class="form-group">
        <label>Atlyginimas kuri noretu gauti darbuotojas</label>
        <input type="number" name="Atlyginimas2" class="form-control" placeholder="Iveskite skaiciu" required><br>
    </div>
    <button type="submit" class="btn btn-primary">PASKAICIUOTI</button><br><br>
</form>
    <?php

    if(isset($_POST['Atlyginimas'])) {
        echo '<table style="width:100%" border="2" >
        <thead>
            <th>Metai</th>
            <th>Atlyginimas</th>
        </thead>';
        do {
            $suma=$suma + $suma * $procentai / 100;
            $kiekMetuPraejo ++;
            echo '<tr><td>'.$kiekMetuPraejo.'</td><td>'. round($suma, 2) . '</td></tr>';
        } while($suma < $tikslas);

    }

    echo '<img width="600px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP6_GuY5FCnNCZNg_rlk8K6QKOKf3ecjac_2_3rNF5dn70pOY7fw" alt="">';
    ?><br><br><br>



    </table>
</main>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>




</body>
</html>