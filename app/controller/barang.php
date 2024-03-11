<?php 
namespace barang;
use barang_model\model_barang;

class BarangView {
    
    protected $bdb;
    public function __construct($db){
        $this->bdb = new model_barang($db);
    }

    public function LihatsBarang(){
        $row = $this->bdb->Barang();
        $hasil = $row->fetchAll();
        return $hasil;
    }
    
    public function Lihat($id){
        $id = $_GET['id_barang'];
        $row = $this->bdb->LihatBarang($id);
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function Tambah(){
        $kategori = $_POST["id_kategori"];
        $nama = $_POST["nama"];
        $harga = $_POST["jual"];
        $tanggal = $_POST["tanggal"];
        $this->bdb->TambahBarang($kategori,$nama,$harga,$tanggal);
        header("location:../barang/index.php?nama=".$_SESSION["nama_pengguna"]);
    }
    
    public function Edit(){
        $id = $_POST["id_barang"];
        $kategori = $_POST["id_kategori"];
        $nama = $_POST["nama"];
        $harga = $_POST["jual"];
        $tanggal = $_POST["tanggal"];
        $this->bdb->EditBarang($kategori,$nama,$harga,$tanggal,$id);
        header("location:../barang/index.php?nama=".$_SESSION["nama_pengguna"]);
    }

    public function Hapus(){
        $id = $_POST['id_barang'];
        $this->bdb->HapusBarang($id);
        header("location:../barang/index.php?nama=".$_SESSION["nama_pengguna"]);        
    }
}

?>