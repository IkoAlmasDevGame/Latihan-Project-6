<?php 
if($_SESSION['user_level'] == ""){
    header("location:../index.php");
    exit(0);
}
?>

<?php 
if($_SESSION['user_level'] == "Member"){
?>
<div class="col-md-12 col-lg-12">
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <header class="container-fluid">
            <a href="../ui/header.php?page=beranda" class="navbar-brand">
                Dashboard Princess Mozarella
            </a>
            <button type="button" class="navbar-toggler" data-bs-target="#navbarToggle" data-bs-toggle="collapse"
                aria-expanded="false" aria-controls="navbarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarToggle">
                <ul class="navbar-nav mx-auto ms-auto mb-2 mb-lg-2">
                    <li class="nav-item">
                        <a href="../ui/header.php?page=beranda" aria-current="page" class="nav-link hover">
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../ui/header.php?page=beli" aria-current="page" class="nav-link hover">
                            Produk Beli
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../ui/header.php?page=histori" aria-current="page" class="nav-link hover">
                            Histori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../ui/header.php?page=laporan" aria-current="page" class="nav-link hover">
                            Laporan Histori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../ui/header.php?page=settings" aria-current="page" class="nav-link hover">
                            Settings Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../ui/header.php?page=keluar&nama=<?=$_SESSION['nama_pengguna']?>"
                            onclick="javascript:return confirm('Apakah anda ingin log out')" aria-current="page"
                            class="nav-link hover">
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
            </div>
        </header>
    </nav>
</div>
<?php
}else{
    header("location:../index.php");
    exit(0);
}
?>