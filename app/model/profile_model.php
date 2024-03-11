<?php 
namespace profile_model;

class model_profile {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function EditPengguna(){
        /*Table Start*/
        $table = "tb_user";
        /*Table Finish*/  
        $id_user = $_POST['id_user'];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $nama = $_POST["nama"];
        $user_level = $_POST["user_level"];
        $this->db->prepare("UPDATE $table SET username=?, email=?, password=?, nama=?, 
        user_level=? WHERE id_user=?")->execute(array($username,$email,$password,$nama,$user_level,$id_user));
        header("location:../dashboard/index.php?nama=".$_SESSION['nama_pengguna']);
    }

    public function EditAccount(){
        /*Table Start*/
        $table = "tb_pengguna";
        $table2 = "tb_profile";
        /*Table Finish*/  
        $id_pengguna = $_POST['id_pengguna'];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $user_level = "konsumen";
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $tanggal = $_POST["tanggal_lahir"];
        $telepon = $_POST["telepon"];
        $this->db->prepare("UPDATE $table SET username=?, email=?, password=?, 
        nama=?, user_level=? WHERE id_pengguna=?")->execute(array($username,$email,$password,$nama,$user_level,$id_pengguna));
        $this->db->prepare("UPDATE $table2 SET nama=?, alamat=?, tanggal_lahir=?,
        telepon=? WHERE id_pengguna=?")->execute(array($nama,$alamat,$tanggal,$telepon,$id_pengguna));
        header("location:../dashboard/index.php?nama=".$_SESSION['nama_pengguna']);
    }
}

?>