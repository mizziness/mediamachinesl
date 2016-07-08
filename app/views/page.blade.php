<?php
	$bodyClass = "";
	if ( Session::has('demo') ) {
		$bodyClass .= "demo";
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Media Machines SL | @yield('title')</title>
		<meta name="description" content="">
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="/css/gridiculous.css" />
		<link rel="stylesheet" type="text/css" href="/css/styles.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://use.fontawesome.com/1c96f20fa4.js"></script>
		<script src="/js/scripts.js"></script>
		@yield('scripts')
	</head>
	
	<body class="{{ $bodyClass }}">
		<div id="container" class="grid">
		@yield('content')
		</div>
	</body>
</html>
