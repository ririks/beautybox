<?php
include('config.php');
session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
}

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
}

if(isset($_POST['simpan'])){
    // Mendapatkan nilai input dari form
    $name = $_POST['name'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $subdistrict = $_POST['subdistrict'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $country = $_POST['country'];
    $post_code = $_POST['post_code'];

    // Menyimpan data ke dalam tabel users_detail
    $query = "INSERT INTO users_detail (user_id, full_name, number, address, subdistrict, city, province, country, post_code)
              VALUES ('$user_id', '$name', '$number', '$address', '$subdistrict', '$city', '$province', '$country', '$post_code')";
    
    if(mysqli_query($conn, $query)){
        $message[] = 'address saved successfully!';
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
   
<?php @include 'header.php'; ?>

<section class="heading">

<h3>User Profile</h3>
<p><a href="index.php">home/</a>my profile</p>
</section>
<section class="checkout">

    <form action="" method="POST">

        <h3>Enter Your Address</h3>

        <div class="flex">
            <div class="inputBox">
                <span>Recipient's Name :</span>
                <input type="text" name="name" placeholder="enter recipient's name">
            </div>
            <div class="inputBox">
                <span>Phone Number :</span>
                <input type="number" name="number" min="0" placeholder="enter your phone number">
            </div>
            <div class="inputBox">
                <span>Address :</span>
                <input type="text" name="address" placeholder="ex. Aria Santika street No.34A">
            </div>
            <div class="inputBox">
                <span>Subdistrict :</span>
                <input type="text" name="subdistrict" placeholder="ex. Karawaci">
            </div>
            <div class="inputBox">
                <span>City :</span>
                <input type="text" name="city" placeholder="ex. Tangerang">
            </div>
            <div class="inputBox">
                <span>Province :</span>
                <input type="text" name="province" placeholder="ex. Banten">
            </div>
            <div class="inputBox">
                <span>Country :</span>
                <input type="text" name="country" placeholder="ex. Indonesia">
            </div>
            <div class="inputBox">
                <span>Post-Code :</span>
                <input type="number" min="0" name="post_code" placeholder="ex. 123 456">
            </div>
        </div>

        <input type="submit" name="simpan" value="Simpan Alamat" class="btn">

    </form>

</section>

<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>