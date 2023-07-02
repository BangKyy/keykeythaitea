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

    // adding products in whislist
    if (isset($_GET['pid'])) {
        $id = unique_id();
        $product_id = $_GET['pid'];
        // $price = $_GET['price'];

        $varify_wishlist = $connection->query("SELECT * FROM `wishlist` WHERE product_id = '$product_id'");
        $cart_num = $connection->query("SELECT * FROM `carts` WHERE product_id = '$product_id'");
        
        $fetch_varify_wishlist = $varify_wishlist->fetch_all(MYSQLI_ASSOC);
        $fetch_cart_num = $cart_num->fetch_all(MYSQLI_ASSOC);

        if (count($fetch_varify_wishlist) > 0) {
            $warning_msg[] = 'product already exist in your wishlist';
        } else if (count($fetch_cart_num) > 0) {
            $warning_msg[] = 'product already exist in your cart';
        } else {
            $select_price = $connection->query("SELECT * FROM `products` WHERE product_id = '$product_id' LIMIT 1");
            $select_price->fetch_all(MYSQLI_ASSOC);
            $fetch_price = $select_price->fetch_all(MYSQLI_ASSOC);

            // $insert_wishlist = $connection->query("INSERT INTO `wishlist` (id, user_id, product_id, price) VALUES('$id', '$user_id', '$product_id, '$price')");
            // $fetch_insert_wishlist = $insert_wishlist->fetch_all(MYSQLI_ASSOC);
            $success_msg[] = 'product added to wishlist successfully';
        }
    }
    // adding products in cart
    if (isset($_GET['add_to_cart'])) {
        $id = unique_id();
        $product_id = $_GET['product_id'];

        $qty = $_GET['qty'];
        $qty = htmlspecialchars($qty);

        echo "<script>alert('$user_id')</script>";

        $varify_cart = $connection->query("SELECT * FROM `wishlist` WHERE user_id = '$user_id' AND product_id = '$product_id'");
        $fetch_varify_cart = $varify_cart->fetch_all(MYSQLI_ASSOC);

        $max_cart_items = $connection->query("SELECT * FROM `cart` WHERE user_id = '$user_id'");
        $fetch_cart_items = $max_cart_items->fetch_all(MYSQLI_ASSOC);

        if (count($fetch_varify_cart) > 0) {
            $warning_msg[] = 'product already exist in your wishlist';
        } else if (count($fetch_cart_num) > 0) {
            $warning_msg[] = 'cart is full';
        } else {
            $select_price = $connection->query("SELECT * FROM `products` WHERE id = '$product_id' LIMIT 1");
            $select_price->fetch_all(MYSQLI_ASSOC);
            $fetch_price = $select_price->fetch_all(MYSQLI_ASSOC);

            $insert_cart = $connection->query("INSERT INTO `cart` (id, user_id, product_id, price, qty) VALUES('$id', '$user_id', '$product_id, '$qty')");
            $fetch_insert_cart = $insert_cart->fetch_all(MYSQLI_ASSOC);
            $success_msg[] = 'product added to cart successfully';
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
    <title>Keykey Thaitea - product detail page</title>

</head>

<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>product detail</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span> / our shop</span>
        </div>
        <section class="view_page">
            <?php 
                if (isset($_GET['pid'])) {
                    $pid = $_GET['pid'];
                    $select_products = $connection->query("SELECT * FROM `products` WHERE product_id = '$pid'");
                    $fetch_select_products = $select_products->fetch_all(MYSQLI_ASSOC);
                    if (count($fetch_select_products) > 0) {
                        // while($fetch_products = $select_products->fetch_all(MYSQLI_ASSOC)) {
                            
            ?>
            <form action="" method="post">
                <img src="./images/products/<?php echo $fetch_select_products[0]['image']; ?>" alt="">
                <div class="detail">
                    <div class="price">$<?php echo $fetch_select_products[0]['price']; ?>/-</div>
                    <div class="name"><?php echo $fetch_select_products[0]['name'] ?></div>
                    <div class="detail">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum quam culpa porro ut doloribus, pariatur enim nesciunt, repellat esse sapiente deleniti amet delectus ipsam magnam placeat dolorem recusandae ducimus vitae!</p>
                    </div>
                    <input type="hidden" name="product_id" value="<?php echo $fetch_select_products[0]['product_id']; ?>">
                    <div class="button">
                        <button type="submit" name="add_to_wishlist" class="btn">add to wishlist <i class="bx bx-heart"></i></button>
                        <input type="hidden" name="qty" value="1" min="0" quantity>
                        <button type="submit" name="add_to_cart" class="btn">add to cart</button>
                    </div>
                </div>
            </form>
            <?php
                        // }
                    } 
                }
            ?>
        </section>
        <?php include 'components/footer.php' ?>
    </div>
    <!-- SCRIPT JS -->
    <script src="./js/view_products.js"></script>
    <?php include 'components/alert.php'; ?>
</body>

</html>