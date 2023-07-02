<?php 
    include './database/connection.php';
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
        <?php include './style.css'; ?>
    </style>
    <!-- TITLE SITE -->
    <title>Keykey Thaitea - about us page</title>

</head>

<body>
    <?php include './components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>about us</h1>
        </div>
        <div class="title2">
            <a href="">home</a><span> / about</span>
        </div>
        <div class="about-category">
            <div class="box">
                <img src="images/greentea-removebg-preview.png" alt="">
                <div class="detail">
                    <span>coffe</span>
                    <h1>lemon green</h1>
                    <a href="view_product.php" class="btn">shop now</a>
                </div>
            </div>
            <div class="box">
                <img src="images/greentea-removebg-preview.png" alt="">
                <div class="detail">
                    <span>coffe</span>
                    <h1>lemon Teaname</h1>
                    <a href="view_product.php" class="btn">shop now</a>
                </div>
            </div>
            <div class="box">
                <img src="images/greentea-removebg-preview.png" alt="">
                <div class="detail">
                    <span>coffe</span>
                    <h1>lemon green</h1>
                    <a href="view_product.php" class="btn">shop now</a>
                </div>
            </div>
            <div class="box">
                <img src="images/greentea-removebg-preview.png" alt="">
                <div class="detail">
                    <span>coffe</span>
                    <h1>lemon green</h1>
                    <a href="view_product.php" class="btn">shop now</a>
                </div>
            </div>
        </div>
        <section class="services">
            <div class="title">
                <img src="images/healthy-tea.png" alt="" class="logo">
                <h1>why choose us</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, tempora?</p>
            </div>
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
        <div class="about">
            <div class="row">
                <div class="img-box">
                    <img src="images/greentea-removebg-preview.png" alt="">
                </div>
                <div class="detail">
                    <h1>visit our beautiful showroom!</h1>
                    <p>Our showroom is an expression of what we love doing; being creative with floral and plant arrangements. Whether you are looking for a florist for you perfect wedding, or just want to uplift any room with some one of a kind livig decor, Blossom with love can help</p>
                    <a href="view_product.php" class="btn">shop now</a>
                </div>
            </div>
        </div>
        <div class="testimonial-container">
            <div class="title">
                <img src="images/healthy-tea.png" class="logo" alt="">
                <h1>what people say about us</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, possimus?</p>
            </div>
            <div class="container">
                <div class="testimonial-item active">
                    <img src="images/static-assets-upload16744221515893132210.webp" alt="">
                    <h1>sara smith</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores esse voluptatibus nobis quae doloremque quod ipsa saepe sed id qui.</p>
                </div>
                <div class="testimonial-item">
                    <img src="images/static-assets-upload16744221515893132210.webp" alt="">
                    <h1>sara smith</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores esse voluptatibus nobis quae doloremque quod ipsa saepe sed id qui.</p>
                </div>
                <div class="testimonial-item">
                    <img src="images/static-assets-upload16744221515893132210.webp" alt="">
                    <h1>sara smith</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores esse voluptatibus nobis quae doloremque quod ipsa saepe sed id qui.</p>
                </div>
                <div class="left-arrow" onclick="nextSlide()"><i class="bx bxs-left-arrow-alt"></i></div>
                <div class="right-arrow" onclick="prevSlide()"><i class="bx bxs-right-arrow-alt"></i></div>
            </div>
        </div>
        <?php include './components/footer.php' ?>
    </div>
    <!-- SCRIPT JS -->
    <!-- <script src="./main.js"></script> -->
    <script src="./js/about.js"></script>
    <?php include './components/alert.php'; ?>
</body>

</html>