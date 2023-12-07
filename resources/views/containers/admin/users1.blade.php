@extends('components.head')
<meta charset="utf-8">
<link rel="stylesheet" href="{{ asset("/public/css/users.css") }}">
@section('code')
<style>

    .sect{
        grid-template-rows:initial;
    }
    .progress{
        width: 50px;
        height: 50px;
        line-height: 50px;
        background: none;
        margin: 0 auto;
        box-shadow: none;
        position: relative;
    }
    .progress:after{
        content: "";
        width: 100%;
        height: 100%;
        border-radius: 50%;
        border: 5px solid #f2f5f5;
        position: absolute;
        top: 0;
        left: 0;
    }
    .progress > span{
        width: 50%;
        height: 100%;
        overflow: hidden;
        position: absolute;
        top: 0;
        z-index: 1;
    }
    .progress .progress-left{
        left: 0;
    }
    .progress .progress-bar{
        width: 100%;
        height: 100%;
        background: none;
        border-width: 5px;
        border-style: solid;
        position: absolute;
        top: 0;
    }
    .progress .progress-left .progress-bar{
        left: 100%;
        border-top-right-radius: 40px;
        border-bottom-right-radius: 40px;
        border-left: 0;
        -webkit-transform-origin: center left;
        transform-origin: center left;
    }
    .progress .progress-right{
        right: 0;
    }
    .progress .progress-right .progress-bar{
        left: -100%;
        border-top-left-radius: 40px;
        border-bottom-left-radius: 40px;
        border-right: 0;
        -webkit-transform-origin: center right;
        transform-origin: center right;
        animation: loading-1 1.8s linear forwards;
    }
    .progress .progress-value{
        width: 100%;
        height: 100%;
        font-size: 11px;
        color: #000;
        text-align: center;
        position: absolute;
    }
    .progress.blue .progress-bar{
        border-color: green;
    }
    .progress.blue .progress-left .progress-bar{
        animation: loading-2 1.5s linear forwards 1.8s;
    }
    .progress.yellow .progress-bar{
        border-color: #fdc426;
    }
    .progress.yellow .progress-left .progress-bar{
        animation: loading-3 1s linear forwards 1.8s;
    }
    .progress.pink .progress-bar{
        border-color: #f83754;
    }
    .progress.pink .progress-left .progress-bar{
        animation: loading-4 0.4s linear forwards 1.8s;
    }
    .progress.green .progress-bar{
        border-color: green;
    }
    .progress.green .progress-left .progress-bar{
        animation: loading-5 1.2s linear forwards 1.8s;
    }
    @media (max-width:700px){
    .user-popup_sectors{
        display: flex;
        flex-direction: column;

    }
    .user-popup_overlay{
        width: 100%;
        height: 100%;
    }

@media(max-width:1168px){
    .user-add_form,
    .user-btns{
        display: none;
    }
    .user-sec{
        display: block;
        margin-top: 40px;
    }

    .user-sector-flex{
        display: flex;
        gap: 20px;
        justify-content: space-between;
        align-items: center;
    }

    .user-sector-flex div h3{
        color: var(--gray-text, #343A40);

        font-family: Inter;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
    }

    .user-sector-flex div p{
        color: var(--gray-light-text, #8A92A6);

        font-family: Inter;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 16px;
    }

    .user-sector{
        display: flex;
        padding: 16px 12px;
        align-items: center;
        gap: 12px;
        align-self: stretch;
        border-bottom: 0.5px solid var(--gray-light-elements, #CFD1D8);
        /* background: #FFF; */
        box-shadow: 0px 2px 12px 0px rgba(35, 51, 63, 0.15);
        justify-content: space-between;  
        margin-bottom: 20px;
    }

    .user-content_sector{
        display: grid;
        grid-template-columns: minmax(60px,200px)  minmax(40px,200px)  minmax(60px,200px)  minmax(30px,200px)  minmax(50px,200px);
        gap: 50px;
        padding: 20px 0;
        text-align: start;
        align-items: center;
    }

    .user-title{
        font-size: 20px;
    }
.user-popup_content{
    width: 70%;
}
    .user-content{
        display: none;
    }

    .user{
        grid-area: main;
        gap: 20px;
        padding: 20px;
    }
}
}
</style>
<div class="sect">
    <x-admin-sidebar></x-admin-sidebar>
    <x-client-header></x-client-header>
            @livewire('admin.user-changes', ['locations'=>$locations])
@endsection