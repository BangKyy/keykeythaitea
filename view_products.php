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

    // adding products in wishlist
    if (isset($_POST['add_to_wishlist'])) {
        $id = unique_id();
        $product_id = $_POST['product_id'];

        $varify_wishlist = $connection->query("SELECT * FROM `wishlist` WHERE user_id = '$user_id' AND product_id= '$product_id'");
        $fetch_varify_wishlist = $varify_wishlist->fetch_all(MYSQLI_ASSOC);

        $cart_num = $connection->query("SELECT * FROM `carts` WHERE user_id = '$user_id' AND product_id= '$product_id'");
        $fetch_cart_num = $cart_num->fetch_all(MYSQLI_ASSOC);

        if (count($fetch_varify_wishlist) > 0) {
            $warning_msg[] = 'product already exist in your wishlist';
        } else if (count($fetch_cart_num) > 0) {
            $warning_msg[] = 'product already exist in your cart';
        } else {
            $select_price = $connection->query("SELECT * FROM `products` WHERE id = '$id' LIMIT 1");
            $fecth_select_price = $select_price->fetch_all(MYSQLI_ASSOC);
            $fetch_price = $select_price->fetch_all(MYSQLI_ASSOC);

            $insert_whislist = $connection->query("INSERT INTO `wishlist` (id, user_id, product_id, price) VALUES('$id', '$user_id', '$product_id', '$fetch_price')");
            $fetch_insert_wishlist = $insert_whislist->fetch_all(MYSQLI_ASSOC);
            $success_msg[] = 'product added to wishlist successfully';
        }
    }
    // adding products in cart
    if (isset($_POST['add_to_cart'])) {
        $id = unique_id();
        $product_id = $_POST['product_id'];
        $price = $_POST['price'];

        $qty = $_POST['qty'];
        // $qty = filter_var($qty, FILTER_SANITIZE_STRING);
        $qty = htmlspecialchars($qty);

        $varify_cart = $connection->query("SELECT * FROM `wishlist` WHERE user_id = '$user_id' AND product_id = '$product_id'");
        $fetch_varify_cart = $varify_cart->fetch_all(MYSQLI_ASSOC);

        $max_cart_items = $connection->query("SELECT * FROM `carts` WHERE user_id = '$user_id'");
        $fetch_cart_items = $max_cart_items->fetch_all(MYSQLI_ASSOC);

        if (count($fetch_varify_cart) > 0) {
            $warning_msg[] = 'product already exist in your wishlist';
        } else if (count($fetch_cart_items) > 0) {
            $warning_msg[] = 'cart is full';
        } else {
            // echo "$user_id";
            $select_price = $connection->query("SELECT * FROM `products` WHERE id = '$id' LIMIT 1");
            $select_price->fetch_all(MYSQLI_ASSOC);
            $fetch_price = $select_price->fetch_all(MYSQLI_ASSOC);

            $insert_cart = $connection->query("INSERT INTO `carts` (user_id, product_id, price, qty) VALUES('$user_id', '$product_id', '$price', '$qty')");
            // $insert_cart->fetch_all(MYSQLI_ASSOC);
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
    <title>Keykey Thaitea - shop page</title>

</head>

<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>shop</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span> / our shop</span>
        </div>
        <section class="products">
            <div class="box-container">
                <?php 
                    $select_products = $connection->query("SELECT * FROM `products`");
                    $select_all_products = $select_products->fetch_all(MYSQLI_ASSOC);
                    // echo json_encode($select_all_products);
                    if (count($select_all_products) > 0) {
                        // echo json_encode($select_products->fetch_assoc());
                        // while ($fetch_products = $select_products->fetch_assoc()) {
                        foreach ($select_all_products as $fetch_products) {
                    // echo json_encode(count($fetch_products));
                            
                ?>
                <form action="" method="post" class="box">
                    <img src="./images/products/<?php echo $fetch_products['image']; ?>" alt="" class="img">
                    <div class="button">
                        <button type="submit" name="add_to_cart"><i class="bx bx-cart"></i></button>
                        <button type="submit" name="add_to_wishlist"><i class="bx bx-heart"></i></button>
                        <a href="view_page.php?pid=<?php echo $fetch_products['product_id'] ?>" class="bx bxs-show"></a>
                    </div>
                    <h3 class="name"><?php echo$fetch_products['name']; ?></h3>
                    <input type="hidden" name="product_id" value="<?php echo $fetch_products['product_id']; ?>">
                    <input type="hidden" name="price" value="<?php echo $fetch_products['price']; ?>">
                    <div class="flex">
                        <p class="price">price $<?php echo$fetch_products['price']?>/-</p>
                        <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
                    </div>
                    <a href="checkout.php?get_id=<?php echo $fetch_products['id']; ?>" class="btn">buy now</a>
                </form>
                <?php
                        }
                    }else{
                        echo `<p class="empty">no products added yet!</p>`;
                    }
                ?>
            </div>
        </section>
        <?php include 'components/footer.php' ?>
    </div>
    <!-- SCRIPT JS -->
    <script src="./js/view_products.js"></script>
    <?php include 'components/alert.php'; ?>
</body>

</html>