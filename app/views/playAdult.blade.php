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
  
	<div id="backbutton"><a href="/adult"><img src="/images/icon-arrow-open.png"></a></div>
	  
	<object width="100%" height="100%">
		<param name="wmode" value="transparent">
		<param name="allowfullscreen" value="true">
		<param name="AllowScriptAccess" value="always">
		<param name="movie" value="http://embed.redtube.com/player/">
		<param name="FlashVars" value="id={{{ $video['video']['video_id'] }}}&style=redtube&autostart=true">
		<param name="scale" value="exactfit">
		<embed wmode="transparent" width="100%" height="100%" src="http://embed.redtube.com/player/?id={{{ $video['video']['video_id'] }}}&style=redtube" allowfullscreen="true" AllowScriptAccess="always" flashvars="autostart=true" scale="exactfit" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" />
	</object>
	
	</body>
</html>
