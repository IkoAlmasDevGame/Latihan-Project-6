<?php 
namespace payment;
use payment_model\model_payment;

class PaymentView {
    protected $pdb;
    public function __construct($db){
        $this->pdb = new model_payment($db);
    }

    public function lihat(){
        $row = $this->pdb->penjualan();
        $hasil = $row -> fetchAll();
        return $hasil;
    }

    public function HapusKeranjang(){
        $rwKeranjang = $this->pdb->HapusResetKeranjang();
        return $rwKeranjang;
    }

    public function HapusBelanja(){
        $rwBelanja = $this->pdb->HapusBelanjaan();
        return $rwBelanja;
    }

    public function HapusItem(){
        $hapus = $this->pdb->HapusItemKeranjang();
        return $hapus;
    }

    public function Edit(){
        $id = $_POST['id'];
        $id_barang = $_POST['id_barang'];
        $jumlah = $_POST['jumlah'];
        $this->pdb->EditKeranjang($jumlah,$id,$id_barang);
    }

    public function TambahItem(){
        $item = $this->pdb->keranjang();
        return $item;
    }

    public function Tnota(){
        $row = $this->pdb->total_nota();
        $hasil = $row->fetch();
        return $hasil;
    }

    public function Jnota(){
        $row = $this->pdb->jumlah_nota();
        $hasil = $row->fetch();
        return $hasil;
    }

    public function jml(){
        $row = $this->pdb->jumlah();
        $hasil = $row->fetch();
        return $hasil;
    }
}

?>