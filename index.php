<?php
require("script.php");
/**
 * @var array $profile Profile data
 * @var string $image Image filename
 */
?>
<html lang="en">
	<head>
		<title><?= $profile['title'] ?> | BioLink</title>
		<link rel="stylesheet" href="style.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<section>
			<img alt="avatar" src="<?= $image ?>">
			<h1><?= $profile['title'] ?></h1>
			<em><?= $profile['description'] ?></em>
			<ul>
				<?php foreach($profile['links'] as $name=>$url): ?>
					<li><a href="<?= $url ?>"><?= $name ?></a></li>
				<?php endforeach; ?>
			</ul>
			<small>Copyright &COPY; <?= date('Y').' '.$profile['title'] ?> | <a href="admin.php">Administration</a></small>
		</section>
	</body>
</html>
