<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kategori</title>
        <?php 
        require_once("../ui/header.php");
    ?>
    </head>

    <body>
        <?php 
        require_once("../ui/navbar.php")
    ?>
        <div class="col-md-12 col-lg-12">
            <div class="container-fluid py-1 bg-secondary" style="min-height: 92.2dvh; height:100%;">
                <div class="container-fluid py-1 rounded-1 bg-light" style="min-height: 92.2dvh; height:100%;">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="fs-5 fw-normal panel-title">
                                <i class="fa fa-cube"></i>
                                <span>Data Kategori</span>
                            </div>
                            <div class="breadcumb">
                                <div class="d-flex justify-content-end align-items-end flex-wrap">
                                    <li class="breadcrumb breadcrumb-item">
                                        <a href="../dashboard/index.php"
                                            class="text-decoration-none text-primary">Beranda</a>
                                    </li>
                                    <li class="breadcrumb breadcrumb-item">
                                        <a href="../kategori/index.php?nama=<?=$_SESSION['nama_pengguna']?>"
                                            class="text-decoration-none text-primary">Kategori</a>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start align-items-start gap-5 flex-wrap">
                        <?php 
                            if(isset($_GET["id_kategori"])){
                                $id = $_GET["id_kategori"];
                                $hasil = $Lihatkategori->KategoriLihat($id);
                            foreach ($hasil as $isi) {
                        ?>
                        <div class="card col-md-4 col-lg-4">
                            <div class="card-header">
                                <div class="card-header-form">
                                    <div class="card-header-form">
                                        <div class="fs-5 fw-normal card-title">
                                            <i class="fa fa-cube"></i>
                                            <span>Data Kategori</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="../ui/header.php?act=edit-kategori" method="post">
                                        <input type="hidden" name="id" id="id_kategori" class="form-control" required
                                            aria-required="required" value="<?=$isi["id_kategori"]?>">
                                        <label for="nama_kategori">Nama Kategori</label>
                                        <input type="text" name="kategori" id="nama_kategori"
                                            value="<?=$isi["nama_kategori"]?>" class="form-control" required
                                            aria-required="required" placeholder="masukkan nama kategori">
                                        <div class="modal-footer mt-2">
                                            <button type="submit" class="btn btn-primary mx-1">
                                                <i class="fa fa-save"></i>
                                                <span>Simpan</span>
                                            </button>
                                            <button type="reset" class="btn btn-danger mx-1">
                                                <i class="fa fa-eraser"></i>
                                                <span>Hapus</span>
                                            </button>
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
                        <div class="card col-md-4 col-lg-4">
                            <div class="card-header">
                                <div class="card-header-form">
                                    <div class="fs-5 fw-normal card-title">
                                        <i class="fa fa-cube"></i>
                                        <span>Data Kategori</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="../ui/header.php?act=simpan-kategori" method="post">
                                        <label for="nama_kategori">Nama Kategori</label>
                                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
                                            required aria-required="required" placeholder="masukkan nama kategori">
                                        <div class="modal-footer mt-2">
                                            <button type="submit" class="btn btn-primary mx-1">
                                                <i class="fa fa-save"></i>
                                                <span>Simpan</span>
                                            </button>
                                            <button type="reset" class="btn btn-danger mx-1">
                                                <i class="fa fa-eraser"></i>
                                                <span>Hapus</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        <div class="card col-md-7 col-lg-7">
                            <div class="card-header">
                                <div class="card-header-form">
                                    <div class="fs-5 fw-normal card-title">
                                        <i class="fa fa-cube"></i>
                                        <span>Data Kategori</span>
                                    </div>
                                    <a href="../kategori/index.php?nama=<?=$_SESSION['nama_pengguna']?>"
                                        class="btn btn-warning">
                                        <i class="fa fa-refresh"></i>
                                        <span>Refresh</span>
                                    </a>
                                    <a href="../kategori/index.php?nama=<?=$_SESSION['nama_pengguna']?>&kategori=yes"
                                        class="btn btn-info">
                                        <i class="fa fa-cube"></i>
                                        <span>Kategori</span>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive-md table-responsive-lg">
                                        <table class="table table-md table-striped" id="example1">
                                            <thead>
                                                <tr>
                                                    <th class="fs-6 fw-normal text-md-center">No</th>
                                                    <th class="fs-6 fw-normal text-md-center">Nama Kategori</th>
                                                    <th class="fs-6 fw-normal text-md-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $hasil = $Lihatkategori->Kategori();
                                                    $no = 1;
                                                    foreach ($hasil as $isi) {
                                                ?>
                                                <tr>
                                                    <td class="fs-6 text-md-center"><?php echo $no; ?></td>
                                                    <td class="fs-6 text-md-center"><?php echo $isi["nama_kategori"]; ?>
                                                    </td>
                                                    <td class="fs-6 text-md-center">
                                                        <a href="../kategori/index.php?nama=<?=$_SESSION['nama_pengguna']?>&id_kategori=<?=$isi["id_kategori"]?>"
                                                            class="btn btn-warning">
                                                            <i class="fa fa-edit"></i>
                                                            <span>Edit Kategori</span>
                                                        </a>
                                                        <?php 
                                                            if(!empty($_GET["kategori"]=="yes")){
                                                        ?>
                                                        <a href="../ui/header.php?act=hapus-kategori&id_kategori=<?=$isi["id_kategori"]?>"
                                                            class="btn btn-danger"
                                                            onclick="javascript:return confirm('Apakah anda ingin menghapus data ini ?');">
                                                            <i class="fa fa-trash"></i>
                                                            <span>Hapus Kategori</span>
                                                        </a>
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                $no++;
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        require_once("../ui/footer.php")
    ?>