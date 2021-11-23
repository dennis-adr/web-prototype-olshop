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
                       <th>Barcode</th>
                       <th>Nama Produk</th>
                       <th>Stok</th>
                       <th>Harga</th>
                       <th>Detail</th>
                       <th width="150px">Aksi</th>
                   </thead>
                   <tbody>
                       <?php
                            $produk = mysqli_query($connect, "SELECT * FROM db_product");//menampilkan dari yang terakhir diinput
                            while($row = mysqli_fetch_array($produk)){
                       ?>
                       <tr>
                           <td><?php echo $row['id'] ?></td>
                           <td><?php echo $row['barcode']?></td>
                           <td><?php echo $row['nama_item']?></td>
                           <td><?php echo $row['stok']?></td>
                           <td><?php echo $row['harga']?></td>
                           <td><?php echo $row['detail']?></td>
                           <td><a href="edit-product.php?id=<?php echo $row['id']?>">Edit</a> || <a href="hapus-product.php?id=<?php echo $row['id']?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')">Hapus</a></td>
                           <!--url id-->
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