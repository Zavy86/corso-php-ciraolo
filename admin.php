<?php
require("script.php");
/**
 * @var array $profile Profile data
 * @var boolean $saved Saved data
 */
?>
<html lang="en">
<head>
	<title>BioLink</title>
	<script src="script.js"></script>
	<link rel="stylesheet" href="style.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<section>
	<?php if($saved === true){echo "<p class='success'>Data saved successfully!</p>";} ?>
	<?php if($saved === false){echo "<p class='error'>An error occurred while saving the data..</p>";} ?>
	<h1>Administration</h1>
	<form action="admin.php" method="post" enctype="multipart/form-data">
		<label for="image">Avatar</label><br/>
		<input type="file" name="avatar" accept=".jpg" />
		<br/><br/>
		<label for="title">Title</label><br/>
		<input type="text" id="title" name="title" size=25 value="<?= $profile['title'] ?>" />
		<br/><br/>
		<label for="description">Description</label><br/>
		<input type="text" id="description" name="description" size=40 value="<?= $profile['description'] ?>" />
		<br/><br/>
		<div id="links">
			<?php foreach($profile['links'] as $name=>$url): ?>
				<div>
					<input type="text" name="linksNames[]" size=10 value="<?= $name ?>" />
					<input type="text" name="linksURLs[]" size=20 value="<?= $url ?>" />
					<input type="button" class="removeLink" value="Remove" />
					<br/><br/>
				</div>
			<?php endforeach; ?>
			<div id='linkTemplate' class="hidden">
				<input type="text" name="linksNames[]" size=10 />
				<input type="text" name="linksURLs[]" size=20 />
				<input type="button" class="removeLink" value="Remove" />
				<br/><br/>
			</div>
		</div>
		<br/>
		<input type="button" onClick="location.href='index.php';" value="Back">
		<input type="button" onClick="location.href='auth.php';" value="Logout">
		<input type="button" onClick="addLink()" value="New Link">
		<input type="submit" name="submit" value="Save">
	</form>
</section>
</body>
</html>
