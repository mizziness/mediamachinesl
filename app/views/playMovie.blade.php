<!doctype html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Media MachineSL</title>
  
  <?php
  
  	$player = "chromium";
	if ( Session::has("tempPlayer") ) {
		$player = Session::get("tempPlayer");
	}
  	if ( !empty($customerID) && $customerID != NULL ) {
		$customer = DB::table("customers")->where("id", $customerID)->first();
		$player = $customer->optionPlayer;
	}	
  
  ?>
  
  @if ( $player == "chromium" )
   
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <link href="/css/moviePlayer.css" type="text/css" rel="stylesheet" />
      
      <!--<link href="/js/flowplayer/skin/playful.css" type="text/css" rel="stylesheet" />
      <script type="text/javascript" src="/js/flowplayer/flowplayer.min.js"></script>-->
      
      <link href="http://vjs.zencdn.net/5.10.4/video-js.css" rel="stylesheet">
      
      <?php
        $url = $movie->url;  
      if ( strpos($movie->url, "http") === false ) {
        $url = "http://www.mediamachinesl.com/mediacentersl" . $movie->url;
      }
      ?>
      
      <script> //flowplayer.conf.adaptiveRatio = false; 
      	
      
      </script>
      
      </head>
    
      <body>
      
      <video id="video" class="video-js" controls data-setup='{ "aspectRatio":"640:267", "playbackRates": [1, 1.5, 2], "autoplay": true, "preload": "metadata" }'>
        <source src="{{{ $url }}}" type='video/mp4'>
        <p class="vjs-no-js">
          To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
        </p>
      </video>
      
       <!--<video id="my_video_1" class="video-js vjs-default-skin" controls preload="none" >
        
           <div class="flowplayer no-background" data-embed="false" data-fullscreen="true">
                <video autoplay data-title="{{{ $movie->title }}}">
                    <source type="video/mp4" src="{{{ $url }}}">
                </video>
                <a href="/movies" class="mmsl-back" tabindex="1" title="Go Back">Go Back</a>
            </div>-->
            
            <script src="http://vjs.zencdn.net/5.10.4/video.js"></script>
            <script type="text/javascript">
			videojs('video').ready(function() {
				this.play();
			});
		</script>
    
      </body>
  
  @else
  
		<link href="/css/moviePlayer.css" type="text/css" rel="stylesheet" />
		<link type="text/css" href="/css/jplayer.blue.monday.css" rel="stylesheet" />
  
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="/js/jquery.jplayer.js"></script>
        <script type="text/javascript" src="/js/jquery.jplayer.inspector.js"></script>
        <script type="text/javascript">
			 <?php
				$url = $movie->url;	
				if ( strpos($movie->url, "http") === false ) {
					$url = "http://www.mediamachinesl.com/mediacentersl" . $movie->url;
				}
			?>

			$(document).ready(function(){
			
			  $("#jquery_jplayer_1").jPlayer({
				ready: function () {
				  $(this).jPlayer("setMedia", {
					title: "{{{ $movie->title }}}",
					m4v: "{{{ $url }}}",
					ogv: "{{{ $url }}}",
				  }).jPlayer("play");
				},
				swfPath: "/js/jplayer",
				supplied: "m4v, ogv",
				fullScreen: true,
				fullWindow: true
			  });
			
			});
			
        </script>
     </head>
     
     <body>
        <div id="jp_container_1" class="jp-video ">
        <div class="jp-type-single">
        <div id="jquery_jplayer_1" class="jp-jplayer"></div>
        <div class="jp-gui">
            <div class="jp-video-play"> <a href="javascript:;" class="jp-video-play-icon" tabindex="1">play</a> </div>
            <div class="jp-interface">
                <div class="jp-progress">
                    <div class="jp-seek-bar">
                        <div class="jp-play-bar"></div>
                    </div>
                </div>
                <div class="jp-current-time"></div>
                <div class="jp-duration"></div>
                <div class="jp-controls-holder">
                    <ul class="jp-controls">
                        <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                        <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                        <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
                        <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                        <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                        <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
                    </ul>
                    <div class="jp-volume-bar">
                        <div class="jp-volume-bar-value"></div>
                    </div>
                    <ul class="jp-toggles">
                        <!--<li><a href="javascript:;" class="jp-full-screen" tabindex="1" title="full screen">full screen</a></li>
                        <li><a href="javascript:;" class="jp-restore-screen" tabindex="1" title="restore screen">restore screen</a></li>-->
                        <li><a href="/movies" class="mmsl-back" tabindex="1" title="Go Back">Go Back</a></li>
                        <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
                        <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
                        
                    </ul>
                </div>
                <div class="jp-details">
                    <ul>
                        <li><span class="jp-title"></span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="jp-no-solution"> <span>Update Required</span> To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>. </div>
        <div id="jplayer_inspector_1"></div>
    </body>
  
  @endif
</html>
