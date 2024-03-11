<?php 
require_once("../../../database/koneksi.php");

if (!empty($_GET['cari_barang'])) {
    if(isset($_POST['keyword'])){
        $cari = strip_tags(trim($_POST['keyword']));
        if($cari == ''){   

        }else{
            $sql = "SELECT tb_barang.*, tb_kategori.id_kategori, tb_kategori.nama_kategori from tb_barang 
            inner join tb_kategori on tb_barang.id_kategori = tb_kategori.id_kategori where 
            nama_kategori like '%$cari%' or nama_barang like '%$cari%'";
            $row = $configs -> prepare($sql);
            $row->execute();
            $hasil = $row->fetchAll();
        }
?>
<div class="flex-shrink-1 g-0 gap-0" style="overflow-y: scroll;">
    <table class="table table-striped table-bordered" id="example1">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Harga Jual</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($hasil as $isi) {
            ?>
            <tr>
                <td><?php echo $isi["nama_barang"] ?></td>
                <td>Rp. <?php echo number_format($isi['harga_jual']).",-" ?></td>
                <td><?php echo $isi["nama_kategori"] ?></td>
                <td>
                    <a href="../ui/header.php?act=tambah-keranjang&id=<?=$isi['id_barang']?>"
                        class="btn btn-success btn-outline-light">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
    }
}
?>