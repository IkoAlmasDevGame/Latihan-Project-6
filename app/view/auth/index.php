<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Princess Mozarella</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <style type="text/css">
        body {
            font-family: sans-serif;
            font-weight: normal;
        }

        .dropdown-menu li {
            position: relative;
        }

        .dropdown-menu .dropdown-submenu {
            display: none;
            position: absolute;
            left: 100%;
            top: -7px;
        }

        .dropdown-menu .dropdown-submenu-left {
            right: 100%;
            left: auto;
        }

        .dropdown-menu>li:hover>.dropdown-submenu {
            display: block;
        }

        .mx-x {
            margin-left: 130px;
            margin-right: 130px;
        }

        .px-x {
            margin-left: 130px;
            margin-right: 130px;
        }

        #beranda {
            scroll-behavior: smooth;
            scroll-timeline: --squareTimeline vertical;
        }
        </style>
        <?php 
            require_once("../../database/koneksi.php");
            if(isset($_GET['act'])){
                if($_GET['act'] == "signin"){
                    session_start();
                    if(isset($_POST['submit'])){
                    $userMail = htmlspecialchars($_POST['userMail']);
                    $password = htmlspecialchars($_POST['password']);
                    $date = Date("Y-m-d H:i:s a");
                    password_verify($password, PASSWORD_DEFAULT);
                                
                    if($userMail == "" || $password == ""){
                        header("location:index.php");
                        exit(0);
                    }

                    $table = "tb_pengguna";
                    $sql = "SELECT tb_pengguna.*, tb_profile.nama FROM $table inner join tb_profile on
                    tb_pengguna.nama = tb_profile.nama WHERE email = '$userMail' and password = '$password' || username = '$userMail' and password = '$password'";
                    $db = $configs->prepare($sql);
                    $db->execute();
                    $cek = $db->rowCount();

                    if($cek > 0){
                        $response = array($userMail,$password, Date("Y-m-d H:i:s a"));
                        $response[$table] = array($userMail,$password, Date("Y-m-d H:i:s a"));
                        if($row = $db->fetch()){
                            if($row['user_level'] == "Member"){
                                $_SESSION['id'] = $row['id_pengguna'];
                                $_SESSION['nama_pengguna'] = $row['nama'];
                                $_SESSION['email_pengguna'] = $row['email'];
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['user_level'] = "Member";
                                $_SESSION['created_At'] = $date;
                                header("location:../dashboard/index.php?nama=".$_SESSION['nama_pengguna']);
                            }
                            $_SESSION['status'] = true;
                            array_push($response[$table], $row);
                            /* Created_At Timestamp */ 
                            $created_At = $configs->prepare("UPDATE $table SET created_At = '$date' WHERE email = '$userMail'");
                            $created_At->execute(); 
                            $created_At2 = $configs->prepare("UPDATE $table SET created_At = '$date' WHERE username = '$userMail'");
                            $created_At2->execute(); 
                            exit(0);
                        }
                    }else{
                        $_SESSION['status'] = false;
                        header("location:index.php");
                        exit(0);
                    }
                }
                }else if($_GET['act'] == "register"){
                    if(isset($_POST['submits'])){
                        $email = htmlspecialchars($_POST['email']);
                        $username = htmlspecialchars($_POST['username']);
                        $password = htmlspecialchars($_POST['password']);
                        $nama = htmlspecialchars($_POST['nama']);
                        $user_level = htmlspecialchars($_POST['user_level']) ? $_POST["user_level"] : "Member";
                        $alamat = htmlspecialchars($_POST['alamat']);
                        $tanggal = htmlspecialchars($_POST['tanggal_lahir']);
                        $telepon = htmlspecialchars($_POST['telepon']);

                        /* Database */ 
                        $table = "tb_pengguna";
                        $table2 = "tb_profile";
                        /* Data Input Created */
                        $a = array($username,$email,$password,$nama,$user_level);
                        $b = array($nama,$alamat,$tanggal,$telepon);
                        $sql_a = $configs->prepare("INSERT INTO $table (username,email,password,nama,user_level) VALUES (?,?,?,?,?)")->execute($a);
                        $sql_b = $configs->prepare("INSERT INTO $table2 (nama,alamat,tanggal_lahir,telepon) VALUES (?,?,?,?)")->execute($b);
                        header("location:index.php");
                    }
                }
            }
        ?>
    </head>

    <body id="beranda">
        <div class="app">
            <div class="layout">
                <nav class="navbar navbar-expand-lg bg-body-secondary">
                    <header class="container-fluid">
                        <a href="index.php" class="navbar-brand">Princess Mozarella</a>
                        <button type="button" class='navbar-toggler' data-bs-toggle='collapse'
                            data-bs-target='#navbarSupported' aria-controls="navbarSupported">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <aside class="collapse navbar-collapse" id="navbarSupported">
                            <ul class="navbar-nav ms-auto mx-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a href="../index.php" aria-current="page" class="nav-link hover">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php" aria-current="page" class="nav-link hover">Login</a>
                                </li>
                            </ul>
                        </aside>
                        <div class="ps-1 ms-1 mx-x px-x">
                            <div class="dropdown">
                                <a role="button" href=""
                                    class="text-decoration-none dropdown-toggle dropdown-toggle-split"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Jam Operational
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            Jam Masuk
                                            <span>&raquo;</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-submenu">
                                            <ol type="1">
                                                <li class="fs-6">
                                                    Senin
                                                    <br>
                                                    16:00 s/d 22:00
                                                </li>
                                                <li class="fs-6">
                                                    Selasa
                                                    <br>
                                                    16:00 s/d 22:00
                                                </li>
                                                <li class="fs-6">
                                                    Rabu
                                                    <br>
                                                    16:00 s/d 22:00
                                                </li>
                                                <li class="fs-6">
                                                    Kamis
                                                    <br>
                                                    16:00 s/d 22:00
                                                </li>
                                                <li class="fs-6">
                                                    Jumat
                                                    <br>
                                                    16:00 s/d 22:00
                                                </li>
                                                <li class="fs-6">
                                                    Sabtu
                                                    <br>
                                                    16:00 s/d 22:00
                                                </li>
                                                <li class="fs-6">
                                                    Minggu
                                                    <br>
                                                    16:00 s/d 22:00
                                                </li>
                                            </ol>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </nav>

                <section class="min-vh-100">
                    <div class="py-5 p-5 container bg-secondary mt-5 pt-5 rounded-1">
                        <div class="py-5 p-5 container bg-light rounded-1">
                            <div class="d-flex justify-content-around align-items-start flex-wrap gap-1">
                                <div class="col-md-5 col-lg-5">
                                    <div class="card">
                                        <div class="card-header bg-transparent">
                                            <h4 class="card-title fs-5 text-center">Login Member</h4>
                                        </div>
                                        <form action="index.php?act=signin" method="post">
                                            <div class="card-body">
                                                <div class="row align-items-center form-group mb-2 mb-lg-0">
                                                    <label for="userMail" class="input-group-addon">Email /
                                                        Username</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="text" name="userMail" id="userMail"
                                                                class="form-control"
                                                                placeholder="masukkan username atau email anda ..."
                                                                required aria-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2"></div>
                                                    <label for="passMail" class="input-group-addon">Kata
                                                        Sandi</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="password" name="password" id="passMail"
                                                                class="form-control"
                                                                placeholder="masukkan kata sandi anda ..." required
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p class="card-footer container">
                                                    <button type="submit" name="submit" class="btn btn-primary hover">
                                                        <i class="fa fa-sign-in-alt"></i>
                                                        <span>Login</span>
                                                    </button>
                                                    <button type="reset" class="btn btn-danger hover">
                                                        <i class="fa fa-eraser"></i>
                                                        <span>Hapus</span>
                                                    </button>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5">
                                    <div class="card">
                                        <div class="card-header bg-transparent">
                                            <h4 class="card-title fs-5 text-center">Register Member</h4>
                                        </div>
                                        <form action="index.php?act=register" method="post">
                                            <div class="card-body">
                                                <div class="row align-items-center form-group mb-2 mb-lg-0">
                                                    <label for="inputEmail" class="input-group-addon">Email</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="email" name="email" id="inputEmail"
                                                                class="form-control"
                                                                placeholder="masukkan email baru anda ..." required
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2"></div>
                                                    <label for="userInput" class="input-group-addon">username</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="text" name="username" id="userInput"
                                                                class="form-control"
                                                                placeholder="masukkan uesrname baru anda ..." required
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2"></div>
                                                    <label for="passwdInput" class="input-group-addon">Password</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="password" name="password" id="passwdInput"
                                                                class="form-control"
                                                                placeholder="masukkan password baru anda ..." required
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2"></div>
                                                    <label for="namaInput" class="input-group-addon">nama
                                                        panggilan</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="text" name="nama" id="namaInput"
                                                                class="form-control"
                                                                placeholder="masukkan nama panggilan anda ..." required
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2"></div>
                                                    <label for="alamatInput" class="input-group-addon">Alamat</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="text" name="alamat" id="alamatInput"
                                                                class="form-control"
                                                                placeholder="masukkan Alamat rumah anda ..." required
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2"></div>
                                                    <label for="TLInput" class="input-group-addon">Tanggal
                                                        Lahir</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="date" name="tanggal_lahir" id="TLInput"
                                                                class="form-control"
                                                                placeholder="masukkan tanggal lahir ..." required
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2"></div>
                                                    <label for="TeleponInput" class="input-group-addon">No
                                                        Telepon</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="number" name="telepon" id="TeleponInput"
                                                                class="form-control"
                                                                placeholder="masukkan no telepon anda ..." required
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p class="card-footer container">
                                                    <button type="submit" name="submits" class="btn btn-primary hover">
                                                        <i class="fa fa-save"></i>
                                                        <span>Simpan Data</span>
                                                    </button>
                                                    <button type="reset" class="btn btn-danger hover">
                                                        <i class="fa fa-eraser"></i>
                                                        <span>Hapus</span>
                                                    </button>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="container">
                    <footer class="py-3 my-4">
                        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                            <li class="nav-item"><a href="#beranda" class="nav-link px-2 text-muted">Home</a></li>
                        </ul>
                        <p class="text-center text-muted" id="time"></p>
                        <p class="text-center text-muted">&copy; Dashboard Latihan 6</p>
                    </footer>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script type="text/javascript">
        function startTime() {
            var day = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday ", "Friday", "Saturday"];
            var today = new Date();
            var tahun = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('time').innerHTML =
                day[today.getDay()] + ", " + h + ":" + m + ":" + s + ", " + tahun;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
        </script>
    </body>

</html>