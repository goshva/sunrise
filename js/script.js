parallax = document.getElementsByClassName('parallax')[0]
city_front = document.getElementsByClassName('city-front')[0]
vh = document.documentElement.clientHeight * 0.65;
parallax.addEventListener('scroll', function (e) {
	city_front.style.height = `${1.5 * parallax.scrollTop + vh}px `
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

$carousel.on('scroll.flickity', function () {
	flkty.slides.forEach(function (slide, i) {
		var img = $imgs[i];
		var x = (slide.target + flkty.x) * -1 / 4;
		img.style[transformProp] = 'translateX(' + x + 'px)';
	});
});

function feedback(action, status) {
	//
	let token =
		"5430048154:AAEFptLp8IdbKirOYJzzM3ekyTd2ibVLMNc"; /* :TODO NOTSECURITY REWERITE */
	//use this for testing
	let chat_id = "190404167";
	//let chat_id = "1329475336";//Aram ID
	//use this for production
	//let chat_id = "-915348868";
	let user_phone = prompt("Введите телефон чтоб уточнить удобное время,🙏 ");
	var msg = `Gravitalik:${action} от ${user_phone}`; // from ${getCookie("@")}`;
	var url = `https://api.telegram.org/bot${token}/sendMessage?chat_id=${chat_id}&text=${msg}&parse_mode=html`;
	if (user_phone !== "" && user_phone !== null) {
		fetch(url)
			.then((response) => {
				return response.json();
			})
			.then((data) => {
				alert(
					`Выходим на связь \nCейчас перезвоним` // «${action}».  Сейчас оплата запустится`
				);
				window.location.href = "/#menu";
			});
	} else {
	}
}

$('.lead').click(
	function () { this.addEventListener("click", feedback(this.innerHTML)) }
);
