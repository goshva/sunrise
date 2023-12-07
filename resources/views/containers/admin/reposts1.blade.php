@extends('components.head')
@section('code')
<link rel="stylesheet" href="{{ asset("public/css/users.css") }}">
<div class="sect">
    <style>
        .newrepost-content_section-up p{
        font-size: 11px;
        }
        .user_graphic_hrs{
            transform: rotate(90deg); position: absolute;right: -150px; z-index: 5;top:150px;
        }
        @media (max-width:2000px){
            #user_graphic_hrs_first {
                transform: rotate(90deg); position: absolute;right: -190px; z-index: 5;
            }
            #user_graphic_hrs_second{
                transform: rotate(90deg); position: absolute;right: -175px; z-index: 5;
            }
            #user_graphic_hrs_third{
                transform: rotate(90deg); position: absolute;right: -175px; z-index: 5;
            }
        }
    
    </style>
    <x-admin-sidebar></x-admin-sidebar>
    <x-client-header></x-client-header>

    <div class="new_reposts">
        @livewire('admin.new-repost')
    </div>
 

    <x-footer></x-footer>
</div>
<script>
function openStats(id){

    setTimeout(() => {
    console.log(document.getElementById("second"+id).parentElement.parentElement.offsetHeight + "  " +id);
    const user_graphic_hrs = document.querySelectorAll(".user_graphic_hrs"+id);
    user_graphic_hrs.forEach(e=>{
    e.classList.toggle("active");
    e.width = (document.getElementById("second"+id).parentElement.parentElement.offsetHeight-30)
    console.log(document.getElementById("second"+id).parentElement.parentElement.offsetHeight)
    const elem = document.getElementById("second" + id);
const parentHeight = elem.parentElement.parentElement.offsetHeight;

if (parentHeight > 400) {
  e.style.cssText = `top: ${parentHeight - 320}px; right: -${e.width-240}px`;
} else {
    e.style.cssText = `top: ${parentHeight - 240}px;right: -${e.width-155}px`;
}

    })
    }, 100);

    document.getElementById("second"+id).classList.toggle("active");
    document.getElementById("secondIcon"+id).classList.toggle("active");
}
</script>

@endsection