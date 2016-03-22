<!doctype html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Media MachineSL</title>
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <link href="/css/moviePlayer.css" type="text/css" rel="stylesheet" />
  <link href="/js/flowplayer/skin/playful.css" type="text/css" rel="stylesheet" />
  <script type="text/javascript" src="/js/flowplayer/flowplayer.min.js"></script>
  
  <?php
    $url = $movie->url;  
  if ( strpos($movie->url, "http") === false ) {
    $url = "http://www.mediamachinesl.com/mediacentersl" . $movie->url;
  }
  ?>
  
  <script> flowplayer.conf.adaptiveRatio = false; </script>
  
  </head>

  <body>
    
        <div class="flowplayer no-background" data-embed="false" data-fullscreen="true">
            <video autoplay data-title="{{{ $movie->title }}}">
                <source type="video/mp4" src="{{{ $url }}}">
            </video>
            <a href="/movies" class="mmsl-back" tabindex="1" title="Go Back">Go Back</a>
        </div>

  </body>
</html>
