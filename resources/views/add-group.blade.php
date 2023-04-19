@extends('layouts.app')

@section('title')
Контакты
@endsection

@section('content')

<a1>Это страница о нас но с номером</a1>

@if($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif
<form action="{{route('add-group-form')}}" method="POST">
	@csrf

	<div class="form-group">
		<label for="Name">Введите группу</label>
		<input type="text" name="Name" placeholder="Name" class="form-control">
	</div>

	<input type="hidden" name="userId" class="form-control" value="{{ Auth::user()->id }}">

	<button type="submit" class="btn btn-success">Отправить</button>
</form>
@endsection