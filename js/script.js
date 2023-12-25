parallax = document.getElementsByClassName('parallax')[0]
    city_front = document.getElementsByClassName('city-front')[0]
    vh = document.documentElement.clientHeight * 0.65;
    parallax.addEventListener('scroll', function(e) {
        console.log(parallax.scrollTop);
        city_front.style.height = ${2*parallax.scrollTop+ vh}px 
    })
