<?php 
session_start();
require "inc/survey.php";
$mysurvey = new Survey();
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Welcome to ISOBAR Surveys</title>
	<meta name="description" content="Sample Surveys">
	<meta name="author" content="Andy">
	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="css/base.css">
	<!-- <link rel="stylesheet" href="css/style.css"> -->

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<!-- Primary Page Layout
	================================================== -->
	<div class="container">
		<div class="sixteen columns">
			<h1 class="remove-bottom" style="margin-top: 40px">Welcome to Surveys</h1>
		</div>
		<div class="sixteen columns">
			<div id="nav">
				<ul>
					<li>
						<a href="index.php" >Take the survey</a>
					</li>
					<li>
						<a href="admin.php" >Dashboard</a>
					</li>
					
					<?php if(isset($_SESSION['username'])) : ?>
					<li>
						<a href="admin.php?task=add_new">Add new Question</a>
					</li>
					<li>
						<a href="admin.php?task=logout">Logout</a>
					</li>
					<?php endif; ?>

				</ul>
			</div>
		</div>
