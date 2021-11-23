<?php 
    include "conn.php";

    if(isset($_GET['id'])){
        $delete = mysqli_query($connect,"DELETE FROM db_product WHERE id='".$_GET['id']."'");
        echo '<script>alert("Berhasil Menghapus Data!")</script>';
        echo '<script>window.location="produk.php"</script>';
    } else{
        echo 'Gagal!'.mysqli_error($connect);
    }
?>