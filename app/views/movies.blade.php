@extends('page')

@section('title', 'Movies')

@section('content')
	<div id="movies" class="media inner-container">
		@include('modules.navigation')
		
		<div class="c2">
			<div id="featured">
				<h3>Featured Movie</h3>
				@foreach ( $featured as $movie )
					<a href="/movies/play/{{ $movie->id }}">
						<div class="thumbnail"><img class="thumbnail" src="{{ $movie->thumbnail }}"></div>
						<div class="title">{{ $movie->title }}</div>
						<div class="description">{{ $movie->description }}</div>
					</a>
				@endforeach
			</div>
		</div>
		<div class="c10">
			<div id="carousel" class="cf">
				<div id="carousel-inner">
					<?php $count = 1; ?>
					@foreach ( $movies as $index => $movie )
						@if ( $count == 1 )
							<div class="media-row">
						@endif
						<div class="media-box cf">
							<a href="/movies/play/{{ $movie->id }}">
							<div class="thumbnail"><img class="thumbnail" src="{{ $movie->thumbnail }}"></div>
							<div class="title">{{ $movie->title }}</div>
							<div class="description">{{ $movie->description }}</div>
							</a>
						</div>
						@if ( $count == 3 || $index + 1 === count($movies) )
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