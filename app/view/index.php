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
        </style>
    </head>

    <body>
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
                                    <a href="index.php" aria-current="page" class="nav-link hover">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a href="auth/index.php" aria-current="page" class="nav-link hover">Login</a>
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

                <section class="min-vh-100 mt-5 pt-5">
                    <div class="container py-5 p-5 bg-secondary">
                        <div class="container py-5 p-1 bg-body-tertiary rounded-1">
                            <div class="text-center shadow-sm">
                                <h4 class="fs-4 fw-lighter text-dark">Menu Princess Mozarella</h4>
                            </div>
                            <div class="d-flex justify-content-around align-items-start gap-1 flex-shrink-0">
                                <div class="card col-md-5 col-lg-5 bg-transparent border-0">
                                    <div class="card-header bg-transparent">
                                        <h4 class="card-title text-center fs-4">Menu Makanan</h4>
                                    </div>
                                    <div class="card-group bg-transparent">
                                        <div class="card-body bg-transparent">
                                            <div class="d-flex justify-content-between 
                                                align-items-start gap-1 flex-wrap">
                                                <div class="card-header-pills">
                                                    <h4 class="card-title fs-6 text-center">Varian Gurih</h4>
                                                    <ul>
                                                        <ol type="1">
                                                            <li>Corndog Ori Full Sosis</li>
                                                            <li>Corndog Ori Full Moza</li>
                                                            <li>Corndog Ori Sosis Moza</li>
                                                            <li>Hotang Full Sosis</li>
                                                            <li>Hotang Full Moza</li>
                                                            <li>Hotang Sosis Moza</li>
                                                        </ol>
                                                    </ul>
                                                </div>
                                                <div class="card-header-pills">
                                                    <h4 class="card-title fs-6 text-center">Varian Manis</h4>
                                                    <ul>
                                                        <ol type="1">
                                                            <li>Corndog Coklat</li>
                                                            <li>Corndog Taro</li>
                                                            <li>Corndog Tiramisu</li>
                                                            <li>Corndog Green Tea</li>
                                                            <li>Corndog Strawberry</li>
                                                            <li>Corndog Capucino</li>
                                                        </ol>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-5 col-lg-5 bg-transparent border-0">
                                    <div class="card-header bg-transparent">
                                        <h4 class="card-title text-center fs-4">Menu Minuman</h4>
                                    </div>
                                    <div class="card-group bg-transparent">
                                        <div class="card-body bg-transparent">
                                            <div class="d-flex justify-content-between 
                                                align-items-start gap-1 flex-wrap">
                                                <div class="card-header-pills">
                                                    <h4 class="card-title fs-6 text-center">Varian Dingin</h4>
                                                    <ul>
                                                        <ol type="1">
                                                            <li>Es Tea Jus</li>
                                                            <li>Es Nutrisari</li>
                                                            <li>Es Goodday</li>
                                                            <li>Es Beng Beng</li>
                                                            <li>Es Chocolatos</li>
                                                            <li>Es Milo</li>
                                                            <li>Es Ovaltine</li>
                                                            <li>Es Teh Tarik</li>
                                                            <li>Es Dancow</li>
                                                        </ol>
                                                    </ul>
                                                </div>
                                                <div class="card-header-pills">
                                                    <h4 class="card-title fs-6 text-center">Varian Panas</h4>
                                                    <ul>
                                                        <ol type="1">
                                                            <li>Kopi Hitam</li>
                                                            <li>Susu Jahe</li>
                                                            <li>Kopi ABC</li>
                                                            <li>Kopi Luwak</li>
                                                            <li>Goodday Mocacinno</li>
                                                            <li>Goodday Collins</li>
                                                            <li>Goodday caribbean nut</li>
                                                            <li>Goodday Vanilla late</li>
                                                            <li>Goodday Capucinno & Freeze</li>
                                                        </ol>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <footer class="my-3 py-3">
                                    <ul class="nav justify-content-center border-top border-dark">
                                        <p class="text-center mt-3 mt-lg-3">
                                            <a href="https://maps.app.goo.gl/rTKJrnLFmREQR1kdA" target="_blank" class="text-decoration-none 
                                                text-light hover btn btn-outline-dark">
                                                Alamat Princess Mozarella Cab. Cakung
                                            </a>
                                            <br>
                                            <small>klick diatas yang berada di dalam border</small>
                                        </p>
                                    </ul>
                                </footer>
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