<?php
include 'conn.php';
$total = 0;
$hargasem = 0;
$nama = $_POST['nama'];
$no_telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$banyak = array($_POST['barang1'],$_POST['barang2'],$_POST['barang3'],$_POST['barang4'],$_POST['barang5'],$_POST['barang6'],$_POST['barang7'],$_POST['barang8'],$_POST['barang9'],$_POST['barang10'],$_POST['barang11'],$_POST['barang21'],);
$stok = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$stoksem = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$id = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$x = 0;
$y=0;
$cekid=1;

$produk = mysqli_query($connect, "SELECT * FROM db_product"); //mengecek apakah input pemesanan melebihi stok yang tersedia atau tidak
while ($row = mysqli_fetch_array($produk)) {
    $stok[$x] = $row['stok'];
    $stoksem[$x] = $stok[$x] - $banyak[$x];
    $id[$x] = $row['id'];
    if ($banyak[$x] > $stok[$x]) {
        echo '<script>alert("Mohon maaf, pesanan anda melebihi stok yang tersedia. Mohon ulangi pemesanan.")</script>';
        echo '<script>window.location="index.html"</script>';
    } else {
    }
    $x++;
?>

<?php } ?>

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
        </div>
    </header>
    <!--content-->
    <div class="content">
        <div class="container">
            <h2>Checkout Produk</h2>
            <div class="box">
                <table>
                    <tr>
                        <td class="jarak">Nama</td>
                        <td><?= $nama ?></td>
                    </tr>
                    <tr>
                        <td class="jarak">Alamat</td>
                        <td><?= $alamat ?></textarea></td>
                    </tr>
                    <tr>
                        <td class="jarak">Nomor Telp.</td>
                        <td><?= $no_telp ?></td>
                    </tr>
                </table>

                <table border="1" class="table" cellspacing="0">
                    <thead>
                        <th>ID</th>
                        <th>Barcode</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Detail</th>
                        <th>Jumlah Pesanan</th>
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
                                <td><?php
                                    if ($row['id'] == $cekid) {
                                        echo $banyak[$y];
                                        $hargasem = $banyak[$y] * $row['harga'];
                                        $total = $total + $hargasem;
                                    }else if ($row['id']==21){
                                        echo $banyak[11];
                                        $hargasem = $banyak[11] * $row['harga'];
                                        $total = $total + $hargasem;
                                    }else {}
                                    ?></td>
                            </tr>
                        <?php $y++;$cekid++;} ?>
                    </tbody>
                </table>

                Total Harga = Rp.<?= $total ?>
                <br>
                <form>
                    <br><input type="button" value="Kembali" onclick="history.back()" class="btn">
                </form>
            </div>
        </div>
    </div>



    <?php
    if ($nama != NULL && $no_telp != NULL && $alamat != NULL) {
        $insert = mysqli_query($connect, "INSERT INTO db_pembeli (nama,no_telp,alamat,pesanan,total) VALUES 
                ('$nama','$no_telp','$alamat','id1=$banyak[0],id2=$banyak[1],id3=$banyak[2],id4=$banyak[3],id5=$banyak[4],id6=$banyak[5], id7=$banyak[6],id8=$banyak[7],id9=$banyak[8],id10=$banyak[9],id11=$banyak[10],id21=$banyak[11]', 
                '$total')");
        if ($insert) {
            echo '<script>alert("Anda telah berhasil checkout! Terima Kasih!")</script>';
        } else {
            echo 'Gagal!' . mysqli_error($connect);
        }
        for ($m = 0; $m < $x; $m++) {
            $update = mysqli_query($connect, "UPDATE db_product SET stok='" . $stoksem[$m] . "' WHERE id='" . $id[$m] . "' ");

        }
    } else if ($nama == NULL || $no_telp == NULL || $alamat == NULL) {
        echo '<script>alert("Mohon isi kolom nama, nomor telepon, serta alamat dengan benar!")</script>';
        echo '<script>window.location="index.html"</script>';
    } else {
    }

    ?>
</body>

</html>