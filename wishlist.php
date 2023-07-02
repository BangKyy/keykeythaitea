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

    // adding products in cart
    if (isset($_POST['add_to_cart'])) {
        $id = unique_id();
        $product_id = $_POST['product_id'];

        $qty = $_POST['qty'];
        // $qty = filter_var($qty, FILTER_SANITIZE_STRING);
        $qty = htmlspecialchars($qty);

        $varify_cart = $connection->query("SELECT * FROM `wishlist` WHERE user_id = '$user_id' AND product_id = '$product_id'");
        $fetch_varify_cart = $varify_cart->fetch_all(MYSQLI_ASSOC);

        $max_cart_items = $connection->query("SELECT * FROM `cart` WHERE user_id = '$user_id'");
        $fetch_cart_items = $max_cart_items->fetch_all(MYSQLI_ASSOC);

        if (count($fetch_varify_cart) > 0) {
            $warning_msg[] = 'product already exist in your wishlist';
        } else if (count($fetch_cart_num) > 0) {
            $warning_msg[] = 'cart is full';
        } else {
            $select_price = $connection->query("SELECT * FROM `products` WHERE id = '$id' LIMIT 1");
            $select_price->fetch_all(MYSQLI_ASSOC);
            $fetch_price = $select_price->fetch_all(MYSQLI_ASSOC);

            $insert_cart = $connection->query("INSERT INTO `cart` (id, user_id, product_id, price, qty) VALUES('$id', '$user_id', '$product_id', '$fetch_price' '$qty')");
            $insert_cart->fetch_all(MYSQLI_ASSOC);
            $success_msg[] = 'product added to cart successfully';
        }
    }

    // delete item from wishlist
    if (isset($_POST['delete_item'])) {
        $wishlist_id = $_POST['$wishlist_id'];
        // $wishlist_id = filter_var($wishlist_id, FILTER_SANITIZE_STRING);
        $wishlist_id = htmlspecialchars($wishlist_id);

        $varify_delete_items = $connection->query("SELECT * FROM `wishlist` WHERE id= '$wishlist_id'");
        $varify_delete_items->fetch_all(MYSQLI_ASSOC);
        $fetch_delete_items = $varify_delete_items->fetch_all(MYSQLI_ASSOC);

        if (count($fetch_delete_items) > 0) {
            $delete_wishlist_id = $connection->query("DELETE FROM `wishlist` WHERE id=''");
            $delete_wishlist_id->fetch_all(MYSQLI_ASSOC);
            $fetch_wishlist_id = $delete_wishlist_id->fetch_all(MYSQLI_ASSOC);
            $success_msg[] = "wishlist item delete successfully";
        }else{
            $warning_msg[] = 'wishlist item already deleted';
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
    <title>Keykey Thaitea - wishlist page</title>

</head>

<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>my wishlist</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span> / wishlist</span>
        </div>
        <section class="view_page">
            <h1 class="title">products added in wishlist</h1>
            <div class="box-container">
                <?php 
                    // $product_id = $_POST['$product_id'];
                    $select_wishlist = $connection->query("SELECT * FROM `wishlist`");
                    $fetch_select_wishlist = $select_wishlist->fetch_all(MYSQLI_ASSOC);
                    if (count($fetch_select_wishlist) > 0) {
                        // while($fetch_wishlist = $select_wishlist->fetch_all(MYSQLI_ASSOC)) {
                            $grand_total = 0;
                            foreach ($fetch_select_wishlist as $fetch_products) {
                            // echo json_encode($fetch_products);
                            // $select_products = $connection->query("SELECT * FROM `products` WHERE id= '$product_id'");

                ?>
                <form action="" method="post" class="box">
                    <input type="hidden" name="wishlist_id" value="<?php echo $fetch_products['id']; ?>">
                    <img src="./images/products/<?php echo $fetch_products['image']; ?>" alt="">
                    <div class="button">
                        <button type="submit" name="add_to_cart" class="btn"><i class="bx bx-cart"></i></button>
                        <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="bx bxs-show"></a>
                        <button type="submit" name="delete_item" onclick="return confirm('delete this item');" class="btn"></button>
                    </div>
                    <h3 class="name"><?php echo $fetch_products['name_product']; ?></h3>
                    <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
                    <div class="flex">
                        <p class="price">price $<?php echo $fetch_products['id']; ?>/-</p>
                    </div>
                    <a href="checkout.php?get_id=<?php echo $fetch_products['id'] ?>" class="btn">buy now</a>
                </form>
                <?php
                        $grand_total += intval($fetch_products['price']);
                        }
                    }else{
                        echo '<p class="empty">no products added yet!</p>';
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