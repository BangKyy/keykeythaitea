<?php 
    include 'database/connection.php';
    session_start();

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = '';
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header("location: login.php");
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
    <title>Keykey Thaitea - about us page</title>

</head>

<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>contact us</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span> / contact</span>
        </div>
        <section class="services">
            <div class="box-container">
                <div class="box">
                    <img src="images/services-savings.png" alt="">
                    <div class="detail">
                        <h3>great savings</h3>
                        <p>save big every order</p>
                    </div>
                </div>
                <div class="box">
                    <img src="images/services-support.png" alt="">
                    <div class="detail">
                        <h3>24/7 support</h3>
                        <p>one-on-one support</p>
                    </div>
                </div>
                <div class="box">
                    <img src="images/services-gift.png" alt="">
                    <div class="detail">
                        <h3>gift voucher</h3>
                        <p>vouchers on every festivals</p>
                    </div>
                </div>
                <div class="box">
                    <img src="images/services-delivery.png" alt="">
                    <div class="detail">
                        <h3>worldwide delivery</h3>
                        <p>dropship worldwide</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="form-container">
            <form method="post">
                <div class="title">
                    <img src="images/healthy-tea.png" class="logo" alt="">
                    <h1>leave a message</h1>
                </div>
                <div class="input-field">
                    <p>your name</p>
                    <input type="text" name="name" id="">
                </div>
                <div class="input-field">
                    <p>your email</p>
                    <input type="text" name="email" id="">
                </div>
                <div class="input-field">
                    <p>your number</p>
                    <input type="text" name="number" id="">
                </div>
                <div class="input-field">
                    <p>your message</p>
                    <textarea name="message" id="" rows="5"></textarea>
                </div>
                <button type="submit" name="submit-btn" class="btn">send message</button>
            </form>
        </div>
        <div class="address">
                <div class="title">
                    <img src="images/logos.png" alt="" class="logo">
                    <h1>contact detail</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quae repellendus assumenda nostrum repellat modi beatae earum, explicabo sit natus harum nesciunt accusantium expedita adipisci odio ullam non eveniet itaque.</p>
                </div>
                <div class="box-container">
                    <div class="box">
                        <i class="bx bxs-map-pin"></i>
                        <div>
                            <h4>address</h4>
                            <p>1092 Merigold Lane, Coral Way</p>
                        </div>
                    </div>
                    <div class="box">
                        <i class="bx bxs-phone-call"></i>
                        <div>
                            <h4>phone number</h4>
                            <p>082140627334</p>
                        </div>
                    </div>
                    <div class="box">
                        <i class='bx bxs-envelope'></i>
                        <div>
                            <h4>email</h4>
                            <p>xenemies.27@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php include 'components/footer.php' ?>
    </div>
    <!-- SCRIPT JS -->
    <script src="./js/contact.js"></script>
    <?php include 'components/alert.php'; ?>
</body>

</html>