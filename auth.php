<?php
require("script.php");
/**
 * @var boolean $error Error authenticating
 */
?>
<html lang="en">
<head>
	<title>BioLink</title>
	<link rel="stylesheet" href="style.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<section>
	<?php if($error === true){echo "<p class='error'>Authentication failed</p>";} ?>
	<h1>Authentication</h1>
	<form action="auth.php" method="post">
		<label for="password">Password</label><br/>
		<input type="password" id="password" name="password" size=25 />
		<br/><br/>
		<input type="button" onClick="location.href='index.php';" value="Back">
		<input type="submit" name="submit" value="Authenticate">
	</form>
</section>
</body>
</html>
