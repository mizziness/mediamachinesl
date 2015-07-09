@extends('page')

@section('title', 'Help & Support')

@section('content')
<div id="help" class="media inner-container"> 
	@include('modules.navigation')
	<div id="help-container" class="scroll-pane">
		<div class="row cf">
			<div class="c3"><img src="/images/mmsl-logo.png" /></div>
			<div class="c9"><h1>Unable to experience Media MachineSL videos?</h1></div>
		</div>
		<div class="row cf">
			<div class="c12">
				<p>Follow the steps below to get the best media experience in SecondLife.</p>
				<h3>First, do these...</h3>
				<ul>
					<li><i class="fa fa-check-square-o"></i> <strong>Download Flash</strong> (Windows Users) ==&gt; <a href="http://get.adobe.com/flashplayer/otherversions/" target="_blank">http://get.adobe.com/flashplayer/otherversions/ </a></li>
					<li><i class="fa fa-check-square-o"></i> <strong>Download Quicktime</strong> (Mac Users) ==&gt; <a href="http://www.apple.com/quicktime/download/" target="_blank">http://www.apple.com/quicktime/download/</a></li>
					<li><i class="fa fa-check-square-o"></i> Exit out of SecondLife and log back in after installation of the above.</li>
					<li><i class="fa fa-check-square-o"></i> Disable the Land Music and enable the Media (picture below)<br><img src="/images/MediaButton.png" width="500"></li>
					<li><i class="fa fa-check-square-o"></i> Check your preferences (Ctrl + P) (picture below)<br><img src="/images/soundsource.png" width="500"></li>
					<li><i class="fa fa-check-square-o"></i> Increase Sound Rolloff to avoid Media MachineSL audio fading as you move further away.</li>
					<li><i class="fa fa-check-square-o"></i> Enable Scripts so the media center will be in sync for you and your guests.</li>
					<li><i class="fa fa-check-square-o"></i> If you can hear the television but can not see it, read over <a href="http://community.secondlife.com/t5/Technical/Why-can-t-I-see-any-media-on-a-prim-I-hear-it-but-only-see-a/qaq-p/2259285" target="_blank">this Q&A from the SL Forums</a></li>
					<li><i class="fa fa-check-square-o"></i> Enable YouTube theater mode (picture below)<br><img src="/images/TheaterMode.png" width="500" /></li>
				</ul>
			</div>
		</div>	
	</div>
</div>
@endsection