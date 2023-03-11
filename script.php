<?php

// 6 ------------------------------------------------

session_start();
//var_dump($_SESSION);
if(basename($_SERVER['PHP_SELF']) === 'admin.php'){
	if(!array_key_exists('authenticated',$_SESSION) || $_SESSION['authenticated'] !== true){
		header('location: auth.php');
	}
}

if(basename($_SERVER['PHP_SELF']) === 'auth.php'){
	//var_dump($_REQUEST);
	$error=false;
	if(array_key_exists('submit',$_REQUEST) && $_REQUEST['submit'] === 'Authenticate'){
		//if($_REQUEST['password'] === 'password'){
		if(password_verify($_REQUEST['password'],'$2y$10$1lUbxNZJG1lS3687srNOU.BX8bR/8W9Ucm/Zc2zTlCpMb02TRO8RC')){
			$_SESSION['authenticated'] = true;
			header('location: admin.php');
		}else{
			$error = true;
		}
	}else{
		session_destroy();
	}
}

var_dump(password_hash('password',PASSWORD_BCRYPT));


// 1 ------------------------------------------------

/*
$title = 'Manuel Zavatta';
$description = 'software developer and content creator';
$links = [
	'Homepage' => 'https://zavy.im',
	'YouTube' => 'https://youtube.com/@zavy86',
	'LinkedIn' => 'https://linkedin.com/in/manuel-zavatta'
];
*/

if(file_exists('avatar_custom.jpg')){
	$image = 'avatar_custom.jpg';
}else{
	$image = 'avatar_default.jpg';
}


// 2 ------------------------------------------------

/*
$profile=[
	'title' => $title,
	'description' => $description,
	'links' => $links
];

file_put_contents('data.json',json_encode($profile,JSON_PRETTY_PRINT));
*/


// 3 ------------------------------------------------

if(file_exists('data.json')){
	$fileContent = file_get_contents('data.json');
	if($fileContent !== false){
		$decodedData=json_decode($fileContent,true);
		if(is_array($decodedData)){
			$profile = $decodedData;
		}else{
			die('error decoding data');
		}
	}else{
		die('error reading file');
	}
}else{
	die('file not found');
}


// 4 ------------------------------------------------

$saved=null;
if(array_key_exists('submit',$_REQUEST) && $_REQUEST['submit'] === 'Save'){
	//var_dump($_REQUEST);
	$profile = [
		'title' => $_REQUEST['title'],
		'description' => $_REQUEST['description'],
		'links' => []
	];
	foreach($_REQUEST['linksNames'] as $key=>$name){
		if(!strlen($name)){continue;}
		if(substr($_REQUEST['linksURLs'][$key],0,4) !== 'http'){continue;}
		$profile['links'][$name] = $_REQUEST['linksURLs'][$key];
	}
	//var_dump($profile);
	$bytes = file_put_contents('data.json',json_encode($profile,JSON_PRETTY_PRINT));
	if($bytes > 0){
		//var_dump('succes');
		$saved=true;
	}else{
		//var_dump('error');
		$saved=false;
	}
}


// 5 ------------------------------------------------

if(array_key_exists('avatar',$_FILES) && !$_FILES['avatar']['error']){
	//var_dump($_FILES['avatar']);
	if(file_exists('avatar_custom.jpg')){unlink('avatar_custom.jpg');}
	move_uploaded_file($_FILES['avatar']['tmp_name'],'avatar_custom.jpg');
}
