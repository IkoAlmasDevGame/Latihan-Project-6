<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo "Dashboard Beli"; ?></title>
        <?php 
            require_once("../ui/header.php");
        ?>
    </head>

    <body>
        <?php 
            require_once("../ui/navbar.php");
        ?>
        <div class="col-md-12 col-lg-12">
            <div class="container-fluid py-5 p-5 bg-primary rounded-0">
                <div class="container-fluid py-5 p-1 bg-light rounded-1">
                    <div class="d-flex justify-content-center align-items-start flex-wrap gap-5">
                        <div class="card col-md-3 col-lg-3">
                            <div class="card-header">
                                <h4 class="card-title fs-5 text-center fw-lighter">
                                    Barang Dagangan Princess Mozarella
                                </h4>
                            </div>
                            <div class="table-responsive-md table-responsive-lg" id="keranjang">
                                <table class="table table-striped">
                                    <tr>
                                        <td><label for="" class="fs-5">Tanggal : </label></td>
                                        <td><input type="text" readonly="readonly" class="form-control"
                                                value="<?php echo date("j F Y, G:i"); ?>" name="tanggal_input"></td>
                                    </tr>
                                </table>
                                <div class="card-body">
                                    <?php
                                        $sql = "SELECT tb_barang.*, tb_kategori.id_kategori, tb_kategori.nama_kategori from tb_barang 
                                        inner join tb_kategori on tb_barang.id_kategori = tb_kategori.id_kategori ORDER BY id_barang ASC";
                                        $row = $configs->prepare($sql);
                                        $row->execute();
                                        $hasil = $row->fetchAll();
                                        foreach ($hasil as $isi) {
                                    ?>
                                    <div id="data">
                                        <?php 
                                        
                                        ?>
                                    </div>
                                    <form action="../payment/index.php#data" method="post">
                                        <div class="card-footer">
                                            <div class="card-group">
                                                <input type="hidden" name="id_barang" value="<?=$isi['id_barang']?>">
                                                <span class="card-text fs-5 fw-light">
                                                    Nama Barang : <?php echo $isi['nama_barang'] ?>
                                                    <input type="hidden" name="nama_barang"
                                                        value="<?php echo $isi['nama_barang'] ?>">
                                                </span>
                                            </div>
                                            <span class="fs-5 card-text fw-light">
                                                Kategori : <?=$isi['nama_kategori']?>
                                                <input type="hidden" name="kategori" value="<?=$isi['nama_kategori']?>">
                                            </span>
                                            <br>
                                            <span class="fs-5 card-text fw-light">
                                                Harga : Rp. <?php echo number_format($isi['harga_jual']) ?>
                                                <input type="hidden" name="harga_jual" value="<?=$isi['harga_jual']?>">
                                            </span>
                                            <br>
                                            <span class="fs-5 card-text fw-light">
                                                Periode : <?php echo date('F Y') ?>
                                                <input type="hidden" name="periode" value="<?php echo date('m-Y') ?>">
                                            </span>
                                        </div>
                                        <div class="card-footer">
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary mx-2">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <div class="dropdown">
                                                    <a href="" role="button"
                                                        class="dropdown-toggle text-decoration-none"
                                                        aria-controls="dropdown-toggle" data-bs-toggle="dropdown">
                                                        Review
                                                    </a>
                                                    <ul class="dropdown-menu bg-light">
                                                        <li class="dropdown-item bg-light text-dark">
                                                            <span class="card-text fs-6">
                                                                Nama Barang : <?php echo $isi['nama_barang'] ?>
                                                            </span>
                                                            <br>
                                                            <span class="card-text fs-6">
                                                                Kategori : <?php echo $isi['nama_kategori'] ?>
                                                            </span>
                                                            <br>
                                                            <span class="card-text fs-6">
                                                                Harga : <?php echo $isi['harga_jual'] ?>
                                                            </span>
                                                            <br>
                                                            <span class="card-text fs-6" hidden>
                                                                tanggal : <?php echo $isi['tanggal_input'] ?>
                                                            </span>
                                                            <span class="card-text fs-6">
                                                                Jumlah Beli : 1
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-8 col-lg-8">
                            <div class="card-header">
                                <h4 class="card-title fs-5 text-center fw-lighter">
                                    LIST PEMBELIAN PENGGUNA
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-md table-responsive-lg">
                                    <table class="table table-striped">

                                    </table>
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