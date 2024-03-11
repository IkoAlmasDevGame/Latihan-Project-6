<?php 
if($_SESSION['user_level'] == ""){
    header("location:../index.php");
    exit(0);
}
?>


<?php 
if($_SESSION['user_level'] == "Admin"){
?>
<div class="col-md-12 col-lg-12">
    <nav class="navbar bg-body-secondary navbar-expand-lg">
        <div class="container-fluid">
            <a href="../dashboard/index.php?nama=<?php echo $_SESSION['nama_pengguna']?>"
                class="navbar-brand navbar-text">
                Dashboard Latihan 6
            </a>
            <button type="button" class="navbar-toggler" data-bs-target="#NavbarToggler" data-bs-toggle="collapse"
                aria-label="Navbar Support Toggle" aria-expanded="false" aria-controls="NavbarToggler">
                <span class="navbar-toggler-icon"></span>
            </button>

            <aside class="collapse navbar-collapse" id="NavbarToggler">
                <ul class="navbar-nav ms-auto mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="../dashboard/index.php?nama=<?php echo $_SESSION['nama_pengguna']?>"
                            class="hover nav-link">
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../barang/index.php?nama=<?php echo $_SESSION['nama_pengguna']?>"
                            class="hover nav-link">
                            Data Barang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../kategori/index.php?nama=<?php echo $_SESSION['nama_pengguna']?>"
                            class="hover nav-link">
                            Kategori Barang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../payment/index.php?nama=<?php echo $_SESSION['nama_pengguna']?>"
                            class="hover nav-link">
                            Kasir Penjualan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../laporan/index.php?nama=<?php echo $_SESSION['nama_pengguna']?>"
                            class="hover nav-link" title="Laporan Penjualan">
                            Laporan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../histori/index.php?nama=<?php echo $_SESSION['nama_pengguna']?>"
                            class="hover nav-link" title="Histori Pelanggan">
                            Histori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../settings/index.php?nama=<?php echo $_SESSION['nama_pengguna']?>"
                            class="hover nav-link">
                            Account Pribadi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../ui/header.php?act=keluar"
                            onclick="javascript:return confirm('Apakah anda ingin log out dari website ini')"
                            class="hover nav-link">
                            Log out
                        </a>
                    </li>
                </ul>
                <div class="mx-auto pe-5 ms-5 mb-2 mb-lg-0">
                    <div class="dropdown"
                        onload="location.href='../dashboard/index.php?nama=<?=$_SESSION['nama_pengguna']?>'">
                        <a href="" role="button" class="dropdown-toggle text-decoration-none hover"
                            data-bs-toggle="dropdown">
                            Klick Here
                        </a>
                        <ul class="dropdown-menu bg-light">
                            <li>
                                <span class="dropdown-item text-black-50 fs-6">
                                    <?php echo "Email : ".$_SESSION['email_pengguna'] ?>
                                </span>
                            </li>
                            <li>
                                <span class="dropdown-item text-black-50 fs-6">
                                    <?php echo "Nama : ".$_SESSION['nama_pengguna'] ?>
                                </span>
                            </li>
                            <li>
                                <span class="dropdown-item text-black-50 fs-6">
                                    <?php echo "Jabatan : ".$_SESSION['user_level'] ?>
                                </span>
                            </li>
                            <li>
                                <span class="dropdown-item text-black-50 fs-6">
                                    <?php echo "Jam Masuk : ".$_SESSION['created_At'] ?>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </nav>
</div>
<?php
}else{
    header("location:../home.php");
    exit(0);
}
?>