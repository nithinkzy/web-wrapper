var myCarousel = document.querySelector('#carouselExampleDark')
var carousel = new bootstrap.Carousel(myCarousel, {
  interval: 2000,
  wrap: false
})

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
});