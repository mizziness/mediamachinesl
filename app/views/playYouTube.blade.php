<!doctype html>
<html>
  <head>
	<meta charset="utf-8">
	<title>Media MachineSL</title>  
		<style type="text/css">
			body, html { margin: 0; padding: 0; width: 100%; height: 100%; background: #000000; position: relative; overflow: hidden}
			#backbutton { position: absolute; top: 20px; left: 20px; z-index: 20; }  
		</style>
	</head>

	<body>
  
	<div id="backbutton"><a href="/youtube"><img src="/images/icon-arrow-open.png"></a></div>
	
	<iframe id="ytplayer" type="text/html" width="100%" height="100%" src="http://www.youtube.com/embed/{{ $id }}?autoplay=1" frameborder="0"/>
	
	</body>
</html>