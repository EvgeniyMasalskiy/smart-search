<?php

use App\Http\Controllers\ResourceController;

$date = ResourceController::getResource(Auth::user()->id);

$text=' dsa';
?>
<script>
function saveRes3() {
	id = 2
		if (document.getElementById('div' + id) != null) {
			
			text =  document.getElementById('div' + id).textContent;
			$text = text;
			return text;
		}
	}
</script>
<!-- Модальное окно -->
<div class="modal fade" id="exampleModal3" tabindex="-2" aria-labelledby="exampleModal2Label" aria-hidden="true">
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
							<input class="form-check-input" type="radio" name="exampleRadios" id="{{$el->id}}" value="option1" value="" onclick="document.getElementById('groupId').value = '{{$el->id}}' " checked>
							<label class="form-check-label" for="exampleRadios1">
								{{$el->date}} 
								{{$el->groupId}}
							</label>
							<button type="submit" class="btn btn-outline-success" onclick="document.getElementById('texthold').value = saveRes2() "></button>
						</div>
						<div class="col-sm-1">
							<form action="{{route('resource-group-form')}}" method="POST">
								@csrf
								@method('DELETE')
								<input type="hidden" name="id" value="{{$el->id}}">
								<button type="submit" class="btn btn-outline-success "></button>
							</form>
						</div>
					</div>
				</div>
				@endforeach
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отменить</button>

				<form action="{{route('add-resource-form')}}" method="POST">
					@csrf
					
					<input type="text" name="date" id="texthold" class="form-control" value="">

					<input type="text" name="groupId" id="groupId" class="form-control" value="">

					<input type="hidden" name="userId" class="form-control" value="{{ Auth::user()->id }}">

					<button type="submit" class="btn btn-outline-success">Готово</button>
				</form>
			</div>

		</div>
	</div>
</div>