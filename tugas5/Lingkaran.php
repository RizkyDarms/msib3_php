<?php
require_once 'Index2D.php';

class Lingkaran extends Index2D
{

    public $jari2;

    public function __construct($jari2)
    {
        $this->jari2 = $jari2;
    }

    public function nameBidang()
    {
        echo "Lingkaran";
    }

    public function luasBidang()
    {
        $luasLingkaran = 3.14 * $this->jari2 * $this->jari2;
        return $luasLingkaran;
    }

    public function kelBidang()
    {
        $kelLingkaran = 2 * 3.14 * $this->jari2;
        return $kelLingkaran;
    }

    public function keterangan()
    {
        echo 'Jari-Jari = ' . $this->jari2 . ' Cm';
    }
}
