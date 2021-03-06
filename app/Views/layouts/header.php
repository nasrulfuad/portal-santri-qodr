<?php ($datas); ?>
<!DOCTYPE html>
	<html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Portal list santri qodr.or.id" />
	<meta name="keywords" content="portal santri qodr, santri qodr, daftar santri qodr" />
	<meta name="author" content="FREEHTML5.CO" />
  <!-- FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">
	
	<link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
	<!-- Modernizr JS -->
	<script src="<?= BASEURL; ?>/js/modernizr-2.6.2.min.js"></script>

	</head>
	<body>
		<div>	
			<header id="fh5co-header" role="banner">
				<div class="container text-center">
					<div id="fh5co-logo">
						<a href="<?= BASEURL; ?>"><img src="<?= BASEURL; ?>/images/logo-horizontal.png" alt="qodr.or.id"></a>
					</div>
					<nav>
						<ul>
							<li class="<?= $santriLink; ?>"><a href="<?= BASEURL; ?>">Santri</a></li>
							<li class="<?= $alumniLink; ?>"><a href="<?= BASEURL; ?>/alumni">Alumni</a></li>
						</ul>
					</nav>
				</div>
		        <div id="loader" class="wrapper">
		          <div class="centeredBox">
		            <main role='main'>
		              <div aria-busy='true' aria-label='Loading' role='progressbar'></div>
		              <br>
		              <span id="typewriter" data-array=""></span>
		              <span class="cursor"></span>
		            </main> 
		          </div>
		        </div>
			    <div id="search-container" class="mx-auto">
			      <div id="search">
			        <div id="magnify">
			          <form id="searchSantri">
			            <input id="input" name="key" type="text" autocomplete="off" placeholder="Cari berdasarkan nama">
			          </form>
			          <div id="handle1">
			            <div id="handle2">
			            </div>
			          </div>
			        </div>
			      </div>
			    </div>
			</header>
		<!-- END #fh5co-header -->
