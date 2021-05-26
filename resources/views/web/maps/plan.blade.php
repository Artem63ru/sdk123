@extends('web.layouts.app-map')
@section('title')
    Ситуационная карта
@endsection

@section('content')
    @if ($id == '1')
        @livewire('fs-map')
    @endif
    @if ($id == '3')
        @livewire('maps.u-p-p-g1')
    @endif
    @if ($id == '4')
        @livewire('maps.u-p-p-g2')
    @endif
    @if ($id == '5')
        @livewire('maps.u-p-p-g3')
    @endif
    @if ($id == '6')
        @livewire('maps.u-p-p-g4')
    @endif
    @if ($id == '7')
        @livewire('maps.u-p-p-g6')
    @endif
    @if ($id == '8')
        @livewire('maps.u-p-p-g9')
    @endif
    @if ($id == '9')
        @livewire('maps.uptr')
    @endif
@endsection
