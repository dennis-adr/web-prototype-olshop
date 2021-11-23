<?php
include 'conn.php';
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
            </ul>
        </div>
    </header>
    <!--content-->
    <div class="content">
        <div class="container">
            <h3>Data Produk</h3>
            <div class="box">
                <table border="1" class="table" cellspacing="0">
                    <thead>
                        <th>ID</th>
                        <th>Barcode</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Detail</th>
                    </thead>
                    <tbody>
                        <?php
                        $produk = mysqli_query($connect, "SELECT * FROM db_product"); //menampilkan dari yang terakhir diinput
                        while ($row = mysqli_fetch_array($produk)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['barcode'] ?></td>
                                <td><?php echo $row['nama_item'] ?></td>
                                <td><?php echo $row['stok'] ?></td>
                                <td><?php echo $row['harga'] ?></td>
                                <td><?php echo $row['detail'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <form>
                    <br><input type="button" value="Kembali" onclick="history.back()" class="btn">
                </form>
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