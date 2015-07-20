@extends('page')

@section('title', 'Movies')

@section('content')
	@if ( Session::has('demo') ) 
	<div id="demo-screen"></div>
	@endif
<div id="search" class="media inner-container"> @include('modules.navigation')
	<div class="c10 s1">
		<div id="carousel" class="cf">
			<div id="carousel-inner">
				<?php $count = 1; ?>
				@foreach ( $results as $index => $result )
				@if ( $count == 1 )
				<div class="media-row"> @endif
					<div class="media-box cf"> <a href="/{{ $result->category }}/play/{{ $result->id }}">
						<div class="thumbnail"><img class="thumbnail" src="{{ $result->thumbnail }}"></div>
						<div class="title">{{ $result->title }}</div>
						<div class="description">{{ $result->description }}</div>
						</a> </div>
					@if ( $count == 3 || $index + 1 === count($results) ) </div>
				@endif
				<?php 
					$count++; 
					if ( $count > 3 ) { $count = 1; }
				?>
				@endforeach </div>
		</div>
		<div class="previous nav-button"><span>&#171;</span> Previous</div>
		<div class="next nav-button">Next <span>&#187;</span></div>
	</div>
</div>
@endsection