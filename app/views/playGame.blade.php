<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Media MachineSL</title>
	<link href="/css/slimbox2.css" rel="stylesheet" type="text/css">
	<style type="text/css">
		body, html { margin: 0; padding: 0; width: 100%; height: 100%; background: #000000; position: relative; overflow: hidden}
		#backbutton { position: absolute; top: 20px; left: 20px; z-index: 20; }  
	</style>
</head>

	<body bgcolor="#000000"> 
		<div id="backbutton"><a href="/games"><img src="/images/icon-arrow-open.png"></a></div>
		<div align="center">
			<object width="1024" height="512">
				<param name="wmode" value="transparent">
				<param name="scale" value="exactfit">
				<param name="movie" value="{{{ $game->url }}}">
				<param name="quality" value="high">
				<embed src="{{{ $game->url }}}" scale="exactfit" wmode="transparent" quality="high" width="640" height="480" type="application/x-shockwave-flash" pluginspage= "http://www.macromedia.com/go/getflashplayer"></embed>
			</object>  
		</div>
	</body>
</html>