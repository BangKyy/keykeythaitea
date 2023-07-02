<header class="header">
    <div class="flex">
        <a href="./index.php" class="logo">
            <img src="./images/logos.png" alt="" class="logo-navbar">
            <h4 class="title-header">KEYKEY <br> THAITEA </h5>
        </a>
        <nav class="navbar">
            <a href="./index.php">beranda</a>
            <a href="./view_products.php">produk</a>
            <a href="./order.php">pesan</a>
            <a href="./about.php">tentang</a>
            <a href="./contact.php">kontak</a>
        </nav>
        <div class="icons">
            <i class="bx bxs-user" id="user-btn"></i>
            <?php 
                // $count_wishlist_items = $connection->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
                // $count_wishlist_items->execute([$user_id]);
                // $total_wishlist_items = $count_wishlist_items->rowCount();
                // echo json_encode($count_wishlist_items);

                $count_wishlist_items = $connection->query("SELECT * FROM `wishlist`");
                $fetch_wish_items = $count_wishlist_items->fetch_all(MYSQLI_ASSOC);
                $all_total_wish_items = count($fetch_wish_items);
            ?>
            <a href="wishlist.php" class="cart-btn"><i class="bx bx-heart"></i><sup><?php echo $all_total_wish_items ?></sup></a>
            <?php 
                // $count_cart_items = $connection->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
                // $count_cart_items->execute([$user_id]);
                // $total_cart_items = $count_cart_items->rowCount();

                $count_cart_items = $connection->query("SELECT * FROM `carts`");
                $fetch_cart_items = $count_cart_items->fetch_all(MYSQLI_ASSOC);
                $all_count_cart_items = count($fetch_cart_items);               
            ?>
            <a href="cart.php" class="cart-btn"><i class="bx bx-cart-download"></i><sup><?php echo $all_count_cart_items ?></sup></a>
            <i class="bx bx-list-plus" id="menu-btn" style="font-size: 2rem;"></i>
        </div>
        <div class="user-box">
            <?php if (key_exists("user_name", $_SESSION)) { ?>
                <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <?php } ?>
            <?php if (key_exists("user_email", $_SESSION)) { ?>
                <p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <?php } ?>
            <a href="login.php" class="btn">login</a>
            <a href="register.php" class="btn">register</a>
            <form method="post">
                <button type="submit" name="logout" class="logout-btn">log out</button>
            </form>
        </div>
    </div>
    <script src="./js/header.js"></script>
</header>