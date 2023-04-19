@extends('layouts.app')

@section('title')
Новое оповещение
@endsection

@section('content')
<form class="row g-3">
  <div class="col-6"></div>
  <div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">

        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="btn btn-link active" aria-current="true" aria-label="Slide 1">Личные данные</button><br>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" class="btn btn-link" aria-label="Slide 2">Выберите пароль</button><br>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" class="btn btn-link" aria-label="Slide 3">О себе</button><br>

      </div>

      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div id="carouselExampleDark" class="carousel carousel-dark carousel-fade col-md-10 mx-auto col-lg-5" data-bs-ride="carousel">

          <div class="carousel-inner">

            <div class="carousel-item active">

              <!-- Name -->
              <div class="mt-4 align-self-start">
                <label for="name" class="form-label" :value="__('Name')">Имя</label>
                <br>

                <input id="name" class="form-control" placeholder="Введите имя" type="name" name="name" :value="old('name')" required autofocus />
              </div>
              <!-- Email Address -->
              <div class="mt-4 align-self-start">
                <label for="email" class="form-label" :value="__('Email')">Электронная почта для подтверждения</label>
                <br>

                <input id="email" class="form-control" placeholder="Введите почту" type="email" name="email" :value="old('email')" required />
              </div>
              <div class="d-grid gap-2 col-12 mx-auto mt-4">
                <button class="btn btn-success" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                  Продолжить
                </button>
              </div>
            </div>

            <div class="carousel-item">


              <!-- Password -->
              <div class="mt-4 align-self-start">
                <label for="password" class="form-label" :value="__('Password')">Пароль</label>
                <br>

                <input id="password" class="form-control" placeholder="Введите почту" type="password" name="password" :value="old('email')" required autocomplete="new-password" />
              </div>
              <!-- Confirm Password -->
              <div class="mt-4 align-self-start">
                <label for="password_confirmation" class="form-label" :value="__('Confirm Password')">Подтвердите пароль</label>
                <br>

                <input id="password_confirmation" class="form-control" placeholder="Введите почту" type="password" name="password_confirmation" required />
              </div>

              <div class="d-grid gap-2 col-12 mx-auto mt-4">
                <button class="btn btn-success" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                  Продолжить
                </button>
              </div>

            </div>
            <div class="carousel-item">


              <!-- Country -->
              <div class="mt-4 align-self-start">
                <label for="country" class="form-label" :value="__('country')">Место работы</label>
                <br>

                <input id="country" class="form-control" placeholder="Введите место работы" type="password" name="country" :value="old('country')" required autofocus />
              </div>

              <!-- Job -->
              <div class="mt-4 align-self-start">
                <label for="job" class="form-label" :value="__('job')">Место работы</label>
                <br>

                <input id="job" class="form-control" placeholder="Введите место работы" type="password" name="job" :value="old('job')" required autofocus />
              </div>

              <!-- Status -->
              <div>
                <div class="mt-4 align-self-start">
                  <label for="status" class="form-label" :value="__('status')">Статус</label>
                  <br>

                  <input id="status" class="form-control" placeholder="Введите статус" type="password" name="status" :value="old('status')" required autofocus />
                </div>
                <div class="flex items-center justify-end mt-4">


                  <div class="d-grid gap-2 col-12 mx-auto mt-4">
                    <button type="submit" class="btn btn-success ">
                      Продолжить
                    </button>
                  </div>
                </div>
              </div>


      </form>
    </div>
  </div>

  @endsection