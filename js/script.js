parallax = document.getElementsByClassName('parallax')[0]
city_front = document.getElementsByClassName('city-front')[0]
vh = document.documentElement.clientHeight * 0.65;
parallax.addEventListener('scroll', function (e) {
    city_front.style.height = `${1.5*parallax.scrollTop + vh}px `
})


var $carousel = $('.carousel').flickity({
    imagesLoaded: true,
    prevNextButtons: false,
    freeScroll: true,
    wrapAround: true,
    autoPlay: 2500,
    pauseAutoPlayOnHover: false

  });
  
  var $imgs = $carousel.find('.carousel-cell img');
  var docStyle = document.documentElement.style;
  var transformProp = typeof docStyle.transform == 'string' ?
    'transform' : 'WebkitTransform';
  var flkty = $carousel.data('flickity');
  
  $carousel.on( 'scroll.flickity', function() {
    flkty.slides.forEach( function( slide, i ) {
      var img = $imgs[i];
      var x = ( slide.target + flkty.x ) * -1/4;
      img.style[ transformProp ] = 'translateX(' + x  + 'px)';
    });
  });
  
  