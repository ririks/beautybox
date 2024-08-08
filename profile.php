<?php
include('config.php');
session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile</title>

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

        <?php
         if(!empty($user_id)){
            $select_user = mysqli_query($conn, "SELECT users.name, users.email, users_detail.full_name, users_detail.number, users_detail.address, users_detail.subdistrict, users_detail.city, users_detail.province, users_detail.country, users_detail.post_code FROM users LEFT JOIN users_detail ON users.id = users_detail.user_id WHERE users.id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_user)> 0){
            $fetch_user = mysqli_fetch_assoc($select_user);
         }
        }
         ?>
         <div class="flex">
            <div class="inputBox">
               <span>Name :</span>
               <input type="text" name="name" value="<?php echo $fetch_user['name']; ?>" readonly>
            </div>
            <div class="inputBox">
               <span>Email :</span>
               <input type="email" name="email" value="<?php echo $fetch_user['email']; ?>" readonly>
            </div>
            <div class="inputBox">
                <span>Phone number:</span>
                <input type="text" name="number" value="<?php echo $fetch_user['number']; ?>" readonly>
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
         </div>

         <?php if (empty($fetch_user['address']) || empty($fetch_user['subdistrict']) || empty($fetch_user['city']) || empty($fetch_user['province']) || empty($fetch_user['country']) || empty($fetch_user['post_code'])) { ?>
            <a href="profile_input.php" class="option-btn">Insert Address</a>
        <?php } else { ?>
            <a href="profile_edit.php" class="option-btn">Edit Address</a>
        <?php } ?>

    </form>
   
</section>

<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
