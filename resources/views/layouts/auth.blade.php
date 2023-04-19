@extends('layouts.app')

@section('title')
Контакты
@endsection

@section('content')
@include('layouts.navigation')

{{ $slot }}
@endsection