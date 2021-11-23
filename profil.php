<?php
session_start();
include 'conn.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>alert("Anda Harus Login Terlebih Dahulu")</script>';
    echo '<script>window.location="login.php"</script>';
}
//menampilkan data admin
$query=mysqli_query($connect, "SELECT * FROM db_admin WHERE id = '".$_SESSION['id']."' ") or die(mysqli_error($connect));
$data = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil | Store</title>
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
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                <input type="text" name="nama" placeholder="Nama Lengkap" class="input" value="<?php echo $data->admin_name ?>" required>
                <input type="text" name="username" placeholder="Username" class="input" value="<?php echo $data->username ?>" required>
                <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nama = $_POST['nama'];
                    $username = $_POST['username'];
                    
                    $update= mysqli_query($connect,"UPDATE db_admin SET admin_name='".$nama."', username='".$username."' WHERE id='".$data->id."'");
                    if($update){
                        echo '<script>alert("Berhasil Mengubah Data!")</script>';
                        echo '<script>window.location="profil.php"</script>';
                    }
                    else{
                        echo 'gagal'.mysqli_error($connect);
                    }
                }
                ?>
            </div>
            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method="POST">
                <input type="password" name="pw1" placeholder="Password Baru" class="input" required>
                <input type="password" name="pw2" placeholder="Konfirmasi" class="input" required>
                <input type="submit" name="ubah_pw" value="Ubah Password" class="btn">
                </form>
                <?php
                if (isset($_POST['ubah_pw'])) {
                    $pw1 = $_POST['pw1'];
                    $pw2 = $_POST['pw2'];
                    
                    if($pw2!=$pw1){
                        echo '<script>alert("Konfirmasi Password Tidak Sesuai!")</script>';
                    }
                    else{
                        $update_pw= mysqli_query($connect,"UPDATE db_admin SET password='".$pw1."' WHERE id='".$data->id."'");
                        if($update_pw){
                            echo '<script>alert("Berhasil Mengubah Password!")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        }
                        else{
                            echo 'gagal'.mysqli_error($connect);
                        }
                    }
                    
                }
                ?>
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