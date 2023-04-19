@extends('layouts.app')

@section('title')
Мои рассылки
@endsection

@section('content')
<?php

use App\Http\Controllers\SubscriberController;

$date = SubscriberController::getSubscriber(Auth::user()->id);

$text = ' dsa';
?>
@foreach($date as $el)
<div class="form-check">
	<div class="row g-3">
		<div class="col-sm-11">
			<label class="form-check-label" for="exampleRadios1">
				{{$el->text}}---
				{{$el->email}}
			</label>
		</div>
		<div class="col-sm-1">
			<form action="{{route('delete-subscriber-form')}}" method="POST">
				@csrf
				@method('DELETE')
				<input type="hidden" name="id" value="{{$el->id}}">
				<button type="submit" class="btn btn-outline-success "></button>
			</form>
		</div>
	</div>
</div>
@endforeach

@endsection