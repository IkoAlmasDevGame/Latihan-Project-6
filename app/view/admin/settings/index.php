<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Pribadi</title>
        <?php 
            require_once("../ui/header.php");
            $sql = "SELECT * FROM tb_user WHERE nama = '$_SESSION[nama_pengguna]'";
            $row = $configs->prepare($sql);
            $row->execute();
            $hasil = $row->fetchAll();
        ?>
    </head>

    <body>
        <?php 
            require_once("../ui/navbar.php");
        ?>
        <div class="col-md-12 col-lg-12">
            <div class="container-md container-lg py-3 p-3 mt-3 mt-lg-3 bg-secondary">
                <div class="container-fluid p-3 bg-light">
                    <div class="container-fluid d-flex justify-content-center
                     align-items-start rounded-1">
                        <div class="card col-md-6 col-lg-6">
                            <div class="card-header">
                                <h4 class="card-title fw-normal">DATA PRIBADI ANDA</h4>
                            </div>
                            <div class="table-responsive-md table-responsive-lg">
                                <form action="../ui/header.php?act=act-edit-user" method="post">
                                    <div class="card-body">
                                        <?php 
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <input type="hidden" name="id_user" value="<?=$isi['id_user']?>">
                                        <table class="table table-striped">
                                            <tr>
                                                <td class="fs-4 input-group-addon">Email</td>
                                                <td>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="email" name="email" class="form-control"
                                                                value="<?=$isi['email']?>" required>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-4 input-group-addon">Username</td>
                                                <td>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="text" name="username" class="form-control"
                                                                value="<?=$isi['username']?>" required>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-4 input-group-addon">Password</td>
                                                <td>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="password" name="password"
                                                                value="<?=$isi['password']?>" class="form-control"
                                                                placeholder="masukkan kata sandi anda ..." required
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-4 input-group-addon">Nama</td>
                                                <td>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="text" readonly aria-readonly="true" name="nama"
                                                                class="form-control" value="<?=$isi['nama']?>" required>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr hidden>
                                                <td class="fs-4 input-group-addon">Created At</td>
                                                <td>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="text" readonly aria-readonly="true"
                                                                name="created_At" class="form-control"
                                                                value="<?=$isi['created_At']?>" required>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr hidden>
                                                <td class="fs-4 input-group-addon">Jabatan</td>
                                                <td>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="text" readonly aria-readonly="true"
                                                                name="user_level" class="form-control"
                                                                value="<?=$isi['user_level']?>" required>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="card-footer">
                                        <p class="text-end mx-2">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i>
                                                <span>Simpan</span>
                                            </button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            require_once("../ui/footer.php");
        ?>