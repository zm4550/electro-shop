// Sundown Style - Orange Blob Animation with Shery.js
let cursorBall = document.querySelector('.cursor-ball');

if (cursorBall && typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
   gsap.registerPlugin(ScrollTrigger);

   // Initial animation
   gsap.from(cursorBall, {
      opacity: 0,
      scale: 0.5,
      x: 200,
      duration: 2,
      ease: 'power3.out'
   });

   // Parallax scroll effect
   gsap.to(cursorBall, {
      scrollTrigger: {
         trigger: 'body',
         start: 'top top',
         end: 'bottom bottom',
         scrub: 1.5
      },
      y: -300,
      rotation: 10,
      scale: 1.2,
      ease: 'none'
   });

   // Mouse parallax effect
   let mouseX = 0;
   let mouseY = 0;
   let ballX = 0;
   let ballY = 0;

   document.addEventListener('mousemove', (e) => {
      mouseX = (e.clientX / window.innerWidth - 0.5) * 200;
      mouseY = (e.clientY / window.innerHeight - 0.5) * 200;
   });

   function animateBlob() {
      ballX += (mouseX - ballX) * 0.05;
      ballY += (mouseY - ballY) * 0.05;
      
      gsap.set(cursorBall, {
         x: ballX,
         y: ballY
      });
      
      requestAnimationFrame(animateBlob);
   }
   animateBlob();
}

// Initialize Shery.js if available
if (typeof Shery !== 'undefined') {
   Shery.mouseFollower({
      skew: true,
      ease: "cubic-bezier(0.23, 1, 0.320, 1)",
      duration: 1
   });

   Shery.textAnimate(".heading", {
      style: 1,
      y: 10,
      delay: 0.1,
      duration: 0.8,
      ease: "cubic-bezier(0.23, 1, 0.320, 1)"
   });
}

// Wait for DOM and GSAP to load
document.addEventListener('DOMContentLoaded', function() {
   console.log('✅ Modern UI Script Loaded - Version 2.0');
   // GSAP Animation Library
   if (typeof gsap !== 'undefined') {
      console.log('✅ GSAP Library Loaded Successfully');
      // Register ScrollTrigger plugin
      if (typeof ScrollTrigger !== 'undefined') {
         gsap.registerPlugin(ScrollTrigger);
      }

      // Smooth scroll
      gsap.to('body', {
         scrollBehavior: 'smooth',
         duration: 0
      });

   // Page load animations
   gsap.from('.header', {
      y: -100,
      opacity: 0,
      duration: 0.8,
      ease: 'power3.out'
   });

   // Animate sections on scroll with text reveal
   gsap.utils.toArray('section').forEach((section, i) => {
      const headings = section.querySelectorAll('h1, h2, h3, .heading');
      
      // Animate section
      gsap.from(section, {
         scrollTrigger: {
            trigger: section,
            start: 'top 80%',
            toggleActions: 'play none none none'
         },
         opacity: 0,
         y: 50,
         duration: 1,
         delay: i * 0.1,
         ease: 'power3.out'
      });

      // Animate headings with split text effect
      headings.forEach((heading, j) => {
         gsap.from(heading, {
            scrollTrigger: {
               trigger: heading,
               start: 'top 85%',
               toggleActions: 'play none none none'
            },
            opacity: 0,
            y: 30,
            duration: 0.8,
            delay: j * 0.1,
            ease: 'power2.out'
         });
      });
   });

   // Animate product cards with stagger
   gsap.utils.toArray('.products .box-container .box, .home-products .slide').forEach((card, i) => {
      gsap.from(card, {
         scrollTrigger: {
            trigger: card,
            start: 'top 85%',
            toggleActions: 'play none none none'
         },
         opacity: 0,
         y: 50,
         scale: 0.9,
         duration: 0.8,
         delay: i * 0.05,
         ease: 'power3.out'
      });

      // Hover animation
      card.addEventListener('mouseenter', () => {
         gsap.to(card, {
            scale: 1.02,
            duration: 0.3,
            ease: 'power2.out'
         });
      });
      card.addEventListener('mouseleave', () => {
         gsap.to(card, {
            scale: 1,
            duration: 0.3,
            ease: 'power2.out'
         });
      });
   });

   // Animate category slides
   gsap.utils.toArray('.category .slide').forEach((slide, i) => {
      gsap.from(slide, {
         scrollTrigger: {
            trigger: slide,
            start: 'top 85%',
            toggleActions: 'play none none none'
         },
         opacity: 0,
         scale: 0.8,
         duration: 0.6,
         delay: i * 0.1,
         ease: 'back.out(1.7)'
      });
   });

   // Animate dashboard boxes
   gsap.utils.toArray('.dashboard .box-container .box').forEach((box, i) => {
      gsap.from(box, {
         opacity: 0,
         y: 30,
         duration: 0.6,
         delay: i * 0.1,
         ease: 'power2.out'
      });
   });

   // Animate buttons on hover with orange effect
   document.querySelectorAll('.btn, .option-btn, .delete-btn').forEach(btn => {
      btn.addEventListener('mouseenter', () => {
         gsap.to(btn, {
            scale: 1.05,
            duration: 0.3,
            ease: 'power2.out'
         });
      });
      btn.addEventListener('mouseleave', () => {
         gsap.to(btn, {
            scale: 1,
            duration: 0.3,
            ease: 'power2.out'
         });
      });
   });

   // Unique Hero Section Animations
   const heroTitle = document.querySelectorAll('.title-line');
   const heroImage = document.querySelector('.hero-main-image');
   const floatingCards = document.querySelectorAll('.floating-card');
   const stats = document.querySelectorAll('.stat-number');

   // Animate title lines with stagger
   if (heroTitle.length > 0) {
      gsap.from(heroTitle, {
         scrollTrigger: {
            trigger: '.hero-title',
            start: 'top 80%',
            toggleActions: 'play none none none'
         },
         y: 100,
         opacity: 0,
         duration: 1.2,
         stagger: 0.2,
         ease: 'power3.out'
      });
   }

   // Animate hero image
   if (heroImage) {
      gsap.from(heroImage, {
         scrollTrigger: {
            trigger: heroImage,
            start: 'top 80%',
            toggleActions: 'play none none none'
         },
         scale: 0.8,
         opacity: 0,
         duration: 1.5,
         ease: 'power3.out'
      });

      // Parallax on scroll
      gsap.to(heroImage, {
         scrollTrigger: {
            trigger: '.hero-image-wrapper',
            start: 'top top',
            end: 'bottom top',
            scrub: 1
         },
         y: -100,
         ease: 'none'
      });
   }

   // Animate floating cards
   floatingCards.forEach((card, i) => {
      gsap.from(card, {
         scrollTrigger: {
            trigger: card,
            start: 'top 90%',
            toggleActions: 'play none none none'
         },
         x: i % 2 === 0 ? -50 : 50,
         opacity: 0,
         duration: 1,
         delay: i * 0.2,
         ease: 'power3.out'
      });

      // Floating animation
      gsap.to(card, {
         y: -20,
         duration: 2 + i * 0.5,
         repeat: -1,
         yoyo: true,
         ease: 'power1.inOut'
      });
   });

   // Counter animation for stats
   stats.forEach(stat => {
      const target = parseInt(stat.getAttribute('data-count'));
      const duration = 2;
      
      gsap.from(stat, {
         scrollTrigger: {
            trigger: stat,
            start: 'top 90%',
            toggleActions: 'play none none none'
         },
         textContent: 0,
         duration: duration,
         ease: 'power2.out',
         snap: { textContent: 1 },
         onUpdate: function() {
            stat.textContent = Math.ceil(this.targets()[0].textContent);
         }
      });
   });

   // Parallax effect for hero section
   const heroSection = document.querySelector('.home-bg');
   if (heroSection) {
      gsap.to(heroSection, {
         scrollTrigger: {
            trigger: heroSection,
            start: 'top top',
            end: 'bottom top',
            scrub: true
         },
         y: 100,
         ease: 'none'
      });
   }
   } else {
      console.warn('GSAP library not loaded. Animations disabled.');
   }
});

// Navbar and Profile Toggle - Run immediately
let navbar = document.querySelector('.header .flex .navbar');
let profile = document.querySelector('.header .flex .profile');

// Set active navigation link based on current page
const currentPage = window.location.pathname.split('/').pop() || 'home.php';
const navLinks = document.querySelectorAll('.navbar a, .navbar .nav-link');
navLinks.forEach(link => {
   const href = link.getAttribute('href');
   if (href === currentPage || (currentPage === '' && href === 'home.php')) {
      link.classList.add('active');
   }
});

if (document.querySelector('#menu-btn')) {
   document.querySelector('#menu-btn').onclick = () =>{
      navbar.classList.toggle('active');
      profile.classList.remove('active');
   }
}

if (document.querySelector('#user-btn')) {
   document.querySelector('#user-btn').onclick = () =>{
      profile.classList.toggle('active');
      navbar.classList.remove('active');
   }
}

window.onscroll = () =>{
   if (navbar) navbar.classList.remove('active');
   if (profile) profile.classList.remove('active');
}

// Ensure navigation links are clickable
navLinks.forEach(link => {
   link.style.pointerEvents = 'auto';
   link.style.cursor = 'pointer';
   link.addEventListener('click', function(e) {
      // Allow navigation
      this.style.pointerEvents = 'auto';
   });
});

// Quick View Image Switcher
let mainImage = document.querySelector('.quick-view .box .row .image-container .main-image img');
let subImages = document.querySelectorAll('.quick-view .box .row .image-container .sub-image img');

if (mainImage && subImages.length > 0) {
   subImages.forEach(images =>{
      images.onclick = () =>{
         if (typeof gsap !== 'undefined') {
            gsap.to(mainImage, {
               opacity: 0,
               scale: 0.9,
               duration: 0.2,
               onComplete: () => {
                  mainImage.src = images.getAttribute('src');
                  gsap.to(mainImage, {
                     opacity: 1,
                     scale: 1,
                     duration: 0.3
                  });
               }
            });
         } else {
            mainImage.src = images.getAttribute('src');
         }
      }
   });
}

// Theme Toggle Functionality - Run after DOM loads
document.addEventListener('DOMContentLoaded', function() {
   const themeToggle = document.querySelector('#theme-toggle');
   const html = document.documentElement;

   // Check for saved theme preference or default to light mode
   const currentTheme = localStorage.getItem('theme') || 'light';
   html.setAttribute('data-theme', currentTheme);

   if (themeToggle) {
   // Update icon based on current theme
   if (currentTheme === 'dark') {
      themeToggle.classList.remove('fa-moon');
      themeToggle.classList.add('fa-sun');
   }

   themeToggle.addEventListener('click', () => {
      const currentTheme = html.getAttribute('data-theme');
      const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
      
      html.setAttribute('data-theme', newTheme);
      localStorage.setItem('theme', newTheme);
      
      // Animate theme change
      if (typeof gsap !== 'undefined') {
         gsap.to('body', {
            opacity: 0.8,
            duration: 0.2,
            onComplete: () => {
               gsap.to('body', {
                  opacity: 1,
                  duration: 0.3
               });
            }
         });
      }
      
      // Update icon
      if (newTheme === 'dark') {
         themeToggle.classList.remove('fa-moon');
         themeToggle.classList.add('fa-sun');
      } else {
         themeToggle.classList.remove('fa-sun');
         themeToggle.classList.add('fa-moon');
      }
   });
   }
});