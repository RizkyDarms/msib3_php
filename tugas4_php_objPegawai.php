<?php
require "tugas4_php_RizkyDharmaSanjaya.php";
$p1 = [141, "Lort Satria", "Manager", "Belum Menikah", "Islam"];
$p2 = [142, "Dewa David", "Staff", "Belum Menikah", "Kristen"];
$p3 = [143, "Raihan", "Asisten Manager", "Menikah", "Buddha"];
$p4 = [144, "Andika Lylana Chummaedi", "Kabag", "Belum Menikah", "Konghucu"];
$p5 = [145, "Paduka Agung", "Asisten Manager", "Menikah", "Hindu"];
$dataPegawai = [$p1, $p2, $p3, $p4, $p5];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 4 PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center my-5 mb-5">
            <?= Pegawai::PT ?>
        </h1>
        <div class="row">
            <?php
            foreach ($dataPegawai as $dpeg) {
                $dapeg = new Pegawai($dpeg[0], $dpeg[1], $dpeg[2], $dpeg[3], $dpeg[4]);
                $dapeg->setCetak();
            }
            ?>
        </div>
        <h5>
            Jumlah Pegawai: <?= Pegawai::$no - 1 ?>
        </h5>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>