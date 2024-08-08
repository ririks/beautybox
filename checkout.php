<?php
include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
   exit();
}

if (isset($_POST['order'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, 'address ' . $_POST['subdistrict'] . ', ' . $_POST['city'] . ', ' . $_POST['province'] . ', ' . $_POST['country'] . ' - ' . $_POST['post_code']);
    $placed_on = date('d-M-Y');
    $image = $_FILES['proof']['name'];
    $image_size = $_FILES['proof']['size'];
    $image_tmp_name = $_FILES['proof']['tmp_name'];
    $image_folter = 'proof/'.$image;


    $cart_total = 0;
    $cart_products[] = '';

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if (mysqli_num_rows($cart_query) > 0) {
        while ($cart_item = mysqli_fetch_assoc($cart_query)) {
            $cart_products[] = $cart_item['name'] . ' (' . $cart_item['quantity'] . ') ';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }

    $total_products = implode(', ', $cart_products);

    $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total' AND proof = '$image'") or die('query failed');

    if ($cart_total == 0) {
        $message[] = 'Your cart is empty!';
    } elseif (mysqli_num_rows($order_query) > 0) {
        $message[] = 'Order has already been placed!';
    } else {
        $insert_order = mysqli_query($conn, "INSERT INTO `orders` (user_id, name, number, email, method, address, total_products, total_price, placed_on, proof) VALUES ('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on', '$image')") or die('query failed');
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if($insert_order){
            if($image_size > 2000000){
               $message[] = 'image size is too large!';
            }else{
               move_uploaded_file($image_tmp_name, $image_folter);
               $message[] = 'Order placed successfully!';
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
    <title>checkout</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <section class="heading">
        <h3>checkout order</h3>
        <p> <a href="index.php">home</a> / checkout </p>
    </section>

    <section class="display-order">
        <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select_cart) > 0) {
            while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                $grand_total += $total_price;
        ?>
                <p> <?php echo $fetch_cart['name'] ?> <span>(<?php echo 'Rp.' . $fetch_cart['price'] . ' x ' . $fetch_cart['quantity']  ?>)</span> </p>
        <?php
            }
        } else {
            echo '<p class="empty">your cart is empty</p>';
        }
        ?>
        <div class="grand-total">grand total: <span>Rp.<?php echo $grand_total; ?></span></div>
    </section>

    <section class="checkout">

        <form action="" method="POST" enctype="multipart/form-data">

            <h3>place your order</h3>

            <?php
            if(!empty($user_id)){
                $select_user = mysqli_query($conn, "SELECT users.name, users.email, users_detail.full_name, users_detail.number, users_detail.address, users_detail.subdistrict, users_detail.city, users_detail.province, users_detail.country, users_detail.post_code FROM users LEFT JOIN users_detail ON users.id = users_detail.user_id WHERE users.id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select_user) > 0){
                $fetch_user = mysqli_fetch_assoc($select_user);
                }
            }
            ?>
            <div class="flex">
                <div class="inputBox">
                    <span>your name :</span>
                    <input type="text" name="name" placeholder="enter your name" value="<?php echo $fetch_user['full_name']; ?>">
                </div>
                <div class="inputBox">
                    <span>your number :</span>
                    <input type="number" name="number" min="0" placeholder="enter your number" value="<?php echo $fetch_user['number']; ?>" readonly>
                </div>
                <div class="inputBox">
                    <span>your email :</span>
                    <input type="email" name="email" placeholder="enter your email" value="<?php echo $fetch_user['email']; ?>" readonly>
                </div>
                <div class="inputBox">
                    <span>payment method :</span>
                    <select name="method">
                        <option value="e-wallet">E-Wallet</option>
                        <option value="transfer bank">Transfer Bank</option>
                        <option value="credit card">Credit Card</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" name="address" placeholder="ex. Aria Santika city No.34A" value="<?php echo $fetch_user['address']; ?>">
                </div>
                <div class="inputBox">
                    <span>subdistrict :</span>
                    <input type="text" name="subdistrict" placeholder="ex. Karawaci" value="<?php echo $fetch_user['subdistrict']; ?>">
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" name="city" placeholder="e.g. mumbai" value="<?php echo $fetch_user['city']; ?>">
                </div>
                <div class="inputBox">
                    <span>province :</span>
                    <input type="text" name="province" placeholder="e.g. maharashtra" value="<?php echo $fetch_user['province']; ?>">
                </div>
                <div class="inputBox">
                    <span>country :</span>
                    <input type="text" name="country" placeholder="e.g. india" value="<?php echo $fetch_user['country']; ?>">
                </div>
                <div class="inputBox">
                    <span>post code :</span>
                    <input type="number" min="0" name="post_code" placeholder="e.g. 123456" value="<?php echo $fetch_user['post_code']; ?>">
                </div>
                <div class="inputBox">
                    <span>upload photo :</span>
                    <input type="file" accept="image/jpg, image/jpeg, image/png" required class="box" name="proof">
                </div>
            </div>


            <input type="submit" name="order" value="order now" class="btn">

        </form>

    </section>
