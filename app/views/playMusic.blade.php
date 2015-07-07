<!doctype html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Untitled Document</title>  
  <link type="text/css" href="/css/jplayer.blue.monday2.css" rel="stylesheet" />
  <!--<link type="text/css" href="/css/jquery.vegas.css" rel="stylesheet" />-->
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
                    {src:'http://chromecastbg.alexmeub.com/images/1080_Portofino2.jpg', fade:1000},
                {src:'http://chromecastbg.alexmeub.com/images/1080_IMG-2617.jpg', fade:1000},
            {src:'http://chromecastbg.alexmeub.com/images/1080_David-Morrow-1-5.jpg', fade:1000},
        {src:'http://chromecastbg.alexmeub.com/images/1080_florida-5.jpg', fade:1000},
    {src:'http://chromecastbg.alexmeub.com/images/1080_2398605326-bf7dde0cf7-o.jpg', fade:1000},
                         {src:'http://chromecastbg.alexmeub.com/images/1080_Trey-Ratcliff-New-York---Inception.jpg', fade:1000},
                         {src:'http://chromecastbg.alexmeub.com/images/1080_TheMomentAfterSheLeft.jpg', fade:1000},
                     {src:'http://chromecastbg.alexmeub.com/images/1080_The-Infinity-of-Tokyo.jpg', fade:1000},
                 {src:'http://chromecastbg.alexmeub.com/images/1080_bondi-sml.jpg', fade:1000},
             {src:'http://chromecastbg.alexmeub.com/images/1080_Trey-Ratcliff-China-2011---The-Egg-at-Sunset.jpg', fade:1000},
         {src:'http://chromecastbg.alexmeub.com/images/1080_tekapo-new-zealand-trey-ratcliff-2.jpg', fade:1000},
     {src:'http://chromecastbg.alexmeub.com/images/1080_X7A5208-Edit.jpg', fade:1000},
     {src:'http://chromecastbg.alexmeub.com/images/1080_rainier-bridge-07-22-2014.jpg', fade:1000},
    {src:'http://chromecastbg.alexmeub.com/images/1080_20140328-Hawaii-2209.jpg', fade:1000},
    {src:'http://chromecastbg.alexmeub.com/images/1080_DX-7114-Edit-Recovered.jpg', fade:1000},
    { src:'http://chromecastbg.alexmeub.com/images/1080_Seattle.jpg', fade: 1000 },
    { src:'http://chromecastbg.alexmeub.com/images/1080_DarkSide.jpg', fade: 1000 },
    { src:'http://chromecastbg.alexmeub.com/images/1080_trey-ratcliff-road-to-paradise.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_O9V5569-HDR.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_trey-ratcliff-close-to-tepako-new-zealand.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_Trey-Ratcliff-China-2011---A-Great-Wall-at-Sunset.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_The-Bamboo-Forest.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_LandsEnds-le-sunset.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_Engagement-2567.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_SutroSunset-rocks-misty.jpg', fade: 1000 },
    { src:'http://chromecastbg.alexmeub.com/images/1080_217440037-8ca190627e-o.jpg', fade: 1000 },
    { src:'http://chromecastbg.alexmeub.com/images/1080_McWay-Milky-Way.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_LowerAntelope1.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_DSC-0853.JPG', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_061122-1421-LtAtEndOfPier.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_Take-It-or-Leave-It.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_Changing-Light-Over-Garrapata-Beach.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_LandsEnd-sunset-2.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_C21T0880.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_SecondBeach2.jpg', fade: 1000 },
    { src:'http://chromecastbg.alexmeub.com/images/1080_DSC-2817.JPG', fade: 1000 },
    { src:'http://chromecastbg.alexmeub.com/images/1080_Hot-Sand.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_O9V5569-HDR.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_1-02-12-part2.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_071124-3917-BigSurSky.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_Seal-Rocks-Edit.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_A-View-from-the-Ranch-in-Argentina.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_Bean-Hollow-Sunset-2048.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_p1000284.jpg', fade: 1000 },
    { src:'http://chromecastbg.alexmeub.com/images/1080_Big-Sur-Coastal-Seascape-2.jpg', fade: 1000 },
    { src:'http://chromecastbg.alexmeub.com/images/1080_the-lonely-grass-house.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_Hanging-Leaf.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_IMG-8642.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_GoldenFalls-1920.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_Trey-Ratcliff-Queenstown-Aurora-Australis.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_Islands.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_MOL-1841.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_9082667654-c7919ec6ed-o.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_IMG-8981.JPG', fade: 1000 },
    { src:'http://chromecastbg.alexmeub.com/images/1080_MWF-6016.jpg', fade: 1000 },
    { src:'http://chromecastbg.alexmeub.com/images/1080_DSC-1612.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_O9V5569-HDR.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_060518-0190-TamBreeze.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_IMG-0725.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_cleardrop.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_Chasing-the-Sunset.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_The-Night-is-Coming.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_DSC-1351.jpg', fade: 1000 },
    { src:'http://chromecastbg.alexmeub.com/images/1080_20100530-120257-0273-Edit-2.jpg', fade: 1000 },
    { src:'http://chromecastbg.alexmeub.com/images/1080_IMG-2617.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_Another-Rockaway-Sunset.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_PatriciaLake.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_Chrysler-Building-NYC.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_tree.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_River-and-Mount.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_20130307-12-35-23-tahoe-iq180-16274.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_MoraineLake.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_080327-4706-JoshuaTreeOasis.jpg', fade: 1000 },
    { src:'http://chromecastbg.alexmeub.com/images/1080_060408-1938-GarrapataFlow.jpg', fade: 1000 },
    { src:'http://chromecastbg.alexmeub.com/images/1080_IMG-2452.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_Farewell-India.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_388A4648-Edit.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_One-Trick-Pony.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_calm-before.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_110121-7113-LightForce.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_IMG-4460.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_reunion.jpg', fade: 1000 },
    { src:'http://chromecastbg.alexmeub.com/images/1080_MSU-1184.jpg', fade: 1000 },
    { src:'http://chromecastbg.alexmeub.com/images/1080_Seattle-BrianMatiash.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_110521-8046-PacificaLt2.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_2398605326-bf7dde0cf7-o.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_Rainy-Days-Watching-Movies-In-Bed-With-You.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_3505475407-d776e4d589-o-1.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_Despair.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_IMGP0652-3-4-tonemapped.jpg', fade: 1000},
  { src:'http://chromecastbg.alexmeub.com/images/1080_POD-2013-01-13.jpg', fade: 1000},
  ]
})('overlay', {
  src:''
});
  
  </script>
  </head>
  <body>
<h1 id="Bottom">{{{ $station->title }}}</h1>
<h2 id="Bottom2">Media MachineSL Radio</h2>
<div id="jquery_jplayer_1" class="jp-jplayer"></div>
<div id="Top"><a href="/music"><img src="/images/icon-arrow-open.png" width="60" height="60"  alt=""/></a></div>
</body>
</html>
