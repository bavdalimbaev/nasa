<?php
class SiteController
{
	private	$token = 'W03GohZhm8tKXwBKPLKa3lmM2EXGMdSSXFHpN30m';
	public $error = false;

	public function actionIndex()
	{
		$files = glob("use/nasa_image/*.{jpg,png,jpeg,gif}", GLOB_BRACE);

		$cntFile = count($files);

		if ($cntFile == 0) {
			for ($i = 0; $i < 5; $i++) {

				$date = ($i === 0) ? date('Y-m-d') : date('Y-m-d', strtotime("-$i days"));

				$urlApi = 'https://api.nasa.gov/planetary/apod?api_key=' . $this->token . '&date=' . $date;
				HelpFunction::uploadImage($urlApi);
			}
		}


		$todayIsDate = date('Y-m-d');

		$dateFiles = array();
		foreach($files as $file)
			$dateFiles[] = date("Y-m-d H:m:s", filectime($file));
		
		sort($dateFiles);
		$dateFile = array_pop($dateFiles);

		// проверка даты последнего измененного {png,jpg,jpeg,gif} файла == нынешнему дню
		if ($dateFile == $todayIsDate) {
			$error = true;
		}

		if ($error == false) {
			$urlApi = 'https://api.nasa.gov/planetary/apod?api_key=' . $this->token . '&date=' . $date;
			HelpFunction::uploadImage($urlApi);
		}

		require_once(ROOT . '/views/index.php');
		return true;
	}
}
