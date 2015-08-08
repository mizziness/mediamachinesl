@extends('page')

@section('title', 'Welcome')

@section('content')
	<div id="home" class="media inner-container">
		@include('modules.navigation')
		
		<div class="c10 s1 home-screen">
			@if ( Session::has('demo') ) 
				<h2><i class="fa fa-star-o"></i> Demo Content <i class="fa fa-star-o"></i></h2>
			@elseif ( Session::has('musicOnly') ) 
				<h2><i class="fa fa-star-o"></i> Radio Stations <i class="fa fa-star-o"></i></h2>
			@else
				<h2><i class="fa fa-star-o"></i> New Releases <i class="fa fa-star-o"></i></h2>
			@endif
			<div id="new-releases" class="{{ Session::has('musicOnly') ? "radio" : "" }}">
				<div id="new-releases-inner">
					<?php $count = 1; ?>
					@foreach ( $newReleases as $index => $media )						
						@if ( Session::has('musicOnly') && $count == 1 )
							<div class="radio-page">
						@endif
						<div class="new-box {{ $count === 5 || $count === 10 ? "last" : "" }}">
							<a href="/{{ $media->category }}/play/{{ $media->id }}">
								<div class="thumbnail"><img class="thumbnail" src="{{ $media->thumbnail }}"></div>
								<div class="title">{{ $media->title }}</div>
								<div class="description">{{ $media->description }}</div>
							</a>
						</div>
						@if ( Session::has('musicOnly') && ($count == 10 || $index + 1 === count($newReleases)) )
							</div>
						@endif
						<?php
							$count++; 
							if ( $count > 10 ) { $count = 1; } 
						?>
					@endforeach
				</div>
			</div>
			<div class="previous nav-button"><span>&#171;</span> Previous</div>
			<div class="next nav-button">Next <span>&#187;</span></div>
		</div>
    </div>
@endsection