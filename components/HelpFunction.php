<?php

class HelpFunction
{

	public static function uploadImage($urlApi)
	{
		$image = json_decode(file_get_contents($urlApi), true);

		if ($image['media_type'] == 'image') {

			$urlImg = empty($image['url']) ? NULL : $image['url'];
			$explodeImg = explode("/", $urlImg);
			$imgName = end($explodeImg);
			$imgDirectory = 'use/nasa_image/' . $imgName;

			if ($urlImg == NULL) $error = true;

			if (file_exists($imgDirectory)) $error = true;

			if ($error == false) {
				$data = file_get_contents($urlImg);
				file_put_contents($imgDirectory, $data);
			}
		}
	}
}
