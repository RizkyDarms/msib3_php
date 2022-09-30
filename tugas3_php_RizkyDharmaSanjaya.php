<!DOCTYPE html>
<html lang="en">
<?php
// buat data menggunakan array scalar
$mhs1 = ['npm' => 197064516231, 'nama' => 'Rizky Dharma Sanjaya', 'nilai' => 88];
$mhs2 = ['npm' => 197064516232, 'nama' => 'Muhammad Farhan', 'nilai' => 40];
$mhs3 = ['npm' => 197064516233, 'nama' => 'Sulton Ahmad', 'nilai' => 60];
$mhs4 = ['npm' => 197064516234, 'nama' => 'Khidir Karawita', 'nilai' => 80];
$mhs5 = ['npm' => 197064516235, 'nama' => 'Ismail Ahmad Kanabawi', 'nilai' => 70];
$mhs6 = ['npm' => 197064516236, 'nama' => 'Muhammad Sumbul', 'nilai' => 99];
$mhs7 = ['npm' => 197064516237, 'nama' => 'Khalid Khasmiri', 'nilai' => 30];
$mhs8 = ['npm' => 197064516238, 'nama' => 'Yaqub Qamaruddin Dibiaz', 'nilai' => 50];
$mhs9 = ['npm' => 197064516239, 'nama' => 'Shafa Kania', 'nilai' => 100];
$mhs10 = ['npm' => 197064516230, 'nama' => 'Kimiyy Bibop', 'nilai' => 20];

// buat array judul
$array_judul = ['No', 'Nomor Pokok Mahasiswa', 'Nama Mahasiswa', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

// buat array asosiatif
$mahasiswa = [$mhs1, $mhs2, $mhs3, $mhs4, $mhs5, $mhs6, $mhs7, $mhs8, $mhs9, $mhs10];

// buat fungsi agregat di array
$jml_mahasiswa = count($mahasiswa);
$jml_nilai = array_column($mahasiswa, 'nilai');
$total_nilai = array_sum($jml_nilai);
$max_nilai = max($jml_nilai);
$min_nilai = min($jml_nilai);
$rata2 = $total_nilai / $jml_mahasiswa;

// buat kolom keterangan
$keterangan = [

    'Jumlah Mahasiswa' => $jml_mahasiswa,
    'Nilai Tertinggi' => $max_nilai,
    'Nilai Terendah' => $min_nilai,
    'Rata-rata' => $rata2
];
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <style>
        .card {
            margin: 2rem;
        }

        .card-header {
            background-color: aliceblue;
            font-size: 1.3rem;
            font-weight: bold;
        }

        table {
            border: 1px solid black;
            width: 100%;
        }

        tr,
        th,
        td {
            border: 1px solid black;
        }

        th {
            text-align: center;
        }

        .center {
            text-align: center;
        }

        /* responsive */
        @media screen and (max-width: 400px) {
            .card-header {
                font-size: 0.5rem;
                font-weight: bold;
                text-align: center;
            }

            .scroll {
                display: block;
                width: 100%;
                overflow: scroll;
            }
        }

        @media screen and (min-width: 401px) and (max-width: 768px) {
            .card-header {
                font-size: 0.5rem;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="card-header" align="center"> RAPOR NILAI MAHASISWA KELAS II-B </div>
        <div class="card-body">
            <p class="card-text">
            <table class="scroll" cellpadding="10" cellspacing="0">
                <thead>
                    <tr bgcolor="aliceblue">
                        <?php foreach ($array_judul as $jdl) { ?>
                            <th><?= $jdl ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach ($mahasiswa as $m) {
                        //keterangan
                        $ket = ($m['nilai'] >= 60) ? 'Lulus' : 'Tidak Lulus';

                        // buat grade dengan IF Multi Kondisi
                        if ($m['nilai'] >= 80 && $m['nilai'] <= 100) $grade = 'A';
                        else if ($m['nilai'] >= 75 && $m['nilai'] < 80) $grade = 'B';
                        else if ($m['nilai'] >= 60 && $m['nilai'] < 75) $grade = 'C';
                        else if ($m['nilai'] >= 30 && $m['nilai'] < 60) $grade = 'D';
                        else if ($m['nilai'] >= 0 && $m['nilai'] < 30) $grade = 'E';
                        else $grade = '';

                        // buat predikat dengan switch case
                        switch ($grade) {
                            case 'A':
                                $predikat = 'Memuaskan';
                                break;
                            case 'B':
                                $predikat = 'Baik';
                                break;
                            case 'C':
                                $predikat = 'Cukup';
                                break;
                            case 'D':
                                $predikat = 'Kurang Baik';
                                break;
                            case 'E':
                                $predikat = 'Buruk';
                                break;
                            default:
                                $predikat = '';
                        }

                    ?>
                        <tr>
                            <th><?= $no ?></th><!-- looping -->
                            <td class="center"><?= $m['npm'] ?></td>
                            <td><?= $m['nama'] ?></td>
                            <td class="center"><?= $m['nilai'] ?></td>
                            <td><?= $ket ?></td>
                            <td class="center"><?= $grade ?></td>
                            <td><?= $predikat ?></td>
                        </tr>
                    <?php $no++; // looping
                    } ?>
                </tbody>
                <tfoot>
                    <?php foreach ($keterangan as $ktrgn => $hasil) { ?>
                        <tr>
                            <th colspan="6"><?= $ktrgn ?></th>
                            <th><?= $hasil ?></th>
                        </tr>
                    <?php } ?>

                </tfoot>
            </table>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>