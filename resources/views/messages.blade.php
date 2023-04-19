@extends('layouts.app')

@section('title')
	Контакты
@endsection

@section('content')
	<a1>Сообщения</a1>
    @foreach($date as $el)
        <div class="alert alert-info">
            <h3>{{$el->email}}</h3>
            <h3>{{$el->text}}</h3>
            <a href=""><button>Подробнее</button></a>
        </div>
    @endforeach
@endsection