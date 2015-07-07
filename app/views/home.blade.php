@extends('page')

@section('title', 'Welcome')

@section('content')
	<div id="home" class="media inner-container">
		@include('modules.navigation')
		
		<div class="c10 s1 home-screen">
			<h2><i class="fa fa-star-o"></i> New Releases <i class="fa fa-star-o"></i></h2>
			<div id="new-releases">
				<div id="new-releases-inner">
					@foreach ( $newReleases as $media )
						<div class="new-box">
							<a href="/{{ $media->category }}/play/{{ $media->id }}">
								<div class="thumbnail"><img class="thumbnail" src="{{ $media->thumbnail }}"></div>
								<div class="title">{{ $media->title }}</div>
								<div class="description">{{ $media->description }}</div>
							</a>
						</div>
					@endforeach
				</div>
			</div>
			<div class="previous nav-button"><span>&#171;</span> Previous</div>
			<div class="next nav-button">Next <span>&#187;</span></div>
		</div>
    </div>
@endsection