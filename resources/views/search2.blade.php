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
		if (document.getElementById('div' + id) != null) {

			var node = document.getElementById('div' + id),

				htmlContent = node.innerHTML,
				// htmlContent = "Some <span class="foo">sample</span> text."

				textContent = node.textContent;
			// textContent = "Some sample text."
			$text = document.getElementById('div' + id).textContent;
			document.getElementById('saveResTitle').textContent = node.childNodes[0].textContent;
			document.getElementById('saveResTextUrl').textContent = node.childNodes[1].childNodes[0].textContent;
			document.getElementById('saveResUrl').textContent = node.childNodes[1].childNodes[1].textContent;
			document.getElementById('saveResText').textContent = node.childNodes[2].childNodes[1].childNodes[1].textContent;
			document.getElementById('dateR').textContent = document.getElementById('div' + id).textContent;
		}
	}
</script>
<?php
if (!isset($_GET["q"])) {
?>

	<div class="cont">
		<div class="search">
			<form action="index.php">
				<input type="text" name="q" autofocus>
				<input class="button" type="submit" value="&#128270;">
			</form>
		</div>
	</div>
	</body>

	</html>

<?php
	exit;
}

$json = file_get_contents("https://customsearch.googleapis.com/customsearch/v1?key=AIzaSyC0dppanV32aQ5xePrb4eoiRDHibsbsd3M&cx=358c519377e0f4e6a&m%5B1%5D&q=" . $_GET["q"]);
$data = json_decode($json, true);
?>

@section('content')
<div class="row">
	<div class="col-2 text-center">
		<div class="switch-contents">
			<input id="layout-single" type="radio" name="layout" value="" checked onclick="document.getElementById('date').value = ' +after:'+dateM(0)" />
			<label for="layout-single">За все время</label>
			<br>
			<input id="layout-1" type="radio" name="layout" value="" onclick="document.getElementById('date').value = ' +after:'+dateM(1)" />
			<label for="layout-1">Месяц</label>
			<br>
			<input id="layout-2" type="radio" name="layout" value="" onclick="document.getElementById('date').value = ' +after:'+dateM(3) " />
			<label for="layout-2">3 месяца</label>
			<br>
			<input id="layout-3" type="radio" name="layout" value="" onclick="document.getElementById('date').value = ' +after:'+dateM(6) " />
			<label for="layout-3">Полгода</label>
			<br>
			<input id="layout-4" type="radio" name="layout" value="" onclick="document.getElementById('date').value = ' +after:'+dateM(12) " />
			<label for="layout-4">Год</label>
			<br>
			<input id="layout-5" type="radio" name="layout" value="" onclick="document.getElementById('date').value = ' + after:' +document.getElementById('after').value +'+ before:'+ document.getElementById('before').value" />
			<label for="layout-5">
				C<input for="layout-t" type="text" id="after" value="2002" size="1" width="1" />
				по <input for="layout-t" type="text" id="before" value="2023" size="1" width="1" />
			</label>
		</div>
		<form action="search" method="get">
			<input type="hidden" id="date" onchange="document.getElementById('result').value = document.getElementById('selected_text').value + document.getElementByName('layout').value" value="" />
			<input type="hidden" name="q" id="result" value="" onchange="document.getElementById('result').value = document.getElementById('selected_text').value + document.getElementById('date').value">
			<input type="submit" class="btn btn-outline-success" onclick="document.getElementById('result').value = document.getElementById('selected_text').value +document.getElementById('date').value" value="Найти">
		</form>
		<?php
		foreach ($data["context"]["facets"] as $item) {

		?>
			<div class="item">
				<p class="desc"><?php echo $item[0]["label"] ?></p>
			</div>

		<?php
		}
		?>

		<a class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#exampleModal">Расширенный поиск</a>

		@include('inc.extended-search')
	</div>

	<div class="col-10">
		@if(Auth::check())
		<script src="/js/app.js">
		</script>
		<div id="saveResTitle"></div>
		<div id="saveResUrl"></div>
		<div id="saveResTextUrl"></div>
		<div id="saveResText"></div>
		@include('inc.groups')
		@endif


		<?php

		$title = $data["queries"]["request"][0]["title"];
		$total = $data["queries"]["request"][0]["totalResults"];

		?>


		<h2>
			<?php echo $title ?>
		</h2>

		<?php
		foreach ($data["items"] as $item) {

		?>
			<div class="item">
				<p class="title">
					<a target="_blank" href="<?php echo $item["link"] ?>">
						<?php echo $item["title"] ?>
					</a>
				</p>
				<p class="link"><?php echo $item["displayLink"] ?></p>
				<p class="desc"><?php echo $item["snippet"] ?></p>
			</div>

		<?php
		}
		?>
	</div>
</div>



@endsection