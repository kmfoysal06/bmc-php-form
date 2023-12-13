<?php
if(isset($_SERVER['REQUEST_METHOD']) == 'post'){
	$name = !empty($_POST['name'])? $_POST['name'] : 'NAME';
	$gender = isset($_POST['gender'])? $_POST['gender'] : 'unset';
	$subscribe = $_POST['subscribe']? 'yes' : 'no';
	$date = isset($_POST['date'])? $_POST['date'] : 'unset';
	$time = isset($_POST['time'])? $_POST['time'] : 'unset';
	$country = isset($_POST['countries'])? $_POST['countries'] : 'no';
	$hobbies = !empty($_POST['interests'])?  $_POST['interests'] : [];
	$language = !empty($_POST['lang'])?  $_POST['lang'] : [];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>php pratice form</title>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
	<script src="http://cdn.tailwindcss.com"></script>
</head>
<body>
	<div class="mb-2 grid place-items-center w-screen min-h-screen p-2">
		<form method="post" class="flex flex-col min-h-3/5 items-start justify-center gap-2 border rounded px-20 py-2">
		<h3 class="text-center text-xl font-bold">Who Are You?</h3>

			<!-- name -->
			<div class="name">
				<label for="name" class="block text-sm font-medium text-gray-600">What is Your Name:</label>
			<input type="text" id="name" name="name" class="mt-1 p-2 w-full rounded-md border" value="<?=isset($name)?$name:''?>">
			</div>

			<!-- Gender -->
			<div class="gender text-sm font-medium text-gray-600">
			<label>Select Gender</label>
			<label for="male" class="text-sm font-medium text-gray-600">Male</label>
			<input name="gender" type="radio" value="male" id="male" name="gender" <?=$gender == 'male'?'checked':''?>>
			<label for="female" class=" text-sm font-medium text-gray-600">Female</label>
			<input name="gender" type="radio" value="female" id="female" name="gender" <?=$gender == 'female'?'checked':''?>>
			<label for="custom" class=" text-sm font-medium text-gray-600">Custom</label>
			<input name="gender" type="radio" value="custom" id="custom" name="gender" <?=$gender == 'custom'?'checked':''?>>
			</div>

			<!-- subscribe -->
			<div class="subscribe">
			<label for="sub" class=" text-sm font-medium text-gray-600">SUBSCRIBE</label>
			<input type="checkbox" value="subscribe" name="subscribe" id="sub" <?= $subscribe == 'yes' ? 'checked': ' ' ?>>
			</div>

			<!-- Date Picker -->
			<div class="date">
			<label for="date" class=" text-sm font-medium text-gray-600">Pick Date</label>
			<input type="text" name="date" id="date" class="border rounded-md" value="<?= $date ?>">
			</div>



			<!-- Time Picker -->
			<div class="time">
			<label for="time" class=" text-sm font-medium text-gray-600">Pick time</label>
			<input type="text" name="time" id="time" class="border rounded-md" value="<?= $time ?>">
			</div>


			<!-- contries -->
			<div class="countries">
				<label for="countries"  class="text-sm font-medium text-gray-600">Select Country</label>
				<select id="countries" name="countries" class="text-sm font-bolder text-black-600 border rounded-md">
					<option value="bangladesh" <?=$country == 'bangladesh'?'selected':''?>>Bangladesh</option>
					<option value="noakhali" <?=$country == 'noakhali'?'selected':''?>>Noakhali</option>
					<option value="usa" <?=$country == 'usa'?'selected':''?>>USA</option>
					<option value="argentina" <?=$country == 'argentina'?'selected':''?>>Argentina</option>
				</select>
			</div>


			<!-- programming language -->
		<div class="multi-checkbox mb-2">
			<label class="block text-sm text-gray-600 font-medium">Programming Languages:</label>
			<label class="inline-flex items-center">
				<input type="checkbox" name="lang[]" value="javascript" class="form-checkbox"  <?=in_array('javascript', $language)?'checked':''?>>
				<span class="ml-2">JAVASCRIPT</span>
			</label>

			<label class="inline-flex items-center">
				<input type="checkbox" name="lang[]" value="html" class="form-checkbox"  <?=in_array('html', $language)?'checked':''?>>
				<span class="ml-2">HTML</span>
			</label>

			<label class="inline-flex items-center">
				<input type="checkbox" name="lang[]" value="php" class="form-checkbox" <?=in_array('php', $language)?'checked':''?>>
				<span class="ml-2">PHP</span>
			</label>

			<label class="inline-flex items-center">
				<input type="checkbox" name="lang[]" value="java" class="form-checkbox" <?=in_array('java', $language)?'checked':''?>>
				<span class="ml-2">JAVA</span>
			</label>
		</div>


			<!-- interests -->
			<div class="interests">
				<label for="intersts"  class="text-sm font-medium text-gray-600">Select hobbies</label>
				<select id="interests" name="interests[]" class="text-sm font-bolder text-black-600 border rounded-md w-full" multiple>
					<option value="gardening" <?=in_array('gardening', $hobbies)?'selected':''?>>Gardening</option>
					<option value="coding" <?=in_array('coding', $hobbies)?'selected':''?>>Coding</option>
					<option value="watching tv" <?=in_array('watching tv', $hobbies)?'selected':''?>>Watching TV</option>
					<option value="outdoor games" <?=in_array('outdoor games', $hobbies)?'selected':''?>>Outdoor Games</option>
					<option value="indoor games" <?=in_array('indoor games', $hobbies)?'selected':''?>>Indoor Games</option>
					<option value="reading" <?=in_array('reading', $hobbies)?'selected':''?>>Reading Books</option>
				</select>
			</div>

			<!-- submit -->
			<input type="submit" value="SUBMIT" class="btn bg-blue-400 p-2 m-5 hover:bg-blue-600 delay-1 cursor-pointer rounded-md" name="submit">
		</form>
		<!-- submitted info: -->
		<div class="info p-2 m-2 border rounded-md">
			<p>your info: -</p>
			<p><strong>Name:-</strong> <i><?=$name?></i></p>
			<p><strong>Gender:-</strong> <i><?=$gender?></i></p>
			<p><strong>Subscribed:-</strong> <i><?=$subscribe?></i></p>
			<p><strong>Date:-</strong> <i><?=$date?></i></p>
			<p><strong>Date:-</strong> <i><?=$time?></i></p>
			<p><strong>Country:-</strong> <i><?=strtoupper($country)?></i></p>
			<p><strong>Programming Languages:-</strong> <i><?=strtoupper(implode(', ',$language))?></i></p>
			<p><strong>Hobbies:-</strong> <i><?=strtoupper(implode(', ',$hobbies))?></i></p>
		</div>
	</div>
	<script type="text/javascript">
			flatpickr("#date", {});
			flatpickr("#time", {
				enableTime : true,
				noCalendar : true,
				dateFormate : "H:i"
			});
		$(document).ready(function() {
   			 $('#interests').select2();
		});
	</script>
</body>
</html>