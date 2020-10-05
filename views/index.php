<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/nasa/use/assets/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css">
	<title>Slick + Bootstrap</title>
	<style>
		.carousel {
			width: 90%;
			margin: 0px auto;
		}

		.slick-slide {
			margin: 10px;
		}

		.slick-slide img {
			width: 100%;
			border: 2px solid #fff;
		}
	</style>
</head>

<body id='<?= $cntFile ?>' class='bg-success'>
	<div class="container">

		<h2 class="mt-4 text-center text-white">Avdalimbaev Bekjan</h2>
		<h2 class="mt-4 text-center text-white">Slick Test Wok</h2>

		<div class="carousel">
			<?php foreach ($files as $value) : ?>
				<div class="float-right"><img src="<?= $value ?>" alt="" width="100%" class="img-card w-100"></div>
			<?php endforeach ?>
		</div>

	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.js"></script>

	<script>
		$('.carousel').slick({
			slidesToShow: 1,
			dots: true,
			centerMode: true,
			autoplay: true
		});
	</script>
</body>
</html>