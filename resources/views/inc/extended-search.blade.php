<!-- Модальное окно -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Расширенный Поиск</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3">
          <div class="col-12">
            <label for="all_text" class="form-label">Содрежит:</label>
            <input type="text" class="form-control" id="all_text" placeholder="Все эти слова">
          </div>
          <div class="col-12">
            <input type="text" class="form-control" id="exact_text" placeholder="Точная фраза">
          </div>
          <div class="col-12">
            <input type="text" class="form-control" id="least_one_text" placeholder="Любое из этих слов">
          </div>
          <div class="col-12">
            <input type="text" class="form-control" id="no_one_text" placeholder="Любое из этих слов">
          </div>
          <div class="col-6">
            <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
            <label class="btn btn-outline-success" for="success-outlined">В любом месте</label>
          </div>
          <div class="col-6">
            <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
            <label class="btn btn-outline-success" for="danger-outlined">В заголовке статьи</label>
          </div>
          <div class="col-12">
            <label for="author_text" class="form-label">Aвторы</label>
            <input type="text" class="form-control" id="author_text" placeholder="Статьи этих авторов">
          </div>
          <div class="col-12">
            <label for="edithen_text" class="form-label">Издания</label>
            <input type="text" class="form-control" id="edithen_text" placeholder="Статьи этих авторов">
          </div>
          <div class="col-12">
            <label class="form-label">Период</label>
          </div>
          <div class="col-6">
            <input type="text" class="form-control" id="first_date" placeholder="От года">
          </div>
          <div class="col-6">
            <input type="text" class="form-control" id="last_date" placeholder="До года">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <form action="search" method="get">
          <input type="hidden" name="q" id="search" value="">
          <input type="submit" class="btn btn-primary" onclick="document.getElementById('search').value = extendSearch()" value="Поиск" />
        </form>

      </div>
    </div>
  </div>
</div>