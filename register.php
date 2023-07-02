<?php 
    include 'database/connection.php';
    session_start();

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = '';
    }

    // register user
    if (isset($_POST['submit'])) {
        $id = unique_id();
        $name = $_POST['name'];
        $name = htmlspecialchars($id);
        $email = $_POST['email'];
        $email = htmlspecialchars($email);
        $pass = $_POST['pass'];
        $pass = htmlspecialchars($pass);
        $cpass = $_POST['cpass'];
        $cpass = htmlspecialchars($cpass);

        $select_user = $connection->query("SELECT * FROM `users` WHERE email = '$email'");
        $fetch_row = $select_user->fetch_all(MYSQLI_ASSOC);

        if (count($fetch_row) > 0) {
            $message[] = 'email already exist';
            // echo 'email already exist';
        }else{
            if($pass !== $cpass){
                $message[] = 'confirm your password';
                echo 'confirm your password';
            }else{
                $insert_user = $connection->query("INSERT INTO `users` (name, email, pass, cpass) VALUES('$name', '$email', '$pass', '$cpass')");
                $select_user = $connection->query("SELECT * FROM `users` WHERE email = '$email' AND pass = '$pass'");
                $fetch_row = $select_user->fetch_all(MYSQLI_ASSOC);

                if (count($fetch_row) > 0){
                    $_SESSION['user_id'] = $fetch_row[0]['id'];
                    $_SESSION['user_name'] = $fetch_row[0]['name'];
                    $_SESSION['user_email'] = $fetch_row[0]['email'];
                }else{
                    $_SESSION["user_id"] = "";
                    $_SESSION['user_name'] = "";
                    $_SESSION['user_email'] = "";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:title" content="KEYKEY THAITEA">
    <meta property="og:description" content="Yang ga doyan teh aja langsung ketagihan abis yoba Thai Tea ini, Dijamin!">
    <meta property="og:image" content="images/Logos.png">
    <meta name="keywords" content="keykeythaitea, thaitea, keykeythaitea blitar, keykey thaitea, thaitea blitar, keykey thai tea, KeyKey ThaiTea, KeyKey Thai Tea, Blitar, Minuman">

    <!-- FAV ICONS -->
    <link rel="apple-touch-icon" sizes="180x180" href="./images/FavAssets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/FavAssets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/FavAssets/favicon-16x16.png">
    <!-- <link rel="manifest" href="images/FavAssets/site.webmanifest"> -->
    <link rel="mask-icon" href="./images/FavAssets/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <!-- <meta name="theme-color" content="#ffffff"> -->
    
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- SWEET ALERT 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js" integrity="sha256-t0FDfwj/WoMHIBbmFfuOtZv1wtA977QCfsFR3p1K4No=" crossorigin="anonymous"></script>
    <!-- STYLE CSS -->
    <style type="text/css">
        <?php include 'style.css'; ?>
    </style>
    <!-- TITLE SITE -->
    <title>Keykey Thaitea - daftar</title>

</head>

<body>
    <div class="main-container">
        <section class="form-container">
            <div class="title">
                <img src="./images/logos.png" alt="" class="logo">
                <h1>daftar sekarang</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi minus dolores eius ut facere enim veritatis molestiae corrupti voluptates quasi.</p>
            </div>
            <form action="" method="post">
                <div class="input-field">
                    <p>your name</p>
                    <input type="text" name="name" id="" required placeholder="enter your name" maxlength="50">
                </div>
                <div class="input-field">
                    <p>your email</p>
                    <input type="email" name="email" id="" required placeholder="enter your email" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                </div>
                <div class="input-field">
                    <p>your password</p>
                    <input type="password" name="pass" id="" required placeholder="enter your password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                </div>
                <div class="input-field">
                    <p>confirm password</p>
                    <input type="password" name="cpass" id="" required placeholder="enter your password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                </div>
                <input type="submit" name="submit" value="register now" class="btn">
                <p>already have an account? <a href="login.php">login now</a></p>
            </form>
        </section>
    </div>

    <!-- SCRIPT JS -->
    <script src="./js/register.js"></script>
    <?php include 'components/alert.php'; ?>
</body>

</html>