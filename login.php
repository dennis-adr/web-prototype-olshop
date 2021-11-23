<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Store</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
</head>

<body id="bg-login">
    <div class="template-login">
        <h1>Login</h1>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="input username" class="input">
            <input type="password" name="password" placeholder="input password" class="input">
            <input type="submit" name="submit" value="Login" class="btn">
        </form>
        <?php
        //cek login dgn session
        if (isset($_POST['submit'])) {
            session_start();
            include 'conn.php';
            $username = $_POST['username'];
            $password = $_POST['password'];
            //cek input=db
            $cek = mysqli_query($connect, "SELECT * FROM db_admin WHERE username = '$username' && password= '$password'") or die(mysqli_error($connect));
            if (mysqli_num_rows($cek) > 0) { //mysqli num row= 1 atau 0
                $data = mysqli_fetch_object($cek);//panggil data
                $_SESSION['status_login']= true;//jika tanpa login false
                $_SESSION['a_global']= $data;//data admin disimpan
                $_SESSION['id']= $data->id;
                echo '<script>window.location="dashboard.php"</script>';
            } else { //login gagal
                echo '<script>alert("Username atau Password Anda Salah!")</script>';
            }
        }
        ?>
    </div>
</body>

</html>