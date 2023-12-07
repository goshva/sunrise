

// const hide_sidebar = document.getElementById('hide_sidebar');
let sidebar_middle_item_link = document.querySelectorAll(".sidebar_middle_item_link")
let sidebar_up_content_h3 = document.querySelector(".sidebar_up_content_h3");
let sidebar_up = document.querySelector('.sidebar_up')
let sidebar = document.querySelector('.sidebar')
let sidebar_bottom_content_image = document.querySelector(".sidebar_bottom_content_image")
let sect = document.querySelector('.sect')
// hide_sidebar.addEventListener("click", () => {
//     if(sidebar_up_content_h3){
//       if( sidebar_up_content_h3.style.display == "none"){
//         sidebar_up_content_h3.style = "display:block;"
//     }else{
//         sidebar_up_content_h3.style = "display:none;"
//     }
//     }
//     sect.classList.toggle("sect_small_sidebar")

//     sidebar_bottom_content_image.classList.toggle("sidebar_bottom_content_image_rotate")
//     sidebar.classList.toggle("sidebar_small");
//     if (hide_sidebar.innerHTML == "Свернуть") {
//         hide_sidebar.innerHTML = "Развернуть"
//     }else{
//       hide_sidebar.innerHTML = "Свернуть"
//     }
//     sidebar_middle_item_link.forEach((e)=>{
//         if( e.style.display == "none"){
//             e.style.display = "inline"
//         }else{
//             e.style.display = "none"
    
//         }
//     })
// })
/************* Hide Sidebar *************/
const menu_burger = document.getElementById("menu_burger");
menu_burger.addEventListener("click", () =>{
document.querySelector(".sidebar_fix").style = "left:0;"
document.body.classList.add("body-lock")
  document.querySelector(".sidebar_fix").classList.add("sidebar_show")
  
  
  document.addEventListener('click',(event) =>{
    const box = document.querySelector(".sidebar_fix")
  
    if (!box.contains(event.target) && event.target.id !== "menu_burger") {
    box.style = 'left:-500px'
document.body.classList.remove("body-lock")
}
  });
})
/************* Show Search input in mobile *************/



/************* Show Search input in mobile *************/

/************* Chart JS *************/

const plugin = {
    id: 'customCanvasBackgroundColor',
    beforeDraw: (chart, args, options) => {
      const {ctx} = chart;
      ctx.save();
      ctx.globalCompositeOperation = 'destination-over';
      ctx.fillStyle = options.color || '#99ffff';
      ctx.fillRect(0, 0, chart.width, chart.height);
      ctx.restore();
    }
  };


/************* Chart JS *************/

/************* Test Page Chart *************/
function ProfileOnclick() {
  document.getElementById("profile-onclick").classList.toggle("active");
}
function ProfileOnclickMedia() {
  document.getElementById("profile-onclick-media").classList.toggle("active");
}