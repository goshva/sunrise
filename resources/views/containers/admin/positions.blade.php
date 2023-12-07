@extends('components.head')
<link rel="stylesheet" href="{{ asset('/public/css/admin-positions.css') }}">
@section('code')
    <div class="sect"> 
        <x-admin-sidebar></x-admin-sidebar>
        <x-client-header></x-client-header>
        @livewire('admin.position')
    </div>
@endsection
