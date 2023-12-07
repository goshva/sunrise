@extends('components.head')
<link rel="stylesheet" href="{{ asset("public/css/chat.css") }}">
<link rel="stylesheet" href="{{ asset("public/css/admin-chat.css") }}">
@section('code')
    <div class="sect">
               <x-admin-sidebar></x-admin-sidebar>
                <x-client-header></x-client-header>
               @livewire('chat-main')
</div>
@endsection