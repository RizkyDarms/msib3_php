<?php
require_once 'Index2D.php';

class Segitiga extends Index2D
{
    public $alas;
    public $tinggi;
    public $sisiMiring;

    public function __construct($alas, $tinggi, $sisiMiring)
    {
        $this->alas = $alas;
        $this->tinggi = $tinggi;
        $this->sisi = $sisiMiring;
    }

    public function nameBidang()
    {
        echo "Segitiga";
    }
    public function luasBidang()
    {
        $luas = 0.5 * $this->alas * $this->tinggi;
        return $luas;
    }

    public function  kelBidang()
    {
        $keliling = $this->sisi + $this->sisi + $this->sisi;
        return $keliling;
    }

    public function keterangan()
    {
        echo ' Alas = ' . $this->alas . ' cm <br/>  Tinggi = ' . $this->tinggi . ' cm <br/>  Sisi Miring =' . $this->sisi . ' cm';
    }
}
