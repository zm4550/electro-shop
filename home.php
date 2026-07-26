<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ble Wire - Electronics Store</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Shery.js CDN -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sheryjs@1.0.0-alpha.4/dist/Shery.js"></script>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="home-bg">

<section class="home-hero" style="background-image: url('images/hero.png'); background-size: cover; background-position: center; background-attachment: fixed;">

   <div class="hero-container">
      
      <!-- Left Side - Large Text -->
      <div class="hero-text-wrapper">
         <div class="hero-label">
            <span class="label-line"></span>
            <span class="label-text">NEW COLLECTION</span>
         </div>
         
         <h1 class="hero-title">
            <span class="title-line title-line-1">DISCOVER</span>
            <span class="title-line title-line-2">THE FUTURE</span>
            <span class="title-line title-line-3">OF TECH</span>
         </h1>
         
         <div class="hero-description">
            <p>Experience innovation like never before. Premium products designed for the modern lifestyle.</p>
         </div>
         
         <div class="hero-cta">
            <a href="shop.php" class="btn-hero">
               <span>EXPLORE NOW</span>
               <span class="btn-arrow">→</span>
            </a>
            <a href="shop.php" class="btn-hero-secondary">
               <span>VIEW COLLECTION</span>
            </a>
         </div>
      </div>

      <!-- Right Side - Image with Overlay Text -->
      <div class="hero-image-wrapper">
         <div class="hero-image-container">
            <div class="image-overlay-text">
               <span class="overlay-number">01</span>
               <span class="overlay-label">FEATURED</span>
            </div>
            <div class="image-badge">
               <span>50% OFF</span>
            </div>
         </div>
         
         <!-- Floating Elements -->
         <div class="floating-elements">
            <div class="floating-card floating-card-1">
               <span class="card-number">02</span>
               <span class="card-text">WATCHES</span>
            </div>
            <div class="floating-card floating-card-2">
               <span class="card-number">03</span>
               <span class="card-text">HEADPHONES</span>
            </div>
         </div>
      </div>

      <!-- Bottom Stats -->
      

   </div>

</section>

</div>

<section class="category">

   <h1 class="heading">Shop by Category</h1>

   <div class="swiper category-slider">

   <div class="swiper-wrapper">

   <a href="category.php?category=headphones" class="swiper-slide slide">
      <img src="uploaded_img/download (1).jfif" alt="Headphone Deals">
      <h3>Headphone Deals</h3>
   </a>

   <a href="category.php?category=earbuds" class="swiper-slide slide">
      <img src="uploaded_img/download.jfif" alt="Earbuds">
      <h3>Earbuds</h3>
   </a>

   <a href="category.php?category=headphones" class="swiper-slide slide">
      <img src="uploaded_img/image.jfif" alt="On-Ear Headphones">
      <h3>On-Ear Headphones</h3>
   </a>

   <a href="category.php?category=earbuds" class="swiper-slide slide">
      <img src="uploaded_img/OIP (4).jpg" alt="Open-Ear Headphones">
      <h3>Open-Ear Headphones</h3>
   </a>

   <a href="category.php?category=headphones" class="swiper-slide slide">
      <img src="uploaded_img/41d-l8DdfeL._AC_UF894,1000_QL80_.jpg" alt="Over-Ear Headphones">
      <h3>Over-Ear Headphones</h3>
   </a>

   <a href="category.php?category=headphones" class="swiper-slide slide">
      <img src="uploaded_img/51iJx7YWDOL._AC_UF894,1000_QL80_.jpg" alt="Kids Headphones">
      <h3>Kids’ Headphones</h3>
   </a>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<section class="home-products">

   <h1 class="heading">Latest products</h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_products = $conn->prepare("SELECT DISTINCT * FROM `products` ORDER BY id DESC LIMIT 6"); 
     $select_products->execute();
     $product_count = $select_products->rowCount();
     if($product_count > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
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
      $demo_products = [
         ['name' => 'AirPods Pro Wireless Earbuds', 'price' => '179.00', 'image' => 'download.jfif'],
         ['name' => 'Beats Solo Bluetooth Headphone', 'price' => '129.99', 'image' => 'download (1).jfif'],
         ['name' => 'Studio Pro Noise Canceling Headphone', 'price' => '159.99', 'image' => 'image.jfif'],
         ['name' => 'Sony Wired In-Ear Earbuds', 'price' => '99.99', 'image' => 'macbook-air-space-gray-select-201810.jfif'],
         ['name' => 'Sony ZX Series Wired Headphone', 'price' => '109.99', 'image' => 'download.jfif'],
         ['name' => 'Powerbeats Pro Wireless Earbuds', 'price' => '169.99', 'image' => 'download (1).jfif'],
      ];

      foreach($demo_products as $index => $demo_product){
         $uploaded_demo_path = 'uploaded_img/' . $demo_product['image'];
         $fallback_demo_path = 'images/icon-1.png';
         $demo_image_src = file_exists($uploaded_demo_path) ? $uploaded_demo_path : $fallback_demo_path;
         $demo_id = 'demo_' . ($index + 1);
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $demo_id; ?>">
      <input type="hidden" name="name" value="<?= htmlspecialchars($demo_product['name']); ?>">
      <input type="hidden" name="price" value="<?= $demo_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $demo_product['image']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist" style="cursor: pointer;"></button>
      <a href="shop.php" class="fas fa-eye"></a>
      <img src="<?= $demo_image_src; ?>" alt="<?= htmlspecialchars($demo_product['name']); ?>">
      <div class="name"><?= htmlspecialchars($demo_product['name']); ?></div>
      <div class="flex">
         <div class="price"><span>Nrs.</span><?= $demo_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js?v=2.0"></script>

<script>
// Initialize Shery.js after DOM loads
document.addEventListener('DOMContentLoaded', function() {
   if (typeof Shery !== 'undefined') {
      // Text animations
      Shery.textAnimate(".heading", {
         style: 1,
         y: 10,
         delay: 0.1,
         duration: 0.8,
         ease: "cubic-bezier(0.23, 1, 0.320, 1)"
      });

      // Image animations
      Shery.imageMasker(".home .slide .image img", {
         mouseFollower: true,
         skew: true,
         ease: "cubic-bezier(0.23, 1, 0.320, 1)"
      });
   }
});

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

<?php
   // Get product count for Swiper loop configuration
   $product_count_for_swiper = isset($product_count) ? $product_count : 0;
?>

var productsSwiper = new Swiper(".products-slider", {
   loop: <?= $product_count_for_swiper > 3 ? 'true' : 'false'; ?>,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>