@extends('page')

@section('title', 'YouTube')

@section('content')
	<div id="youtube" class="media inner-container">
		@include('modules.navigation')
		
		<div class="c2">
			<div id="side-nav">
				<img src="/images/YouTube-Transparent-Logo.png">
				<h3>Viewing:</h3>
				<p class="current">24 Most Popular</p>
				<h3>Browse By:</h3>
				<p>					
					<a id="ytCategories" href="#"><i class="fa fa-folder-open"></i> Categories</a>
				</p>				
			</div>
		</div>
		<div class="c10">
			<div id="carousel" class="cf">
				<div id="carousel-inner">
				
					<?php $count = 1; ?>
					@foreach ( $ytBest as $index => $result )
						@if ( $count == 1 )
							<div class="media-row">
						@endif
						<div class="media-box cf">
							<a href="/youtube/play/{{ $result["id"] }}">
							<div class="thumbnail"><img class="thumbnail" src="{{ $result["snippet"]["thumbnails"]["medium"]["url"] }}"></div>
							<div class="title">{{ str_replace(".", " ", $result["snippet"]["title"]) }}</div>
							<div class="description">
								Posted: {{ date("n/j/Y", strtotime($result["snippet"]["publishedAt"])) }}<br>
								Channel: {{ $result["snippet"]["channelTitle"] }}
							</div>
							</a>
						</div> 
						@if ( $count == 3 || $index + 1 === count($ytBest) )
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
		
		<div id="youtube-categories" class="modal">
			<h3>Browse YouTube Categories <a class="modal-close"><i class="fa fa-times-circle-o"></i></a></h3>
			<?php
				$catColEnd =  ceil(count($ytCategories) / 5);
				$catCount = 1;
				$catIndex = 0;
			?>
			@foreach ( $ytCategories as $key => $cat )
				@if ( $catCount == 1 )
					<div class='modal-column'>
				@endif
				<a class="yt-cat" href="/youtube/browse/category/{{ $cat["id"] }}">{{ $cat["snippet"]["title"] }}</a>
				@if ( $catCount == $catColEnd || $catIndex + 1 === count($ytCategories) )
					</div>
				@endif						
				<?php
					$catCount++;
					$catIndex++;
					if ( $catCount > $catColEnd ) { $catCount = 1; }
				?>
			@endforeach
		</div>
	
    </div>
@endsection