<?php 
if(isset($_SESSION['status'])){
    if(isset($_SESSION['id'])){
        if(isset($_SESSION['username'])){
            if(isset($_SESSION['email_pengguna'])){
                if(isset($_SESSION['nama_pengguna'])){
                    if(isset($_SESSION['user_level'])){
                        if(isset($_SESSION['created_At'])){
        
                        }
                    }                                
                }            
            }        
        }            
    }
}else{
    echo "<script lang='javascript'>
    window.setTimeout(() => {
        alert('Maaf anda gagal masuk ke halaman utama ...'),
        window.location.href='../index.php'
    }, 3000);
    </script>
    ";
    exit(0);
}
?>