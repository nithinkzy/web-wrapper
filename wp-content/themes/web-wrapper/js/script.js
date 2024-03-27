// var myCarousel = document.querySelector('#carouselExampleDark')
// var carousel = new bootstrap.Carousel(myCarousel, {
//   interval: 2000,
//   wrap: false
// })

jQuery(document).ready(function ($) {
  // Check if the window has been scrolled
  $(window).scroll(function () {
    // Add class 'fixed-top' to the navbar when scrolling down
    if ($(this).scrollTop() > 50) {
      $('.navbar').addClass('fixed-top');
    } else {
      // Remove the 'fixed-top' class when scrolling back to the top
      // $('.navbar').toggleClass('bg-dark');
      $('.navbar').removeClass('fixed-top');
    }
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






});
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

