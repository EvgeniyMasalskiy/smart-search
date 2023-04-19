@extends('layouts.app')

@section('title')
Новое оповещение
@endsection

@section('content')
<form action="{{route('distribution-form')}}" method="POST">
  @csrf
  <button type="submit" class="btn btn-success">Рассылка</button>
</form>

</html>
<form action="{{route('subscribe-form')}}" method="POST">
  @csrf

  <div class="form-group">
    <label for="email">Введите email</label>
    <input type="text" name="email" placeholder="email" class="form-control">
  </div>
  <div class="form-group">
    <label for="text">Введите текст</label>
    <input type="text" name="text" placeholder="text" class="form-control">
  </div>

  <input type="hidden" name="userId" class="form-control" value="{{ Auth::user()->id }}">

  <button type="submit" class="btn btn-success">Отправить</button>

</form>

@endsection