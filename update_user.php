<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:user_login.php');
   exit;
};

$select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$select_profile->execute([$user_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){

   $name = trim($_POST['name'] ?? '');
   $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);

   if($name === '' || $email === false){
      $message[] = 'please enter valid profile details!';
   }else{
      $update_profile = $conn->prepare("UPDATE `users` SET name = ?, email = ? WHERE id = ?");
      $update_profile->execute([$name, $email, $user_id]);
      $fetch_profile['name'] = $name;
      $fetch_profile['email'] = $email;
      $message[] = 'profile updated successfully!';
   }

   $old_pass = $_POST['old_pass'] ?? '';
   $new_pass = $_POST['new_pass'] ?? '';
   $cpass = $_POST['cpass'] ?? '';

   if($old_pass !== '' || $new_pass !== '' || $cpass !== ''){
      $stored_password = $fetch_profile['password'];
      $valid_old_password = password_verify($old_pass, $stored_password) || hash_equals($stored_password, sha1($old_pass));
      if(!$valid_old_password){
         $message[] = 'old password not matched!';
      }elseif($new_pass === ''){
         $message[] = 'please enter a new password!';
      }elseif($new_pass !== $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $update_user_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
         $update_user_pass->execute([password_hash($new_pass, PASSWORD_DEFAULT), $user_id]);
         $message[] = 'password updated successfully!';
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
   <title>Update Profile - Ble Wire</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- GSAP & Shery.js CDN -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sheryjs@1.0.0-alpha.4/dist/Shery.js"></script>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="form-container">

   <form action="" method="post">
      <h3>Update now</h3>
      <input type="text" name="name" required placeholder="enter your username" maxlength="20"  class="box" value="<?= htmlspecialchars($fetch_profile["name"], ENT_QUOTES, 'UTF-8'); ?>">
      <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="<?= htmlspecialchars($fetch_profile["email"], ENT_QUOTES, 'UTF-8'); ?>">
      <input type="password" name="old_pass" placeholder="enter your old password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="new_pass" placeholder="enter your new password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cpass" placeholder="confirm your new password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="update now" class="btn" name="submit">
   </form>

</section>













<?php include 'components/footer.php'; ?>

<script src="js/script.js?v=<?php echo time(); ?>"></script>

</body>
</html>