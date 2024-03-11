<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kasir Penjualan</title>
        <?php 
        require_once("../ui/header.php");
    ?>
    </head>

    <body>
        <?php 
        require_once("../ui/navbar.php");
    ?>
        <div class="col-md-12 col-lg-12">
            <div class="container-fluid py-2 p-2 bg-info">
                <div class="container-fluid py-2 bg-light rounded-1">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 class="panel-title">
                                <i class="fa fa-shopping-cart"></i>
                                KASIR PENJUALAN
                            </h4>
                            <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="../dashboard/index.php?nama=<?=$_SESSION['nama_pengguna']?>"
                                        aria-current="page" class="text-decoration-none text-primary">
                                        Beranda
                                    </a>
                                </li>
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="index.php?nama=<?=$_SESSION['nama_pengguna']?>" aria-current="page"
                                        class="text-decoration-none text-primary">
                                        Kasir Penjualan
                                    </a>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="border border-top mb-1"></div>
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-1">
                        <div class="card col-sm-4 col-md-4" style="min-width: 33.50%; width:310px;">
                            <div class="card-header">
                                <h5><i class="fa fa-search"></i> Cari Barang</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-md table-responsive-lg">
                                    <input type="text" id="cari" class="form-control" name="cari" required
                                        placeholder="Masukan : Merk Barang / Nama Kategori / Nama Barang  [ENTER]">
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-7 col-lg-7" style="min-width: 66.25%; width:500px;">
                            <div class="card-header">
                                <h5 class="card-title"><i class="fa fa-list"></i> Hasil Pencarian</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-md table-responsive-lg">
                                    <div id="hasil_cari"></div>
                                    <div id="tunggu"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 border boder-top mt-2"></div>
                    <div class="card col-md-12 col-lg-12">
                        <div class="card-header">
                            <h5><i class="fa fa-shopping-cart"></i> KASIR PENJUALAN
                                <div class="col-md-offset-0 pt-3 pt-lg-3">
                                    <a class="btn btn-danger"
                                        onclick="javascript:return confirm('Apakah anda ingin reset keranjang ?');"
                                        href="../ui/header.php?act=hapus-keranjang">
                                        <b>RESET KERANJANG</b></a>
                                </div>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-md table-responsive-lg">
                                <div class="table-responsive-md table-responsive-lg" id="keranjang">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td><b>Tanggal</b></td>
                                            <td><input type="text" readonly="readonly" class="form-control"
                                                    value="<?php echo date("j F Y, G:i"); ?>" name="tanggal_input"></td>
                                        </tr>
                                    </table>
                                    <table class="table table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th style="width:5%; min-width:5%;">No</th>
                                                <th>Nama Barang</th>
                                                <th>Harga Jual</th>
                                                <th>Jumlah Beli</th>
                                                <th>Total Belanja</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $hasil_penjualan  = $Lihatbayar->lihat();
                                            $total_bayar = 0;
                                            $no = 1;
                                            foreach ($hasil_penjualan  as $isi) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $isi["nama_barang"]; ?></td>
                                                <td><?php echo "Rp. ".number_format($isi["harga_jual"]); ?></td>
                                                <form action="../ui/header.php?act=edit-item" method="post">
                                                    <td>
                                                        <input type="number" name="jumlah" class="form-control"
                                                            value="<?=$isi["jumlah"]?>" required>
                                                        <input type="hidden" name="id" required
                                                            value="<?php echo $isi['id']; ?>" class="form-control">
                                                        <input type="hidden" name="id_barang" required
                                                            value="<?php echo $isi['id_barang']; ?>"
                                                            class="form-control">
                                                    </td>
                                                    <td><?php echo "Rp. ".number_format($isi["total"]); ?></td>
                                                    <td>
                                                        <button type="submit" class="btn btn-warning">Update</button>
                                                </form>
                                                <a href="../ui/header.php?act=hapus-item&id=<?=$isi['id']?>&brg=<?=$isi['id_barang']?>"
                                                    class="btn btn-danger"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        $no++;
                                        $total_bayar += $isi['total'];
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                    <br>
                                    <?php $hasil = $Lihatbayar->jml(); ?>
                                    <div id="kasirnya">
                                        <table class="table table-striped">
                                            <?php 
                                        if(!empty($_GET["nota"]=="yes")){
                                            $total = $_POST['total'];
                                            $bayar = $_POST['bayar'];
                                            $discount = $_POST['discount'];
                                            if(!empty($bayar)){
                                                $hitung = 0;
                                                $totDiscount = ($total * $discount)/100;
                                                $hitungDiscount = $bayar - $totDiscount;
                                                if($bayar >= $total){
                                                    $id_barang = $_POST['id_barang'];
                                                    $harga_jual = $_POST['harga_jual'];
                                                    $jumlah = $_POST['jumlah'];
                                                    $total = $_POST['total1'];
                                                    $tanggal_input = $_POST['tanggal_input'];
                                                    $periode = $_POST['periode'];
                                                    $jumlah_beli = count($id_barang);
                                                    for ($x=0; $x < $jumlah_beli; $x++) { 
                                                        $rwBarang = "SELECT * FROM tb_barang WHERE id_barang = ?";
                                                        $sqBarang = $configs->prepare($rwBarang);
                                                        $sqBarang->execute(array($id_barang[$x]));
                                                        /**/
                                                        $d = array($id_barang[$x],$harga_jual[$x],$jumlah[$x],$total[$x],$tanggal_input[$x],$periode[$x]);
                                                        $sqNota = "INSERT INTO tb_nota (id_barang,harga_jual,jumlah,total,tanggal_input,periode)
                                                         VALUES (?,?,?,?,?,?)";
                                                        $rwNota = $configs->prepare($sqNota);
                                                        $rwNota->execute($d);
                                                        $sqNotaBackUp = "INSERT INTO tb_nota_backup (id_barang,harga_jual,jumlah,total,tanggal_input,periode)
                                                         VALUES(?,?,?,?,?,?)";
                                                        $rwNotaBackUp = $configs->prepare($sqNotaBackUp);
                                                        $rwNotaBackUp->execute($d);
                                                    }
                                                    echo '<script>alert("Belanjaan Berhasil Di Bayar !");</script>';
                                                }else{
                                                    echo '<script>alert("Uang Kurang ! Rp.'.$hitung.'");</script>';
                                                }
                                            }
                                        }
                                        ?>
                                            <form action="../payment/index.php?nota=yes#kasirnya" method="post">
                                                <tbody>
                                                    <?php 
                                                    foreach ($hasil_penjualan as $isi) {
                                                ?>
                                                    <input type="hidden" name="id_barang[]"
                                                        value="<?php echo $isi['id_barang']; ?>">
                                                    <input type="hidden" name="harga_jual[]"
                                                        value="<?php echo $isi['harga_jual']; ?>">
                                                    <input type="hidden" name="jumlah[]"
                                                        value="<?php echo $isi['jumlah']; ?>">
                                                    <input type="hidden" name="total1[]"
                                                        value="<?php echo $isi['total']; ?>">
                                                    <input type="hidden" name="tanggal_input[]"
                                                        value="<?php echo $isi['tanggal_input']; ?>">
                                                    <input type="hidden" name="periode[]"
                                                        value="<?php echo date('m-Y'); ?>">
                                                    <?php
                                                $no++;
                                                    }
                                                ?>
                                                    <tr>
                                                        <td>Total Semua</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="total"
                                                                value="<?= $total_bayar; ?>">
                                                        </td>
                                                        <td>Bayar</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="bayar"
                                                                value="<?= $bayar;?>" required>
                                                        </td>
                                                        <td>Discount</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="discount"
                                                                value="<?= $discount;?>" required>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-success" type="submit"><i
                                                                    class="fa fa-shopping-cart"></i>
                                                                Bayar
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                            if(!empty($_GET["nota"]=="yes")){
                                                        ?>
                                                            <a href="../ui/header.php?act=hapus-belanja"
                                                                class="btn btn-danger"
                                                                onclick="javascript:return confirm('Apakah anda ingin reset belanjaan ?');">
                                                                Reset Nota</a>
                                                            <?php
                                                            }
                                                        ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </form>
                                            <tr>
                                                <td>Kembali</td>
                                                <td>
                                                    <input type="text" class="form-control" name="kembali"
                                                        value="<?php echo $hitungDiscount;?>">
                                                </td>
                                                <td colspan="5"></td>
                                                <td>
                                                    <a href="../payment/print.php?bayar=<?php echo $bayar;?>&discount=<?php echo $discount;?>&kembali=<?php echo $hitungDiscount;?>"
                                                        target="_blank">
                                                        <button class="btn btn-secondary">
                                                            <i class="fa fa-print"></i> Print Untuk Bukti Pembayaran
                                                        </button></a>
                                                </td>
                                            </tr>
                                        </table>
                                        <br />
                                        <br />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        require_once("../ui/footer.php");
    ?>