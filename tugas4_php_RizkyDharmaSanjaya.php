<?php
class Pegawai
{
    public $nip;
    public $nama;
    public $jabatan;
    public $status;
    public $agama;
    const PT = "PT. Berkat David";
    static $no = 1;


    public function __construct($nip, $nama, $jabatan, $status, $agama)
    {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->status = $status;
        $this->agama = $agama;
    }
    public function setGapok()
    {
        switch ($this->jabatan) {
            case 'Manager':
                $gapok = 15000000;
                break;
            case 'Asisten Manager':
                $gapok = 10000000;
                break;
            case 'Kabag':
                $gapok = 7000000;
                break;
            case 'Staff':
                $gapok = 4000000;
                break;

            default:
                break;
        }
        return $gapok;
    }
    public function setTunjab()
    {
        $tunjab = $this->setGapok() * 20 / 100;
        return $tunjab;
    }
    public function setTunkel()
    {
        $tunkel = ($this->status == "Menikah") ? $this->setGapok() * 10 / 100 : 0;
        return $tunkel;
    }
    public function setGator()
    {
        $gator = $this->setGapok() + $this->setTunjab() + $this->setTunkel();
        return $gator;
    }
    public function setZakat()
    {
        $zakat = ($this->agama == "Islam" && $this->setGator() >= 6000000) ? $this->setGapok() * 2.5 / 100 : 0;
        return $zakat;
    }
    public function setGaber()
    {
        $gaber = $this->setGator() - $this->setZakat();
        return $gaber;
    }

    public function setCetak()
    {
        echo
        '
        <div class="col mb-5">
                <div class="card" style="width:19rem;">
                    <div class="card-body">
                        No: ' . self::$no++ . ' <br>
                        NIP: ' . $this->nip . ' <br>
                        Nama: ' . $this->nama . ' <br>
                        Agama: ' . $this->agama . ' <br>
                        Jabatan: ' . $this->jabatan . ' <br>
                        Status: ' . $this->status . ' <br>
                        
                        Gaji Pokok: Rp.' . number_format($this->setGapok()) . ' <br>
                        Tunjangan Jabatan: ' . number_format($this->setTunjab()) . ' <br>
                        Tunjangan Keluarga: ' . number_format($this->setTunkel()) . ' <br>
                        Zakat Profesi: ' . number_format($this->setZakat()) . ' <br>
                        Gaji Kotor: ' . number_format($this->setGator()) . ' <br>
                        Gaji Bersih: ' . number_format($this->setGaber()) . ' <br>
                    </div>
                </div>
            </div>
        

        ';
    }
}

/*
Buatlah Class Pegawai dengan member class:

variabel : nip, nama, jabatan, agama, status
konstruktor (nip, nama, jabatan, agama, status)
fungsi:
setGajiPokok (gunakan switch case : manager=>15jt, asmen=>10jt, kabag=>7jt, staff=>4jt)
setTunjab = 20% dari Gaji Pokok
setTunkel= 10% dari Gaji Pokok untuk sudah menikah (ternary)
setZakatProfesi= 2,5% dari GajiPokok untuk muslim dan Gaji Kotor minimal 6jt
mencetak => nip, nama, jabatan, agama, status, Gaji Pokok, Tunj Jab, Tunkel, Zakat, Gaji Bersih 


Buatlah objPegawai dengan data:

5 instance object pegawai
cetaklah semua struktur gaji pegawai
*/