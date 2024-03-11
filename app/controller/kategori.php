<?php 
namespace kategori;
use kategori_model\model_kategori;

class KategoriView {
    protected $kdb;
    public function __construct($db){
        $this->kdb = new model_kategori($db);
    }

    public function kategori(){
        $row = $this->kdb->LihatFullKategori();
        $hasil = $row->fetchAll();
        return $hasil;
    }
    
    public function KategoriLihat($id){
        $id = $_GET["id_kategori"];
        $row = $this->kdb->LihatKategori($id);
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function Simpan(){
        $kategori = $_POST["nama_kategori"];
        $this->kdb->SimpanKategori($kategori);
        header("location:../kategori/index.php?nama=".$_SESSION['nama_pengguna']);
    }

    public function Edit(){
        $id_kategori = $_POST["id"];
        $kategori = $_POST["nama_kategori"];     
        $this->kdb->EditanKategori($kategori,$id_kategori);
        header("location:../kategori/index.php?nama=".$_SESSION['nama_pengguna']);
    }

    public function Hapus(){
        $id_kategori = $_POST["id_kategori"];
        $this->kdb->HapusKategori($id_kategori);
        header("location:../kategori/index.php?nama=".$_SESSION['nama_pengguna']);

    }
}

?>