@extends('layouts.app')

@section('title')
Мои рассылки
@endsection

@section('content')

Имя - {{ Auth::user()->name }}<br>
Почта - {{ Auth::user()->email}}<br>
Работа - {{ Auth::user()->job }}<br>
Страна - {{ Auth::user()->country }}<br>
Статус - {{ Auth::user()->status }}<br>


@endsection