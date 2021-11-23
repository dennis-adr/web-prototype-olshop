<?php
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>alert("Anda Harus Login Terlebih Dahulu")</script>';
    echo '<script>window.location="index.html"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Store</title>
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
                <li><a href="data-pesanan.php">Data Pesanan</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--content-->
    <div class="content">
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang Admin <?php echo $_SESSION['a_global']->admin_name ?></h4>
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