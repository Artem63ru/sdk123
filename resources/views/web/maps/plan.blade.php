@extends('web.layouts.app-map')
@section('title')
    Ситуационная карта
@endsection

@section('content')
    @if ($id == '1')
        @livewire('fs-map')
    @endif
@endsection
