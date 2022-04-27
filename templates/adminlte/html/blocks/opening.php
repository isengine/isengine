<?php

namespace is;
use is\Masters\View;

$view = View::getInstance();

$pagename = $view -> get('vars|pagename');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
	$view -> get('block') -> launch('head:' . $pagename);
	$sets = $view -> get('vars|adminlte');
	if ($sets['layout']['darkmode']) {
?>
<style>a{color:#00c0ef;}</style>
<?php
	}
?>
</head>
<?php $view -> get('block') -> launch('body'); ?>
<div class="wrapper">
<?php $view -> get('block') -> launch('preloader'); ?>
<?php $view -> get('block') -> launch('nav'); ?>
<?php $view -> get('block') -> launch('aside'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<?php $view -> get('block') -> launch('content-header'); ?>

    <!-- Main content -->
    <section class="content">
