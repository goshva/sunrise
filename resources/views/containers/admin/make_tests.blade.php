@extends('components.head')
<link rel="stylesheet" href="{{ asset('/public/css/admin-tests-create.css') }}">
@section('code')
    <div class="sect">
        <x-admin-sidebar></x-admin-sidebar>
        <x-client-header></x-client-header>
        @livewire('admin.tests')
        <x-footer></x-footer>
    </div>
@endsection
