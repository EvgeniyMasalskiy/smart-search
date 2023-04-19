@extends('layouts.app')

@section('title')
Мои рассылки
@endsection

@section('content')
<?php

use App\Http\Controllers\ResourceController;

$date = ResourceController::getResource(Auth::user()->id);

$text = ' dsa';
?>
@foreach($date as $el)
<div class="form-check">
	<div class="row g-3">
		<div class="col-sm-11">
			<label class="form-check-label" for="exampleRadios1">
				<p class="item">
				<p class="title">
					<a href='{{$el["url"]}}'>{{$el["title"]}}<br></a>
				</p>

				{{$el["textUrl"]}}<br>
				{{$el["text"]}}<br>
				</p>
			</label>
		</div>
		<div class="col-sm-1">
			<form action="{{route('delete-resource-form')}}" method="POST">
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