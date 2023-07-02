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
    <link rel="apple-touch-icon" sizes="180x180" href="images/FavAssets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/FavAssets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/FavAssets/favicon-16x16.png">
    <!-- <link rel="manifest" href="images/FavAssets/site.webmanifest"> -->
    <link rel="mask-icon" href="images/FavAssets/safari-pinned-tab.svg" color="#5bbad5">
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
    <title>Keykey Thaitea - Rasaku Semanis Senyummu</title>

</head>

<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <section class="home-section">
            <div class="slider">
                <div class="slider__slider slide1">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Lorem ipsum dolor sit.</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, recusandae.</p>
                        <a href="view_product.php" class="btn">shop now</a>
                    </div>
                    <div class="hero-dec-top"></div>
                    <div class="hero-dec-bottom"></div>
                </div>
                <!-- slide end -->
                <div class="slider__slider slide2">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Selamat datang di toko kami.</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, recusandae.</p>
                        <a href="view_product.php" class="btn">shop now</a>
                    </div>
                    <div class="hero-dec-top"></div>
                    <div class="hero-dec-bottom"></div>
                </div>
                <!-- slide end -->
                <div class="slider__slider slide3">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Lorem ipsum dolor sit.</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, recusandae.</p>
                        <a href="view_product.php" class="btn">shop now</a>
                    </div>
                    <div class="hero-dec-top"></div>
                    <div class="hero-dec-bottom"></div>
                </div>
                <!-- slide end -->
                <div class="slider__slider slide4">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Lorem ipsum dolor sit.</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, recusandae.</p>
                        <a href="view_product.php" class="btn">shop now</a>
                    </div>
                    <div class="hero-dec-top"></div>
                    <div class="hero-dec-bottom"></div>
                </div>
                <!-- slide end -->
                <div class="slider__slider slide5">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Lorem ipsum dolor sit.</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, recusandae.</p>
                        <a href="view_product.php" class="btn">shop now</a>
                    </div>
                    <div class="hero-dec-top"></div>
                    <div class="hero-dec-bottom"></div>
                </div>
                <!-- slide end -->
                <div class="left-arrow">
                    <i class="bx bxs-left-arrow"></i>
                </div>
                <div class="right-arrow">
                    <i class="bx bxs-right-arrow"></i>
                </div>
            </div>
        </section>
        <!-- home slider end -->
        <section class="thumb">
            <div class="box-container">
                <div class="box">
                    <img src="images/icon-tea.png" alt="">
                    <h3>green tea</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    <i class="bx bx-chevron-right"></i>
                </div>
                <div class="box">
                    <img src="images/icon-tea.png" alt="">
                    <h3>lemon tea</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    <i class="bx bx-chevron-right"></i>
                </div>
                <div class="box">
                    <img src="images/icon-tea.png" alt="">
                    <h3>green coffe</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    <i class="bx bx-chevron-right"></i>
                </div>
                <div class="box">
                    <img src="images/icon-tea.png" alt="">
                    <h3>green tea</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    <i class="bx bx-chevron-right"></i>
                </div>
            </div>
        </section>
        <section class="container">
            <div class="box-container">
                <div class="box">
                    <img src="images/greentea-removebg-preview.png" alt="" class="box-img1">
                </div>
                <div class="box">
                    <img src="images/healthy-tea.png" alt="" class="box-img2">
                    <span>healthy tea</span>
                    <h1>save up to 50% off</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium, cum!</p>
                </div>
            </div>
        </section>
        <section class="shop">
            <div class="title">
                <img src="images/healthy-tea.png" alt="">
                <h1>Trending Products</h1>
            </div>
            <div class="row">
                <img src="images/img3.png" alt="">
                <div class="row-detail">
                    <img src="images/img2.png" alt="">
                    <div class="top-footer">
                        <h1>a cup of green tea makes you healthy</h1>
                    </div>
                </div>
            </div>
            <div class="box-container">
                <div class="box">
                    <img src="images/products/tea1.png" alt="">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
                <div class="box">
                    <img src="images/products/tea2.png" alt="">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
                <div class="box">
                    <img src="images/products/tea3.png" alt="">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
                <div class="box">
                    <img src="images/products/tea4.png" alt="">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
                <div class="box">
                    <img src="images/products/tea5.png" alt="">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
                <div class="box">
                    <img src="images/products/tea6.png" alt="">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
            </div>
        </section>
        <div class="shop-category">
            <div class="box-container">
                <div class="box">
                    <img src="images/img5.png" alt="">
                    <div class="detail">
                        <span>BIG OFFERS</span>
                        <h1>Extra 15% off</h1>
                        <a href="view_products.php" class="btn">shop now</a>
                    </div>
                </div>
                <div class="box">
                    <img src="images/img4.png" alt="">
                    <div class="detail">
                        <span>new in taste</span>
                        <h1>kedai keykeythaitea</h1>
                        <a href="view_products.php" class="btn">shop now</a>
                    </div>
                </div>
            </div>
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
        <!-- <div class="brand">
            <div class="box-container">
                <div class="box">
                    <img src="" alt="">
                </div>
                <div class="box">
                    <img src="" alt="">
                </div>
                <div class="box">
                    <img src="" alt="">
                </div>
                <div class="box">
                    <img src="" alt="">
                </div>
            </div>
        </div> -->
        <?php include 'components/footer.php' ?>
    </div>
    <!-- SCRIPT JS -->
    <script src="main.js"></script>    
    <?php include 'components/alert.php'; ?>
</body>

</html>