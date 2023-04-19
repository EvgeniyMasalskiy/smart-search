@extends('layouts.app')

@section('title')
Search
@endsection
@section('header-content')
<input type="text" class="form-control" id="selected_text" value=<?php if (isset($_GET["q"])) {
																		$data = $_GET["q"];
																		echo  $data;
																	}
																	?> />
@endsection

<script>
	function dateM(month) {
		somedate = new Date();

		if (month > somedate.getMonth()) {
			month = month - somedate.getMonth();
			somedate.setFullYear(somedate.getFullYear() - 1, 12 - month, 1);
		} else somedate.setMonth(somedate.getMonth() - month, 1);
		return somedate.getMonth() + 1 + " " + somedate.getFullYear();
	}

	function extendSearch() {
		result = "";
		all_text = document.getElementById('all_text').value;
		exact_text = document.getElementById('exact_text').value;
		no_one_text = document.getElementById('no_one_text').value;
		author_text = document.getElementById('author_text').value;
		edithen_text = document.getElementById('edithen_text').value;
		first_date = document.getElementById('first_date').value;
		last_date = document.getElementById('last_date').value;

		if (all_text != "") result += "" + all_text + ' ';
		if (exact_text != "") result += '"' + exact_text + ' ';
		if (no_one_text != "") result += "-" + no_one_text + ' ';
		if (author_text != "") result += 'allinpostauthor:' + author_text + ' ';
		if (edithen_text != "") result += edithen_text + ' ';
		if (first_date != "") result += '+after:' + first_date + ' ';
		if (last_date != "") result += '+before:' + last_date + ' ';

		return result;
	}

	function saveRes(id) {
		document.getElementById("divId").textContent = id;
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

@section('content')
<div class="row">
	<div class="col-3">
		<div>
			<label>Период</label>
			<div class="form-check">
				<input id="layout-single" class="form-check-input" type="radio" name="layout" checked onclick="document.getElementById('date').value = ' +after:'+dateM(0)" />
				<label class="form-check-label" for="layout-single">За все время</label>
			</div>

			<div class="form-check">
				<input id="layout-1" class="form-check-input" type="radio" name="layout" onclick="document.getElementById('date').value = ' +after:'+dateM(1)" />
				<label class="form-check-label" for="layout-1">Месяц</label>
			</div>

			<div class="form-check">
				<input id="layout-2" class="form-check-input" type="radio" name="layout" onclick="document.getElementById('date').value = ' +after:'+dateM(3) " />
				<label class="form-check-label" for="layout-2">3 месяца</label>
			</div>

			<div class="form-check">
				<input id="layout-3" class="form-check-input" type="radio" name="layout" onclick="document.getElementById('date').value = ' +after:'+dateM(6) " />
				<label class="form-check-label" for="layout-3">Полгода</label>
			</div>

			<div class="form-check">

				<input id="layout-4" class="form-check-input" type="radio" name="layout" onclick="document.getElementById('date').value = ' +after:'+dateM(12) " />
				<label class="form-check-label" for="layout-4">Год</label>
			</div>

			<div class="form-check">
				<input id="layout-5" class="form-check-input" type="radio" name="layout" onclick="document.getElementById('date').value = ' + after:' +document.getElementById('after').value +'+ before:'+ document.getElementById('before').value" />
				<label class="form-check-label" for="layout-5">
					Свой период
				</label>
				<br>
				<label class="form-check-label">
					C<input for="layout-t" type="text" id="after" value="2002" size="1" width="1" />
					по <input for="layout-t" type="text" id="before" value="2023" size="1" width="1" />
				</label>
			</div>
		</div>
		<br>
		<form action="search" method="get">
			<input type="hidden" id="date" onchange="document.getElementById('result').value = document.getElementById('selected_text').value + document.getElementByName('layout').value" value="" />
			<input type="hidden" name="q" id="result" value="" onchange="document.getElementById('result').value = document.getElementById('selected_text').value + document.getElementById('date').value">
			<input type="submit" class="btn btn-outline-success" onclick="document.getElementById('result').value = document.getElementById('selected_text').value +document.getElementById('date').value" value="Найти">
		</form>


		<a class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#exampleModal">Расширенный поиск</a>

		@include('inc.extended-search')
	</div>

	<div class="col-9">
		@if(Auth::check())
		<script src="/js/app.js">
		</script>
		<div id="divId"></div>
		@include('inc.groups')
		@endif


		<script async src="https://cse.google.com/cse.js?cx=358c519377e0f4e6a">
		</script>
		<div class="gcse-searchresults-only"></div>
	</div>
</div>



@endsection