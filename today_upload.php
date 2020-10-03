<?php
$error = false;

$todayIsDate = date('Y-m-d');
$editFolderTime = date("Y-m-d", filectime('nasa_image'));

// проверка даты последнего изменения папки == нынешнему дню
if ($editFolderTime == $todayIsDate) {
	$error = true;
}

if ($error == false) {
	$token = 'W03GohZhm8tKXwBKPLKa3lmM2EXGMdSSXFHpN30m';
	$urlApi = 'https://api.nasa.gov/planetary/apod?api_key=' . $token . '&date=' . $todayIsDate;

	$image = json_decode(file_get_contents($urlApi), true);

	$urlImg = empty($image['url']) ? NULL : $image['url'];
	$explodeImg = explode("/", $urlImg);
	$imgName = end($explodeImg);
	$imgDirectory = 'nasa_image/' . $imgName;
}

if ($urlImg == NULL) {
	$error = true;
}


if (file_exists($imgDirectory)) {
	$error = true;
}


if ($error == false) {

	$data = file_get_contents($urlImg);
	file_put_contents($imgDirectory, $data);

}
