// var myCarousel = document.querySelector('#carouselExampleDark')
// var carousel = new bootstrap.Carousel(myCarousel, {
//   interval: 2000,
//   wrap: false
// })

jQuery(document).ready(function ($) {
  // Check if the window has been scrolled


  var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

});
    // Function to close the mobile menu when the close button is clicked
    $(".close-btn, .overlay").click(function() {
      $(".overlay, .mobile-menu").removeClass("active");
  });

  // Function to open the mobile menu when the menu button is clicked
  $(".navbar-toggler").click(function() {
      $(".overlay, .mobile-menu").addClass("active");
  });
// // 1. Register ScrollTrigger plugin
// gsap.registerPlugin(ScrollTrigger);

// // 2. Character animation for each element with class 'reveal-type'
// const splitTypes = document.querySelectorAll('.reveal-type');
// splitTypes.forEach((char, i) => {
//   const text = new SplitType(char, { types: 'chars' });

//   // Use the onComplete callback to trigger the timeline after SplitType animation completes
//   gsap.from(text.chars, {
//     scrollTrigger: {
//       trigger: char,
//       start: 'bottom 80%',
//       end: 'top 50%',
//       scrub: true,
//       markers: false
//     },
//     scaleY: 0,
//     y: -20,
//     transformOrigin: 'top',
//     opacity: 0.2,
//     stagger: 0.1,
//     onComplete: () => {
//       // 3. Create a timeline (tl) for additional animations after SplitType animations finish
//       let tl = gsap.timeline({
//         scrollTrigger: {
//           trigger: '.trust-factors',
//           start: 'top 80%',
//           end: 'bottom center',
//           scrub: true,
//           markers: true,
//         }
//       });

//       // 4. Add animation to the timeline for the element with class 'trust-factors'
//       tl.fromTo('.trust-factors', {
//         opacity: 0
//       },
//         {
//           opacity: 1
//         });
//     }
//   });
// });






// smooth scroll
// const lenis = new Lenis()

// lenis.on('scroll', (e) => {
//   // console.log(e)
// })

// function raf(time) {
//   lenis.raf(time)
//   requestAnimationFrame(raf)
// }

// requestAnimationFrame(raf)

