<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Barang</title>
        <?php 
            require_once("../ui/header.php");
        ?>
        <script lang="javascript">
        function minimize() {
            if (document.getElementById("card-body-list").style) {
                document.getElementById("card-body-list").style.opacity = "0";
                document.getElementById("card-list").style.cursor = "pointer";
            }
        }

        function show() {
            if (document.getElementById("card-body-list").style) {
                document.getElementById("card-body-list").style.opacity = "100";
                document.getElementById("card-list").style.cursor = "pointer";
            }
        }
        </script>
    </head>

    <body>
        <?php 
            require_once("../ui/navbar.php");
        ?>
        <div class="col-md-12 col-lg-12">
            <div class="container-fluid bg-secondary py-1 p-1 rounded-2" style="min-height: 92.2dvh; height:100%;">
                <div class="container-fluid bg-light py-1 p-1 rounded-2" style="min-height: 92.2dvh; height:100%;">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 class="panel-title fw-lighter">Data Barang Dagang</h4>
                            <div class="breadcrumb d-flex align-items-end justify-content-end flex-wrap">
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="../dashboard/index.php?nama=<?=$_SESSION['nama_pengguna']?>"
                                        aria-current="page" class="text-decoration-none">Beranda</a>
                                </li>
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="../barang/index.php?nama=<?=$_SESSION['nama_pengguna']?>"
                                        aria-current="page" class="text-decoration-none">Data Barang</a>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap gap-1 justify-content-between align-items-start">
                        <?php 
                            if(isset($_GET["id_barang"])){
                                $id = $_GET["id_barang"];
                                $hasil = $Lihatbarang->Lihat($id);
                                foreach ($hasil as $isi) {
                        ?>
                        <div class="card col-md-3 col-lg-3">
                            <div class="card-header">
                                <h4 class="card-title fs-6">
                                    <i class="fa fa-briefcase fs-6"></i>
                                    Edit Data Barang
                                    <p class="text-end">
                                        <a role="button" class="btn" id="card-list" onclick="minimize()">
                                            <i class="fa fa-minus-circle"></i>
                                        </a>
                                        <a role="button" class="btn" id="card-list" onclick="show()">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </p>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-md table-responsive-lg">
                                    <form action="../ui/header.php?act=edit-barang" method="post">
                                        <input type="hidden" name="id_barang" value="<?=$isi["id_barang"]?>">
                                        <table class="table table-striped">
                                            <tr>
                                                <td>
                                                    <label class="fs-5 fw-lighter" for="namaInput">Nama Barang</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="nama" value="<?=$isi["nama_barang"]?>"
                                                        class="form-control" placeholder="masukkan nama barang"
                                                        id="namaInput" required aria-required="true">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-5 fw-lighter"><label for="kategori">Kategori</label></td>
                                                <td>
                                                    <select name="id_kategori" id="kategori"
                                                        class="form-control form-select" required>
                                                        <option value="">Pilih Kategori</option>
                                                        <?php 
                                                            $hasil = $Lihatkategori->kategori();
                                                            foreach ($hasil as $i) {
                                                        ?>
                                                        <option <?php if($isi["id_kategori"] == $i["id_kategori"]){?>
                                                            value="<?=$i["id_kategori"]?>" selected <?php } ?>>
                                                            <?=$i["nama_kategori"]?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-5 fw-lighter">
                                                    <label for="jual">Harga Jual</label>
                                                </td>
                                                <td>
                                                    <input type="number" name="jual" value="<?=$isi["harga_jual"]?>"
                                                        class="form-control" placeholder="masukkan harga jual" id="jual"
                                                        required aria-required="true">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-5 fw-lighter">Tanggal Input</td>
                                                <td>
                                                    <input type="text" name="tanggal" class="form-control"
                                                        value="<?php echo date('d/M/Y')?>" id="" required
                                                        aria-required="true" readonly>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="card-footer">
                                            <p class="text-end mx-0 mx-lg-0">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i>
                                                    <span>Simpan Barang</span>
                                                </button>
                                                <button type="reset" class="btn btn-danger">
                                                    <span>Cancel</span>
                                                </button>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                        ?>
                        <?php
                            }else{
                        ?>
                        <div class="card col-md-3 col-lg-3">
                            <div class="card-header">
                                <h4 class="card-title fs-6">
                                    <i class="fa fa-briefcase fs-6"></i>
                                    Input Data Barang
                                    <p class="text-end">
                                        <a role="button" class="btn" id="card-list" onclick="minimize()">
                                            <i class="fa fa-minus-circle"></i>
                                        </a>
                                        <a role="button" class="btn" id="card-list" onclick="show()">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </p>
                                </h4>
                            </div>
                            <div class="card-body" id="card-body-list">
                                <div class="table-responsive-md table-responsive-lg">
                                    <form action="../ui/header.php?act=tambah-barang" method="post">
                                        <table class="table table-striped">
                                            <tr>
                                                <td>
                                                    <label class="fs-5 fw-lighter" for="namaInput">Nama Barang</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="nama" class="form-control"
                                                        placeholder="masukkan nama barang" id="namaInput" required
                                                        aria-required="true">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-5 fw-lighter"><label for="kategori">Kategori</label></td>
                                                <td>
                                                    <select name="id_kategori" id="kategori"
                                                        class="form-control form-select" required>
                                                        <option value="">Pilih Kategori</option>
                                                        <?php 
                                                            $hasil = $Lihatkategori->kategori();
                                                            foreach ($hasil as $isi) {
                                                        ?>
                                                        <option value="<?=$isi["id_kategori"]?>">
                                                            <?=$isi["nama_kategori"]?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-5 fw-lighter">
                                                    <label for="jual">Harga Jual</label>
                                                </td>
                                                <td>
                                                    <input type="number" name="jual" class="form-control"
                                                        placeholder="masukkan harga jual" id="jual" required
                                                        aria-required="true">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-5 fw-lighter">Tanggal Input</td>
                                                <td>
                                                    <input type="text" name="tanggal" class="form-control"
                                                        value="<?php echo date('d/M/Y')?>" id="" required
                                                        aria-required="true" readonly>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="card-footer">
                                            <p class="text-end mx-0 mx-lg-0">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i>
                                                    <span>Simpan Barang</span>
                                                </button>
                                                <button type="reset" class="btn btn-danger">
                                                    <span>Cancel</span>
                                                </button>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        <div class="card col-md-8 col-lg-8">
                            <div class="card-header">
                                <h4 class="card-title fs-5 fw-lighter">Data Barang Penjualan</h4>
                                <div class="card-header-pills">
                                    <a href="../barang/index.php?nama=<?=$_SESSION["nama_pengguna"]?>" role="button"
                                        class="btn btn-primary">
                                        <i class="fa fa-refresh"></i>
                                        <span>Refresh Halaman</span>
                                    </a>
                                    <a href="../barang/index.php?nama=<?=$_SESSION["nama_pengguna"]?>&barang=yes"
                                        role="button" class="btn btn-info">
                                        <i class="fa fa-briefcase"></i>
                                        <span>Lihat Barang</span>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive-md table-responsive-lg">
                                <div class="card-body">
                                    <table class="table table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th class="fs-6 fw-lighter text-md-center"
                                                    style="width: 15px; min-width: 8%;">No
                                                </th>
                                                <th class="fs-6 fw-lighter text-md-center">Kategori</th>
                                                <th class="fs-6 fw-lighter text-md-center">Nama Barang</th>
                                                <th class="fs-6 fw-lighter text-md-center">Harga Jual</th>
                                                <th class="fs-6 fw-lighter text-md-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1;
                                                $hasil = $Lihatbarang->LihatsBarang();
                                                foreach ($hasil as $isi) {
                                            ?>
                                            <tr>
                                                <td class="text-md-center"><?php echo $no++; ?></td>
                                                <td class="text-md-center"><?php echo $isi["nama_kategori"] ?></td>
                                                <td class="text-md-center"><?php echo $isi["nama_barang"] ?></td>
                                                <td class="text-md-center">Rp.
                                                    <?php echo number_format($isi["harga_jual"]) ?></td>
                                                <td class="text-md-center">
                                                    <a href="../barang/index.php?nama=<?=$_SESSION["nama_pengguna"]?>&id_barang=<?=$isi["id_barang"]?>"
                                                        class="btn btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <?php 
                                                        if(!empty($_GET["barang"]=="yes")){
                                                    ?>
                                                    <a href="../ui/header.php?act=hapus-barang"
                                                        onclick="javascript:return confirm('Apakah anda ingin menghapus data ini ?')"
                                                        class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <?php
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $total += $isi['harga_jual'];
                                            $row = $configs->prepare("SELECT COUNT(id_barang) as no FROM tb_barang");
                                            $row->execute(); 
                                            $hasil = $row->fetch();
                                                }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <th colspan="2" style="background:gray; color:white;">Total</th>
                                            <th class="text-md-center"><?php echo number_format($hasil['no']); ?>
                                            </th>
                                            <th class="text-md-center">Rp. <?php echo number_format($total); ?></th>
                                            <th colspan="1" style="background:gray;"></th>
                                        </tfoot>
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