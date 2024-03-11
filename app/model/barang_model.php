<?php 
namespace barang_model;

class model_barang {
    
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function Barang(){
        $sql = "SELECT tb_barang.*, tb_kategori.id_kategori, tb_kategori.nama_kategori from tb_barang 
        inner join tb_kategori on tb_barang.id_kategori = tb_kategori.id_kategori ORDER BY id_barang ASC";
        $row = $this->db->prepare($sql);
        $row->execute();
        return $row;
    }
    
    public function LihatBarang($id){
        $id = $_GET["id_barang"];
        $sql = "SELECT tb_barang.*, tb_kategori.id_kategori, tb_kategori.nama_kategori from tb_barang 
        inner join tb_kategori on tb_barang.id_kategori = tb_kategori.id_kategori WHERE id_barang = ?";
        $row = $this -> db -> prepare($sql);
        $row->execute(array($id));
        return $row;
    }

    public function TambahBarang($kategori, $nama, $harga, $tanggal){
        $table = "tb_barang";
        $kategori = $_POST["id_kategori"];
        $nama = $_POST["nama"];
        $harga = $_POST["jual"];
        $tanggal = $_POST["tanggal"];
        /* Create Database */
        $sql = "INSERT INTO $table (id_kategori,nama_barang,harga_jual,tanggal_input) VALUES(?,?,?,?)";
        $row = $this->db->prepare($sql);
        $row->execute(array($kategori,$nama,$harga,$tanggal));
        return $row;
    }
    
    public function EditBarang($kategori, $nama, $harga, $tanggal, $id){
        $table = "tb_barang";
        $id = $_POST["id_barang"];
        $kategori = $_POST["id_kategori"];
        $nama = $_POST["nama"];
        $harga = $_POST["jual"];
        $tanggal = $_POST["tanggal"];
        /* Create Database */
        $sql = "UPDATE $table SET id_kategori = ?, nama_barang = ?, harga_jual = ?, tanggal_input = ? WHERE id_barang = ?";
        $row = $this->db->prepare($sql);
        $row->execute(array($kategori,$nama,$harga,$tanggal,$id));
        return $row;
    }

    public function HapusBarang($id){
        $table = "tb_barang";
        $id = $_POST["id_barang"];
        $sql = "DELETE FROM $table WHERE id_barang = ?";
        $row = $this->db->prepare($sql);
        $row->execute(array($id));
        return $row;
    }
}

?>