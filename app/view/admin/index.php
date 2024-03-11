<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Admin</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <style type="text/css">
        body {
            font-family: sans-serif;
        }
        </style>
        <?php 
        require_once("../../database/koneksi.php");
            if(!empty($_GET["act"]=="signin")){
                session_start();
                if(isset($_POST['submited'])){
                    $userMail = htmlspecialchars($_POST['userMail']);
                    $password = htmlspecialchars($_POST['password']);
                    $date = Date("Y-m-d H:i:s a");
                    password_verify($password, PASSWORD_DEFAULT);
                                
                    if($userMail == "" || $password == ""){
                        header("location:index.php");
                        exit(0);
                    }

                    $table = "tb_user";
                    $sql = "SELECT * FROM $table WHERE email = '$userMail' and password = '$password' || username = '$userMail' and password = '$password'";
                    $db = $configs->prepare($sql);
                    $db->execute();
                    $cek = $db->rowCount();

                    if($cek > 0){
                        $response = array($userMail,$password, Date("Y-m-d H:i:s a"));
                        $response[$table] = array($userMail,$password, Date("Y-m-d H:i:s a"));
                        if($row = $db->fetch()){
                            if($row['user_level'] == "Admin"){
                                $_SESSION['id'] = $row['id_user'];
                                $_SESSION['nama_pengguna'] = $row['nama'];
                                $_SESSION['email_pengguna'] = $row['email'];
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['user_level'] = "Admin";
                                $_SESSION['created_At'] = $date;
                                header("location:dashboard/index.php?nama=".$_SESSION['nama_pengguna']);
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
            }
        ?>
    </head>

    <body id="beranda" onload="startTime()">
        <div class="app">
            <div class="layoutApp">
                <nav class="navbar navbar-expand-lg bg-body-secondary">
                    <div class="container-fluid">
                        <a href="index.php" class="navbar-brand navbar-text">
                            Dashboard Admin 6
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                            data-bs-target="#NavbarToggler" aria-controls="NavbarToggler" aria-label="NavbarToggler"
                            aria-expanded="false">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <aside class="collapse navbar-collapse" id="NavbarToggler">
                            <ul class="navbar-nav ms-auto mx-5 mb-lg-0 mb-2">
                                <li class="nav-item">
                                    <a href="" aria-current="page" class="nav-link hover">
                                        Beranda
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" role="button" aria-controls="modalSignIn" aria-expanded="false"
                                        data-bs-target="#modalSignIn" data-bs-toggle="modal" aria-current="page"
                                        class="nav-link hover">
                                        <span>Log In</span>
                                    </a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </nav>

                <div class="modal fade" id="modalSignIn" tabindex="-1">
                    <div class="container-fluid pt-5 mt-5">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-5">Dashboard Admin Login</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="index.php?act=signin" method="post">
                                        <div class="row align-items-center form-group mb-2 mb-lg-0">
                                            <label for="userMail" class="input-group-addon">Email / Username</label>
                                            <div class="input-group-text form-control">
                                                <div class="input-group">
                                                    <input type="text" name="userMail" id="userMail"
                                                        class="form-control"
                                                        placeholder="masukkan username atau email anda ..." required
                                                        aria-required="true">
                                                </div>
                                            </div>
                                            <div class="mb-2"></div>
                                            <label for="passMail" class="input-group-addon">Kata Sandi</label>
                                            <div class="input-group-text form-control">
                                                <div class="input-group">
                                                    <input type="password" name="password" id="passMail"
                                                        class="form-control" placeholder="masukkan kata sandi anda ..."
                                                        required aria-required="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2"></div>
                                        <div class="card-footer">
                                            <p class="text-center mx-2">
                                                <button type="submit" name="submited" class="btn btn-primary">
                                                    <span>Login</span>
                                                </button>
                                                <button type="button" data-bs-dismiss="modal"
                                                    class="btn btn-default btn-outline-dark">
                                                    <span>Cancel</span>
                                                </button>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <section style="min-height: 100vh; height:100%;">
                    <div class="container-fluid p-5 py-5 bg-light">
                        <div class="container-md p-5 px-auto rounded-1 bg-secondary">
                            <h4 class="display-4 hover text-light">DASHBOARD LATIHAN 6</h4>
                            <div class="row justify-content-start align-items-start">
                                <p class="fs-5 fw-lighter text-light">
                                    Latihan Dashboard 6 ini tentang Penjualan.
                                </p>
                                <p class="text-end fs-6">
                                    <a href="https://github.com/IkoAlmasDevGame/"
                                        class="text-decoration-none text-primary" target="_blank">
                                        <span class="fab fa-github fs-1 text-start hover text-light">
                                            <br>
                                            <small class="fs-6 fw-normal text-black-50 hover">By Developer
                                                IkoAlmas</small>
                                        </span>
                                    </a>
                                </p>
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