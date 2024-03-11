<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Admin</title>
        <?php
            use barang\BarangView;
            use kategori\KategoriView;
            use payment\PaymentView;
            use profile\ProfileView;
            /*Model*/ 
            use payment_model\model_payment;
            use profile_model\model_profile;

            session_start();
            require_once("../../../config/auth.php");
            require_once("../../../config/config.php");
            require_once("../../../database/koneksi.php");
            /* Controller View */ 
            require_once("../../../controller/barang.php");
            require_once("../../../controller/kategori.php");
            require_once("../../../controller/payment.php");
            require_once("../../../controller/profile.php");
            require_once("../../../controller/laporan.php");
            require_once("../../../controller/histori.php");
            /* Model Controller*/ 
            require_once("../../../model/barang_model.php");
            require_once("../../../model/kategori_model.php");
            require_once("../../../model/payment_model.php");
            require_once("../../../model/profile_model.php");
            require_once("../../../model/laporan_model.php");
            require_once("../../../model/histori_model.php");

            $Lihatbarang = new BarangView($configs);
            $Lihatkategori = new KategoriView($configs);
            $Lihatbayar = new PaymentView($configs);
            $LihatProfile = new ProfileView($configs);
            /*Model*/
            $modelbayar = new model_payment($configs); 
            $modelprofile = new model_profile($configs); 

            if(isset($_GET['aksi'])){
                $aksi = $_GET['aksi'];
                if($aksi == "keluar"){
                    if(isset($_SESSION['status'])){
                        unset($_SESSION['status']);
                        session_unset();
                        session_destroy();
                        $_SESSION = array();
                    }
                    header("location:../index.php");
                    exit(0);
                }
            }

            if(!isset($_GET['act'])){

            }else{
                switch ($_GET["act"]) {
                    case 'tambah-barang':
                        $Lihatbarang->Tambah();
                        break;
                        
                    case 'edit-barang':
                        $Lihatbarang->Edit();
                        break;

                    case 'hapus-barang':
                        $Lihatbarang->Hapus();
                        break;

                    /*Kategori*/
                    case 'simpan-kategori':
                        $Lihatkategori->Simpan();
                        break;
                    case 'edit-kategori':
                        $Lihatkategori->Edit();
                        break;
                    case 'hapus-kategori':
                        $Lihatkategori->Hapus();
                        break;
                    
                    /* Pembayaran Kasir */
                    case 'edit-item':
                        $Lihatbayar->Edit();
                        break;
                    case 'tambah-keranjang':
                        $Lihatbayar->TambahItem();
                        break;
                    case 'hapus-keranjang':
                        $Lihatbayar->HapusKeranjang();
                        break;
                    case 'hapus-belanja':
                        $Lihatbayar->HapusBelanja();
                        break;
                    case 'hapus-item':
                        $Lihatbayar->HapusItem()();
                        break;
                    
                    /* Histori */
                    
                    /* Profile */
                    case 'act-edit-user':
                        $modelprofile->EditPengguna();
                        break;

                    /* Log out */
                    case 'keluar':
                        $date = Date("Y-m-d H:i:s a");
                        $row = $configs->prepare("UPDATE tb_user SET created_At = ? WHERE email = ?");
                        $row->execute(array($date, $_SESSION['email_pengguna']));
                        $row2 = $configs->prepare("UPDATE tb_user SET created_At = ? WHERE username = ?");
                        $row2->execute(array($date, $_SESSION['username']));
                        header("location:../ui/header.php?aksi=keluar");
                        break;
                    
                    default:
                        require_once("../dashboard/index.php");
                        break;
                }
            }
        ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    </head>

    <body>