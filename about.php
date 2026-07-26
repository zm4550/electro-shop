<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us - Ble Wire</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
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

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/23.png" alt="">
      </div>

      <div class="content">
         <h3>About Our Electronics Store</h3>
         <p>Welcome to our premier electronics destination, where innovation meets quality. We specialize in providing cutting-edge electronic devices and gadgets that enhance your digital lifestyle. From the latest smartphones and laptops to smart home appliances, cameras, and accessories, we curate a comprehensive collection of top-tier electronics from leading brands worldwide.</p>

         <p>Our mission is to make technology accessible to everyone by offering competitive prices, genuine products, and exceptional customer service. We understand that electronics are an integral part of modern life, connecting us to the world, powering our work, and enriching our entertainment experiences. That's why we carefully select each product in our inventory, ensuring it meets our high standards for quality, performance, and reliability.</p>

         <p>Whether you're a tech enthusiast looking for the latest innovations, a professional in need of reliable work equipment, or a family seeking smart home solutions, we have something for everyone. Our team is dedicated to helping you find the perfect electronic device that fits your needs, budget, and lifestyle. Experience the future of shopping with us today!</p>
         <a href="contact.php" class="btn">Contact Us</a>
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">Customer Reviews</h1>

   <div class="swiper reviews-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <p>Absolutely fantastic experience! I purchased a laptop from here and the quality exceeded my expectations. The delivery was prompt, packaging was secure, and the product was exactly as described. The customer service team was very helpful throughout the process. Highly recommend this store for all your electronics needs!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Zainab</h3>
      </div>

      <div class="swiper-slide slide">
         <p>Best electronics store I've shopped from! Got a smartphone and smartwatch bundle deal. Both products are genuine and working perfectly. The prices are competitive and the return policy gives you peace of mind. The website is easy to navigate and checkout process is smooth. Will definitely shop again!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Ahmed</h3>
      </div>

      <div class="swiper-slide slide">
         <p>I'm really impressed with the quality of products and service. Ordered a camera for my photography hobby and it arrived in perfect condition. The product description was accurate and the images matched exactly. Customer support responded quickly to my queries. Great shopping experience overall!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Eman</h3>
      </div>

      <div class="swiper-slide slide">
         <p>Excellent store with authentic products! Purchased a TV and washing machine for my new home. Both items were delivered on time and installation support was provided. The products are working great and the warranty is valid. The prices are reasonable compared to other stores. Very satisfied with my purchase!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Moazzam</h3>
      </div>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js?v=<?php echo time(); ?>"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>