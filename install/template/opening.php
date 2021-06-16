<!doctype html>
<html lang="<?= $currlang; ?>">
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title><?= $lang['template']['title']; ?></title>
	
    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	
	<?php require PATH_INSTALL . 'template' . DS . 'style.php'; ?>
	
</head>

<body class="text-center">

<div class="form-signin">
	<img class="mb-4" src="<?php require PATH_INSTALL . 'template' . DS . 'logo.php'; ?>" alt="" width="144" height="144">
	<h1 class="h3 mb-3 font-weight-normal"><?= $lang['template']['title']; ?></h1>
	<div class="checkbox mb-3">