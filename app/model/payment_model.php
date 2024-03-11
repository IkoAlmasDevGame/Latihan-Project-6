<?php 
namespace payment_model;

class model_payment {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function penjualan(){
        $sql = "SELECT tb_penjualan.* , tb_barang.id_barang, tb_barang.nama_barang, tb_barang.harga_jual from tb_penjualan 
        left join tb_barang on tb_barang.id_barang = tb_penjualan.id_barang ORDER BY id";
        $row = $this->db->prepare($sql);
        $row -> execute();
        return $row;
    }

    public function jual(){
        $date = array(date("m-Y"));
        $sql = "SELECT tb_nota_backup.* , tb_barang.id_barang, tb_barang.nama_barang, tb_barang.harga_jual from tb_nota_backup 
        left join tb_barang on tb_barang.id_barang = tb_nota_backup.id_barang where tb_nota_backup.periode = ? ORDER BY id ASC";
        $row = $this->db->prepare($sql);
        $row->execute($date);
        $hasil = $row->fetch();
        return $hasil;
    }

    public function periode_jual($periode){
        $sql = "SELECT tb_nota_backup.* , tb_barang.id_barang, tb_barang.nama_barang, tb_barang.harga_jual from tb_nota_backup 
        left join tb_barang on tb_barang.id_barang = tb_nota_backup.id_barang where tb_nota_backup.periode = ? ORDER BY id ASC";
        $row = $this->db->prepare($sql);
        $row->execute(array($periode));
        $hasil = $row->fetch();
        return $hasil;
    }

    public function hari_jual($hari){
        $ex = explode('-', $hari);
        $monthNum  = $ex[1];
        $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
        if ($ex[2] > 9) {
            $tgl = $ex[2];
        } else {
            $tgl1 = explode('0', $ex[2]);
            $tgl = $tgl1[1];
        }
        $cek = $tgl.' '.$monthName.' '.$ex[0];
        $param = "%{$cek}%";
        $sql = "SELECT tb_nota_backup.* , tb_barang.id_barang, tb_barang.nama_barang, tb_barang.harga_jual from tb_nota_backup
        left join tb_barang on tb_barang.id_barang = tb_nota_backup.id_barang WHERE tb_nota_backup.tanggal_input LIKE ? ORDER BY id ASC";
        $row = $this->db->prepare($sql);
        $row->execute(array($param));
        $hasil = $row->fetch();
        return $hasil;
    }

    /* Total Belanja */
    public function jumlah(){
        $sql = "SELECT SUM(total) as bayar FROM tb_penjualan";
        $row = $this -> db -> prepare($sql);
        $row -> execute();
        return $row;
    } 

    public function jumlah_nota(){
        $sql = "SELECT SUM(total) as bayar FROM tb_nota";
        $row = $this -> db -> prepare($sql);
        $row -> execute();
        return $row;
    }

    public function total_nota(){
        $sql = "SELECT SUM(total) as total FROM tb_nota_backup";
        $row = $this -> db -> prepare($sql);
        $row -> execute();
        return $row;
    }

    /* Tambah Keranjan */
    public function keranjang(){
        $id = $_GET['id_barang'];
        $sqbarang = "SELECT * FROM tb_barang WHERE id_barang = ?";
        $rwbarang = $this->db->prepapre($sqbarang);
        $rwbarang -> execute(array($id));
        $row = $rwbarang->fetch();

        if($row['harga_jual'] > 0){
            $jumlah = 1;
            $harga = $row['harga_jual'];
            $total = $row['harga_jual'] * $jumlah;
            $tgl = date("j F Y, G:i");

            $table = "tb_penjualan";
            $this -> db -> prepare("INSERT INTO $table (id,id_barang,harga_jual,jumlah,total,tanggal_input)
             VALUES ('','$id','$harga','$jumlah','$total,','$tgl')")->execute();
            $this -> db -> prepare("INSERT INTO tb_penjualan_backup (id,id_barang,harga_jual,jumlah,total,tanggal_input)
             VALUES ('','$id','$harga','$jumlah','$total,','$tgl')")->execute();
            header("location:../payment/index.php?nota=yes&nama=".$_SESSION['nama_pengguna']);        
        }else{
            echo '<script>alert("Stok Barang Anda Telah Habis !");"</script>';
            header("location:../payment/index.php#keranjang&nama=".$_SESSION['nama_pengguna']);
        }
    }

    public function EditKeranjang($jumlah,$id,$id_barang){
        $table = "tb_barang";
        $id = $_POST['id'];
        $id_barang = $_POST['id_barang'];
        $jumlah = $_POST['jumlah'];
        /* Pengeditan data barang */
        $sqbarang = "SELECT * FROM $table WHERE id_barang = ?";
        $rwbarang = $this->db->prepare($sqbarang);
        $rwbarang->execute(array($id_barang));
        $hasil = $rwbarang->fetch();

        if($jumlah > 1){
            $jual = $hasil['harga_jual'];
            $total = $jual * $jumlah;
            $data[] = $id;
            $data[] = $jumlah;
            $data[] = $total;
            
            $sqUpdate = "UPDATE tb_penjualan SET jumlah=?, total=? WHERE id=?";
            $sqUpdate2 = "UPDATE tb_penjualan_backup SET jumlah=?, total=? WHERE id=?";
            $rwUpdate = $this->db->prepare($sqUpdate);
            $rwUpdate->execute($data);
            $rwUpdate2 = $this->db->prepare($sqUpdate2);
            $rwUpdate2->execute($data);
            header("location:../payment/index.php?nota=yes&nama=".$_SESSION['nama_pengguna']);
        }else{
            echo '<script>alert("Stok Barang Anda Telah Habis !");"</script>';
            header("location:../payment/index.php#keranjang&nama=".$_SESSION['nama_pengguna']);
        }
    }

    public function HapusResetKeranjang(){
        $sqKeranjang = "DELETE FROM tb_penjualan";
        $rwKeranjang = $this->db->prepare($sqKeranjang);
        header("location:../payment/index.php?nama=".$_SESSION['nama_pengguna']);
        return $rwKeranjang;
    }
    
    public function HapusBelanjaan(){
        $sqBelanja = "DELETE FROM tb_nota";
        $rwBelanja = $this->db->prepare($sqBelanja);
        header("location:location:../payment/index.php?nama=".$_SESSION['nama_pengguna']);
        return $rwBelanja;
    }

    public function HapusItemKeranjang(){
        $brg = $_GET['brg'];
        $id = $_GET['id'];
        $sqBarang = "SELECT * from tb_barang where id_barang = ?";
        $rwBarang = $this->db->prepapre($sqBarang);
        $rwBarang->execute(array($brg));

        $sqPenjualan = "DELETE FROM tb_penjualan WHERE id = ?";
        $rwPenjualan = $this->db->prepare($sqPenjualan);
        $rwPenjualan->execute(array($id));
        header("location:location:../payment/index.php?nama=".$_SESSION['nama_pengguna']);
    }
}

?>