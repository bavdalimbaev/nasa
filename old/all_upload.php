<?php
$error = false;

// проверка на пустоту файлов в папке
$files = glob("nasa_image/*.*");
if (empty($files)) {

	for ($i = 0; $i < 5; $i++) {

		$date = ($i === 0) ? date('Y-m-d') : date('Y-m-d', strtotime("-$i days"));

		$token = 'W03GohZhm8tKXwBKPLKa3lmM2EXGMdSSXFHpN30m';
		$urlApi = 'https://api.nasa.gov/planetary/apod?api_key=' . $token . '&date=' . $date;

		$image = json_decode(file_get_contents($urlApi), true);

		if ($image['media_type'] == 'image') {

			$urlImg = empty($image['url']) ? NULL : $image['url'];
			$explodeImg = explode("/", $urlImg);
			$imgName = end($explodeImg);
			$imgDirectory = 'nasa_image/' . $imgName;

			// если ссылка равна Null
			if ($urlImg == NULL) {
				$error = true;

				echo 'none';
			}

			// существует ли файл
			if (file_exists($imgDirectory)) {
				$error = true;

				echo 'none';
			}

			if ($error == false) {

				$data = file_get_contents($urlImg);
				file_put_contents($imgDirectory, $data);

				echo 'ok';

			}
		}
	}
}