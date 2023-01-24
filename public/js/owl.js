$(".owl-carousel").owlCarousel({
  loop: true,
  center: true,
  items: 1,
  nav: false,
  margin: 20,
  autoplay: false,
  dots: false,
  autoplayTimeout: 5000,
  smartSpeed: 450,
  responsive: {
    0: {
      items: 1,
    },
    768: {
      items: 2,
    },
    1170: {
      items: 3,
    },
  },
});