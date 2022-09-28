<?php
if (isset($_POST["simpan"])) {
    $namapegawai = $_POST['namaPegawai'];
    $agama = $_POST['agama'];
    $jabatan = $_POST['jabatan'];
    $status = $_POST['status'];
    $jmlAnak = $_POST['jumlahAnak'];

    switch ($jabatan) {
        case 'manager':
            $gaji_pokok = 20000000;
            break;
        case 'asisten':
            $gaji_pokok = 15000000;
            break;
        case 'kabag':
            $gaji_pokok = 10000000;
            break;
        case 'staff':
            $gaji_pokok = 4000000;
            break;
        default:
            $gaji_pokok = 0;
    }
    $tunjangan_jabatan = (20 * $gaji_pokok) / 100;

    if ($status == "menikah" && $jmlAnak <= 2) {
        $tunjangan_keluarga = (5 * $gaji_pokok) / 100;
    } elseif ($status == "menikah" && $jmlAnak <= 5) {
        $tunjangan_keluarga = (10 * $gaji_pokok) / 100;
    } elseif ($status == "menikah" && $jmlAnak >= 5) {
        $tunjangan_keluarga = (15 * $gaji_pokok) / 100;
    } else {
        $tunjangan_keluarga = 0;
    }

    $gaji_kotor = $gaji_pokok + $tunjangan_jabatan + $tunjangan_keluarga;

    $zakat = $agama === "islam" && $gaji_kotor >= 6000000 ? $gaji_kotor * 2.5 / 100 : 0;

    $homePay = $gaji_kotor - $zakat;
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 1 PHP - Rizky Dharma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Form Data Pegawai</div>
                    <div class="card-body">
                        <form action=" " method="POST">
                            <div class="mb-3">
                                <label for="namaPegawai" class="form-label">Nama Pegawai</label>
                                <input type="text" class="form-control" id="namaPegawai" placeholder="Nama Pegawai" name="namaPegawai" required>
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select name="agama" id="agama" class="form-control" required>
                                    <option value="" selected disabled>Pilih Agama</option>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katholik">Katholik</option>
                                    <option value="konghucu">Konghucu</option>
                                    <option value="buddha">Buddha</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jabatan" id="manager" value="manager" required>
                                        <label class="form-check-label" for="manager">Manager</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jabatan" id="asisten" value="asisten" required>
                                        <label class="form-check-label" for="asisten">Asisten Manager</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jabatan" id="kabag" value="kabag" required>
                                        <label class="form-check-label" for="kabag">Kabag</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jabatan" id="staff" value="staff" required>
                                        <label class="form-check-label" for="staff">Staff</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status Anda</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="menikah" value="menikah" required>
                                        <label class="form-check-label" for="menikah">Menikah</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="belum" value="belum" required>
                                        <label class="form-check-label" for="belum">Belum Menikah</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jumlahAnak" class="form-label">Jumlah Anak</label>
                                <input type="number" class="form-control" id="jumlahAnak" placeholder="Jumlah Anak" name="jumlahAnak">
                            </div>
                            <div class="mb-3 text-center">
                                <button class="btn btn-primary" name="simpan">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modaldetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <span>Nama Pegawai:</span>
                            <span> <?= ucfirst($namapegawai) ?> </span>
                        </li>
                        <hr>
                        <li class="list-inline-item">
                            <span>Agama:</span>
                            <span> <?= ucfirst($agama) ?> </span>
                        </li>
                        <hr>
                        <li class="list-inline-item">
                            <span>Jabatan:</span>
                            <span> <?= ucfirst($jabatan) ?> </span>
                        </li>
                        <hr>
                        <li class="list-inline-item">
                            <span>Status:</span>
                            <span> <?= ucfirst($status) ?> </span>
                        </li>
                        <hr>
                        <li class="list-inline-item">
                            <span>Jumlah Anak:</span>
                            <span> <?= $jmlAnak ?> </span>
                        </li>
                        <hr>
                        <li class="list-inline-item">
                            <span>Gaji Pokok: Rp.</span>
                            <span> <?= number_format($gaji_pokok) ?> </span>
                        </li>
                        <hr>
                        <li class="list-inline-item">
                            <span>Tunjangan Jabatan: Rp.</span>
                            <span> <?= number_format($tunjangan_jabatan) ?> </span>
                        </li>
                        <hr>
                        <li class="list-inline-item">
                            <span>Tunjangan Keluarga: Rp.</span>
                            <span> <?= number_format($tunjangan_keluarga) ?> </span>
                        </li>
                        <hr>
                        <li class="list-inline-item">
                            <span>Gaji Kotor: Rp.</span>
                            <span> <?= number_format($gaji_kotor) ?> </span>
                        </li>
                        <hr>
                        <li class="list-inline-item">
                            <span>Zakat: Rp</span>
                            <span> <?= number_format($zakat) ?> </span>
                        </li>
                        <hr>
                        <li class="list-inline-item">
                            <span>Take Home Pay: Rp.</span>
                            <span> <?= number_format($homePay) ?> </span>
                        </li>
                        <hr>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <?php if ($_POST) : ?>
        <script>
            const modal = new bootstrap.Modal('#modaldetail', {});
            modal.show();
        </script>
    <?php endif; ?>
</body>

</html>