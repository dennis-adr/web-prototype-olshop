<?php
session_start();
include 'conn.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>alert("Anda Harus Login Terlebih Dahulu")</script>';
    echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk | Store</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <!--header-->
    <header>
        <div class="container">
            <h2><a href="dashboard.php">Clothing Store</a></h2>
            <ul>
                <!--daftar item-->
                <li><a href="dashboard.php">Dashboard</a></li>
                <!--list dari daftar item-->
                <li><a href="profil.php">Profil</a></li>
                <li><a href="produk.php">Data Produk</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--content-->
    <div class="content">
        <div class="container">
            <h3>Tambah Data Produk</h3>
            <div class="box">
                <form action="" method="POST">
                    Barcode<input type="text" name="barcode" placeholder="Barcode Produk" class="input" required>
                    Nama Produk<input type="text" name="nama" placeholder="Nama Produk" class="input" required>
                    Stok<input type="text" name="stok" placeholder="Stok Produk" class="input" required>
                    Harga<input type="text" name="harga" placeholder="Harga Produk" class="input" required>
                    Detail<input type="text" name="detail" placeholder="Detail Produk" class="input" required>
                    <input type="submit" name="submit" value="Tambah Data" class="btn">
                </form>
                <?php
                    if (isset($_POST['submit'])) {
                        $barcode= $_POST['barcode'];
                        $nama = $_POST['nama'];
                        $stok = $_POST['stok'];
                        $harga = $_POST['harga'];
                        $detail = $_POST['detail'];
                        
                        $insert= mysqli_query($connect,"INSERT INTO db_product (barcode,nama_item,stok,harga,detail) VALUES ('$barcode','$nama','$stok','$harga','$detail')");
                        if($insert){
                            echo '<script>alert("Berhasil Menambah Data!")</script>';
                            echo '<script>window.location="produk.php"</script>';
                        }
                        else{
                            echo 'Gagal!'.mysqli_error($connect);
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <!--footer-->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2021-Clothing Store.</small>
        </div>
    </footer>
</body>

</html>