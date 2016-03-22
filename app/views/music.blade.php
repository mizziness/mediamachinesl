@extends('page')

@section('title', 'Radio')

@section('content')
	@if ( Session::has('demo') ) 
	<div id="demo-screen"></div>
	@endif
	<div id="music" class="media inner-container">
		@include('modules.navigation')
		
		<div class="c2">
			<div id="featured">
				<h3>Featured Station</h3>
				@foreach ( $featured as $station )
					<a href="/radio/play/{{ $station->id }}">
					<div class="thumbnail"><img class="thumbnail" src="/images/default-icon-music.png"></div>
					<div class="title">{{ $station->title }}</div>
					<div class="description">{{ $station->description }}</div>
					</a>
				@endforeach
			</div>
		</div>
		<div class="c10">
			<div id="carousel" class="cf">
				<div id="carousel-inner">
					<?php $count = 1; ?>
					@foreach ( $music as $index => $station )
						@if ( $count == 1 )
							<div class="media-row">
						@endif
						<div class="media-box cf">
							<a href="/radio/play/{{ $station->id }}">
							<!--<div class="thumbnail"><img class="thumbnail" src="{{ $station->thumbnail }}"></div>-->
							<div class="title"><i class="fa fa-music"></i> {{ $station->title }}</div>
							<div class="description">{{ $station->description }}</div>
							</a>
						</div>
						@if ( $count == 3 || $index + 1 === count($music) )
							</div>
						@endif
						<?php 
							$count++; 
							if ( $count > 3 ) { $count = 1; }
						?>
					@endforeach
				</div>
			</div>
			<div class="previous nav-button"><span>&#171;</span> Previous</div>
			<div class="next nav-button">Next <span>&#187;</span></div>
		</div>
    </div>
@endsection