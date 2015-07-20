@extends('page')

@section('title', 'Games')

@section('content')
	@if ( Session::has('demo') ) 
	<div id="demo-screen"></div>
	@endif
	<div id="games" class="media inner-container">
		@include('modules.navigation')
		
		<div class="c10 s1">
			<div id="carousel" class="cf">
				<div id="carousel-inner">
					<?php $count = 1; ?>
					@foreach ( $games as $index => $game )
						@if ( $count == 1 )
							<div class="media-row">
						@endif
						<div class="media-box cf">
							<a href="/games/play/{{ $game->id }}">
							<div class="thumbnail"><img class="thumbnail" src="{{ $game->thumbnail }}"></div>
							<div class="title">{{ $game->title }}</div>
							<div class="description">{{ $game->description }}</div>
							</a>
						</div>
						@if ( $count == 3 || $index + 1 === count($games) )
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