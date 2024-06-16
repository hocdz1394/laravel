setupCarousel("#owl-carousel1", true, false, 10, 4, 1, 2, 3, 4);
setupCarousel("#owl-carousel2", false, false, 20, 3, 1, 2, 2, 3);
setupCarousel("#owl-carousel3", true, false, 10, 5, 2, 2, 3, 5);
setupCarousel("#owl-carousel4", false, false, 20, 4, 0, 2, 3, 4);
setupCarousel("#owl-carousel5", false, false, 10, 5, 2, 2, 3, 5);
setupCarousel("#owl-carousel6", false, false, 10, 5, 2, 2, 3, 4);
setupCarousel("#owl-carousel7", false, false, 20, 3, 1, 2, 2, 3);
setupCarousel("#owl-carousel8", true, false, 0, 1, 1, 1, 1, 1);
setupCarousel("#owl-carousel9", false, false, 10, 3, 2, 2, 3, 3);
setupCarousel("#owl-carousel10", false, false, 20, 3, 1, 2, 2, 3);
setupCarousel("#owl-carousel11", false, false, 20, 4, 2, 2, 3, 4);

function setupCarousel(key, autoplay, nav, mr, numItems, sm, md, lg, xl) {
  $(key).owlCarousel({
    loop: true,
    autoplay: autoplay, //true
    nav: nav, //true/false
    margin: mr,
    items: numItems,
    sm,
    md,
    lg,
    xl,
    dots: false,
    responsive: {
      0: {
        items: sm,
      },
      768: {
        items: md,
      },
      992: {
        items: lg,
      },
      1200: {
        items: xl,
      },
    },
  });
}
