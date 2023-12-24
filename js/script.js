// страница состоит из нескольких контейнеров и параграфа для вывода прогресса
let p = document.querySelector('site1_name')
// n - количество просмотренных контейнеров
let n = 0

let observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if(entry.isIntersecting){
            // observer наблюдает за div
            // и сообщает об увеличении количества просмотренных контейнеров
            // выводим эту информацию в параграф
            console.log( `${n++} div viewed`)
            if (n >= 8) {
                document.getElementsByClassName('parallax')[0].classList.add('stop-scrolling');

            }
            observer.unobserve(entry.target)
        }
    })
}, {threshold: 0.9})

document.querySelectorAll('.layer').forEach(div => observer.observe(div))

