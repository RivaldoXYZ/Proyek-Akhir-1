<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Website Informasi Danau Toba</title>
	<link rel="stylesheet" type="text/css" href="CSS/home.css">
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="#penginapan">Penginapan</a></li>
				<li><a href="#hiburan">Tempat Hiburan</a></li>
			</ul>
		</nav>
		<div class="hero">
			<h1>Website Informasi Danau Toba</h1>
			<p>Selamat datang di website informasi tentang Danau Toba. Temukan informasi tentang penginapan, tempat hiburan, dan atraksi wisata lainnya di sekitar Danau Toba.</p>
			<a href="#penginapan" class="cta">Temukan Penginapan</a>
		</div>
	</header>
	<main>
		<section id="penginapan">
			<h2>Penginapan</h2>
			<?php include 'penginapan.php'; ?>
		</section>

		<section id="hiburan">
			<h2>Tempat Hiburan</h2>
			<?php include 'hiburan.php'; ?>
		</section>
	</main>

	<footer>
		<p>&copy; 2023 Website Informasi Danau Toba</p>
	</footer>

	<script src="script.js"></script>
</body>
</html>
