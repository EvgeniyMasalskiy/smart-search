<button class="btn btn-outline-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Профиль</button>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header text-center">
  <h3 id="offcanvasRightLabel" class="text-center"></h3>  
  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
  </div>
  <div class="offcanvas-body text-center">
    <h3 class="text-center">{{ Auth::user()->name }}</h3>
    <hr>
    <a href="/user" class="nav-link text-muted" aria-current="page">Мой профиль</a></li>
    <a href="/lib" class="nav-link text-muted">Моя библиотека</a></li>
    <a href="/view-spam" class="nav-link text-muted">Мои оповещения</a></li>
    <hr>
    <a href="/search" class="nav-link text-muted">Поиск</a></li>
    <a href="/spam" class="nav-link text-muted">Новые оповещения</a></li>
    <hr>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <a href="#" class="nav-link text-muted" onclick="event.preventDefault();
                                                this.closest('form').submit();">
        Выход
      </a>
    </form>
    <hr>
    <a href="#" class="nav-link text-muted">Конфиденциальность</a></li>
    <a href="#" class="nav-link text-muted">Справка</a></li>
  </div>
</div>