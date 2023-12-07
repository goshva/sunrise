@extends('components.head')
@section('code')
<div class="sect">
    <x-client-side-bar></x-client-side-bar>
    <x-client-header></x-client-header>
    
    @livewire('client.test',['test'=>$test])
</div>
<x-footer></x-footer>

@endsection