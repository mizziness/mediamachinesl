<!doctype html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Media MachineSL Radio</title>  
  <link type="text/css" href="/css/jplayer.blue.monday2.css" rel="stylesheet" />
    <link href="/css/musicPlayer.css" type="text/css" rel="stylesheet" />
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script type="text/javascript" src="/js/jquery.jplayer.js"></script>
  <script type="text/javascript" src="/js/jquery.jplayer.inspector.js"></script>
  <script type="text/javascript" src="/js/jquery.vegas.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#jquery_jplayer_1").jPlayer({
        ready: function () {
          $(this).jPlayer("setMedia", {
            title: "{{{ $station->title }}}",
            mp3:"{{{ $station->url }}}"
          }).jPlayer("play");
        },
        swfPath: "/js/jplayer",
        supplied: "mp3"
      });
    });
  
$.vegas('slideshow', {
  delay: 20000,
  backgrounds:[
  
	  @foreach ( $backgrounds as $bg )
	  {src:'{{{ $bg->url }}}', fade:1000},
	  @endforeach
	  
  ]
})('overlay', { src:''});
  
  </script>
  </head>
  <body>
<h1 id="Bottom">{{{ $station->title }}}</h1>
<h2 id="Bottom2">Media MachineSL Radio</h2>
<div id="jquery_jplayer_1" class="jp-jplayer"></div>
<div id="Top"><a href="/radio"><img src="/images/icon-arrow-open.png" width="60" height="60"  alt=""/></a></div>
</body>
</html>
