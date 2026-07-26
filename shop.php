<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

// Populate the storefront with real products when the catalog is empty.
$catalog_count = $conn->query("SELECT COUNT(*) FROM `products`")->fetchColumn();
if((int) $catalog_count === 0){
   $starter_products = [
      ['AirPods Pro Wireless Earbuds', 'earbuds', 'Premium wireless earbuds with active noise cancellation and a comfortable all-day fit.', 17900, 'download.jfif'],
      ['Beats Solo Bluetooth Headphones', 'headphones', 'Powerful wireless sound, cushioned ear cups and long-lasting battery life.', 12999, 'download (1).jfif'],
      ['Studio Pro Noise Cancelling Headphones', 'headphones', 'Immersive over-ear headphones designed for clear calls and rich studio sound.', 15999, 'image.jfif'],
      ['Apple iPhone 14 Pro', 'smartphone', 'A premium smartphone with a brilliant display, advanced camera and powerful performance.', 149999, 'Apple-iPhone-14-Pro-iPhone-14-Pro-Max-gold-220907_inline.jpg.large.jpg'],
      ['Dell Vostro 3400 Laptop', 'laptop', 'A dependable everyday laptop for work, study and entertainment.', 78999, '0002_DELL-VOSTRO-3400-I5.jpg'],
      ['Xiaomi Mi Smart Band 6', 'watch', 'Track activity, heart rate and daily wellness on a bright AMOLED display.', 6499, 'MI-BAND-6-1.jpg'],
   ];
   $insert_starter_product = $conn->prepare("INSERT INTO `products` (`name`, `category`, `details`, `price`, `image_01`, `image_02`, `image_03`) VALUES (?, ?, ?, ?, ?, ?, ?)");
   foreach($starter_products as $product){
      $insert_starter_product->execute([$product[0], $product[1], $product[2], $product[3], $product[4], $product[4], $product[4]]);
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shop - Ble Wire</title>
   
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

<!-- 40% OFF Banner -->
<section class="discount-banner">
   <div class="banner-content">
      <div class="banner-copy">
         <span class="banner-kicker"><i class="fas fa-bolt"></i> Limited-time tech event</span>
         <h2>Upgrade your everyday.</h2>
         <p>Discover premium technology with savings of up to <strong>40% off</strong>.</p>
         <div class="banner-actions">
            <a href="#latest-products" class="banner-button">Shop the sale <i class="fas fa-arrow-right"></i></a>
            <span class="banner-note">Selected products • While stocks last</span>
         </div>
      </div>
      <div class="banner-offer" aria-label="Up to 40 percent off">
         <span>Up to</span>
         <strong>40%</strong>
         <span>Off</span>
      </div>
   </div>
   <div class="banner-benefits" aria-label="Shopping benefits">
      <span><i class="fas fa-truck-fast"></i> Fast delivery</span>
      <span><i class="fas fa-shield-halved"></i> Secure checkout</span>
      <span><i class="fas fa-headset"></i> Friendly support</span>
   </div>
</section>

<section class="products" id="latest-products">

   <h1 class="heading">Latest Products.</h1>

   <div class="box-container">

   <?php
     $select_products = $conn->prepare("SELECT * FROM `products`"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span>Nrs.</span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>

</section>













<?php include 'components/footer.php'; ?>

<script src="js/script.js?v=<?php echo time(); ?>"></script>

</body>
</html>