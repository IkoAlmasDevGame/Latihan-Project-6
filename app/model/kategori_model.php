<?php 
namespace kategori_model;

class model_kategori {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function LihatFullKategori(){
        $table = "tb_kategori";
        $row = $this->db->prepare("SELECT * FROM $table ORDER BY id_kategori ASC");
        $row->execute();
        return $row;
    }

    public function SimpanKategori($kategori){
        $table = "tb_kategori";
        $kategori = $_POST["nama_kategori"];
        $sql = "INSERT INTO $table (nama_kategori) VALUEs (?)";
        $row = $this->db->prepare($sql);
        $row->execute(array($kategori));
    }

    public function LihatKategori($id){
        $table = "tb_kategori";
        $id = $_GET["id_kategori"];
        $row = $this->db->prepare("SELECT * FROM $table WHERE id_kategori = ?");
        $row->execute(array($id));
        return $row;
    }

    public function EditanKategori($kategori,$id_kategori){
        $table = "tb_kategori";
        $as = array($id_kategori => $_POST["id"], $kategori => $_POST["nama_kategori"]);
        $row = $this -> db -> prepare("UPDATE $table SET nama_kategori = ? WHERE id_kategori=?");
        $row->execute($as);
    }

    public function HapusKategori($id_kategori){
        $table = "tb_kategori";
        $a = array($id_kategori => $_POST['id_kategori']);
        $row = $this->db->prepare("DELETE FROM $table WHERE id_kategori = ?");
        $row->execute($a);
    }

}

?>