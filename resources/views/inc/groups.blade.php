<?php

use App\Http\Controllers\GroupController;

$date = GroupController::getGroup(Auth::user()->id);

$text = ' dsa';
?>
<script>
	function saveResWithId() {


		var node = document.getElementById('div' + document.getElementById('divId').textContent),

			htmlContent = node.innerHTML,
			// htmlContent = "Some <span class="foo">sample</span> text."

			textContent = node.textContent;
		// textContent = "Some sample text."

		document.getElementById('title').value = node.querySelectorAll("div.gs-title")[0].textContent;
		document.getElementById('textUrl').value = node.getElementsByClassName("gs-bidi-start-align gs-visibleUrl gs-visibleUrl-short")[0].textContent;
		document.getElementById('url').value = node.getElementsByClassName("gs-bidi-start-align gs-visibleUrl gs-visibleUrl-long")[0].textContent;
		document.getElementById('text').value = node.getElementsByClassName("gs-bidi-start-align gs-snippet")[0].textContent;
	}
</script>
<!-- Модальное окно -->
<div class="modal fade" id="exampleModal2" tabindex="-2" aria-labelledby="exampleModal2Label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModal2Label">Сохранено вашей библиотеке</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
			</div>
			<div class="modal-body">

				@foreach($date as $el)
				<div class="form-check">
					<div class="row g-3">
						<div class="col-sm-11">
							<input class="form-check-input" type="radio" name="exampleRadios" id="{{$el->id}}" value="option1" value="" onclick="document.getElementById('groupId').value = '{{$el->id}}' ">
							<label class="form-check-label" for="exampleRadios1">
								{{$el->name}}

							</label>
						</div>
						<div class="col-sm-1">
							<form action="{{route('delete-group-form')}}" method="POST">
								@csrf
								@method('DELETE')
								<input type="hidden" name="id" value="{{$el->id}}">
								<button type="submit" class="btn btn-outline-success "></button>
							</form>
						</div>
					</div>
				</div>
				@endforeach
				<p>
				<div id="saveRes"></div>
				<button class=" btn btn-outline-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAddGroup" aria-expanded="false" aria-controls="collapseExample">
					Добавить группу
				</button>
				</p>
				<div class="collapse" id="collapseAddGroup">


					<form action="{{route('add-group-form')}}" method="POST">
						@csrf

						<div class="form-group">
							<label for="Name">Введите группу</label>
							<input type="text" name="Name" placeholder="Name" class="form-control">
						</div>

						<input type="hidden" name="userId" class="form-control" value="{{ Auth::user()->id }}">

						<button type="submit" class="btn btn-success">Отправить</button>
					</form>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отменить</button>

				<form action="{{route('add-resource-form')}}" method="POST">
					@csrf

					<input type="hidden" name="title" id="title" class="form-control" value="">
					<input type="hidden" name="textUrl" id="textUrl" class="form-control" value="">
					<input type="hidden" name="url" id="url" class="form-control" value="">
					<input type="hidden" name="text" id="text" class="form-control" value="">
					<input type="hidden" name="groupId" id="groupId" class="form-control" value="">

					<input type="hidden" name="userId" class="form-control" value="{{ Auth::user()->id }}">

					<button type="submit" class="btn btn-outline-success">Готово</button>
				</form>
			</div>

		</div>
	</div>
</div>