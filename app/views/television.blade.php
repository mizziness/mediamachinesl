@extends('page')

@section('title', 'Television Shows')

@section('content')
	@if ( Session::has('demo') ) 
	<div id="demo-screen"></div>
	@endif
	<div id="television" class="media inner-container">
		@include('modules.navigation')

		@if ( !isset($episodes) )
		
<!-- TV Show List -->
			<div class="c10 s1">
				<div id="carousel" class="cf">
					<div id="carousel-inner">
						<?php $count = 1; ?>
						@foreach ( $parents as $index => $parent )
							<?php
								$example = DB::table("media")->where("parent", $parent)->first();
							?>
							@if ( $count == 1 )
								<div class="media-row">
							@endif
							<div class="media-box cf">
								<a href="/television/show/{{ $example->parentSlug }}/">
									<div class="thumbnail"><img class="thumbnail" src="{{ $example->thumbnail }}"></div>
									<div class="title">{{ $parent }}</div>
								</a>
							</div>
							@if ( $count == 3 || $index + 1 === count($parents) )
								</div>
							@endif
							<?php 
								$count++; 
								if ( $count > 3 ) { $count = 1; }
							?>
						@endforeach
					</div>
				</div>
				
				@if ( count($parents) > 6 )
					<div class="previous nav-button"><span>&#171;</span> Previous</div>
					<div class="next nav-button">Next <span>&#187;</span></div>
				@endif
			</div>			
						
		@else
		
<!-- TV Episode List -->

			<div class="c2">
				<div id="featured">
					<h3>Latest Episode</h3>
					<a href="/television/play/{{ $latestEpisode->id }}">
						<div class="thumbnail"><img class="thumbnail" src="{{ $latestEpisode->thumbnail }}"></div>
						<div class="title">{{ $latestEpisode->title }}</div>
					</a>
					<a class="go-back" href="/television"></a>
				</div>
			</div>
			<div class="c10">
				<div id="carousel" class="cf">
					<div id="carousel-inner">
						<?php $count = 1; ?>
						@foreach ( $episodes as $index => $episode )
							@if ( $count == 1 )
								<div class="media-row">
							@endif
							<div class="media-box cf">
								<a href="/television/play/{{ $episode->id }}">
								<div class="thumbnail"><img class="thumbnail" src="{{ $episode->thumbnail }}"></div>
								<div class="title">{{ $episode->title }}</div>
								<div class="description">{{ $episode->description }}</div>
								</a>
							</div>
							@if ( $count == 3 || $index + 1 === count($episodes) )
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
		
		@endif
		
    </div>
@endsection