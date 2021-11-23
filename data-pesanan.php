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
    <title>Produk | Store</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <!--header-->
    <header>
        <div class="container">
            <h2><a href="index.html">Clothing Store</a></h2>
            <ul>
                <!--daftar item-->
                <li><a href="dashboard.php">Dashboard</a></li>
                <!--list dari daftar item-->
                <li><a href="profil.php">Profil</a></li>
                <li><a href="produk.php">Data Produk</a></li>
                <li><a href="data-pesanan.php">Data Pesanan</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--content-->
    <div class="content">
        <div class="container">
            <h3>Data Produk</h3>
            <div class="box">
            <a href="tambah-product.php">Tambah Produk</a><br>
               <table border="1" class="table" cellspacing="0">
                   <thead>
                       <th>ID</th>
                       <th>Nama Pelanggan</th>
                       <th>Nomor Telepon</th>
                       <th style="width: 800px;">Alamat</th>
                       <th>Pesanan</th>
                       <th>Total harga</th>
                   </thead>
                   <tbody>
                       <?php
                            $pembeli = mysqli_query($connect, "SELECT * FROM db_pembeli");//menampilkan dari yang terakhir diinput
                            while($row = mysqli_fetch_array($pembeli)){
                       ?>
                       <tr>
                           <td><?php echo $row['id'] ?></td>
                           <td><?php echo $row['nama']?></td>
                           <td><?php echo $row['no_telp']?></td>
                           <td><?php echo $row['alamat']?></td>
                           <td><?php echo $row['pesanan']?></td>
                           <td><?php echo $row['total']?></td>
                        </tr>
                       <?php } ?>
                   </tbody>
               </table>
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