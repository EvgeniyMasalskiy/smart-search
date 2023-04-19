@extends('layouts.app')

@section('title')
Вход
@endsection

@section('content')
<div class="position-absolute top-50 start-50 translate-middle">

	<h4>Вход в БНТУ Умный Поиск</h4>
	<form method="POST" action="{{ route('login') }}">
		@csrf

		<!-- Email Address -->
		<div class="mt-4 align-self-start">
			<label for="email" class="form-label" :value="__('Email')">Электронная почта</label>
			<br>

			<input id="email" class="form-control" placeholder="Введите свою почту" type="email" name="email" :value="old('email')" required autofocus />
		</div>

		<!-- Password -->
		<div class="align-self-start mt-1">
			<label for="password" class="form-label" :value="__('Password')">Пароль</label>
			<br>

			<input id="password" class="form-control" placeholder="Введите пароль" type="password" name="password" required autocomplete="current-password" />
		</div>

		<!-- Remember Me -->
		<div class="block mt-4">
			<label for="remember_me" class="form-check-label">
				<input id="remember_me" type="checkbox" class="form-check-input" name="remember">

				Запомнить

			</label>
		</div>
		<div class="d-grid gap-2 col-12 mx-auto mt-4">
			<button type="submit" class="btn btn-success ">
				Вход
			</button>
		</div>
		<div class="d-grid gap-2 col-12 text-center mt-4">
			@if (Route::has('password.request'))
			<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
				Забыли пароль?
			</a>
			@endif


		</div>
	</form>
</div>


@endsection