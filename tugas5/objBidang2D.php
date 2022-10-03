<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 5 PHP-Rizky Dharma S</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center my-5 mb-5">
            Abstract Class Bidang Bentuk 2D
        </h1>
        <?php
        require_once 'Lingkaran.php';
        require_once 'PersegiPanjang.php';
        require_once 'Segitiga.php';

        $bdg1 = new Lingkaran(14);
        $bdg2 = new PersegiPanjang(30, 60);
        $bdg3 = new Lingkaran(80);
        $bdg4 = new PersegiPanjang(20, 30);
        $bdg5 = new Segitiga(5, 7, 13);
        $bdg6 = new PersegiPanjang(20, 30);
        $bdg7 = new Segitiga(12, 13, 14);
        $bdg8 = new Lingkaran(30);
        $bdg9 = new PersegiPanjang(10, 10);
        $bdg10 = new Segitiga(50, 50, 50);
        $thead = ['#', 'Nama Bidang', 'Keterangan', 'Luas Bidang', 'Keliling Bidang'];

        $bidang_bidang = [$bdg1, $bdg2, $bdg3, $bdg4, $bdg5, $bdg6, $bdg7, $bdg8, $bdg9, $bdg10];
        ?>
        <table class="table">
            <thead>
                <tr>
                    <?php
                    foreach ($thead as $th) { ?>
                        <th><?= $th ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($bidang_bidang as $bids) { ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <td><?= $bids->nameBidang(); ?></td>
                        <td><?= $bids->keterangan(); ?></td>
                        <td><?= $bids->luasBidang(); ?> cm</td>
                        <td><?= $bids->kelBidang(); ?> cm</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>


</html>