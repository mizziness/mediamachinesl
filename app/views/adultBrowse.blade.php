@extends('page')

@section('title', 'Adult - Browse RedTube')

@section('content')
	<div id="adult" class="media inner-container">
		@include('modules.navigation')
		
		<div class="c2">
			<div id="side-nav">
				<img src="/images/redtube-logo2.png">
				<h3>Viewing:</h3>
				<p class="current">{{ $browseType }}:<br>{{ $prettyValue }}</p>
				
				<h3>Browse By:</h3>
				<p>					
					<a id="rtCategories" href="#"><i class="fa fa-folder-open"></i> Categories</a>
					<a id="rtTags" href="#"><i class="fa fa-tag"></i> Tags</a>
					<a id="rtStars" href="#"><i class="fa fa-star"></i> Stars / Actors</a>
				</p>
			</div>
		</div>
		<div class="c10">
			<div id="carousel" class="cf">
				<div id="carousel-inner">
				
				@if ( $results && isset($results["videos"]) ) 
					
					<?php $count = 1; ?>
					@foreach ( $results["videos"] as $index => $result )
						@if ( $count == 1 )
							<div class="media-row">
						@endif
						<div class="media-box cf">
							<a href="/adult/play/{{ $result["video"]["video_id"] }}">
							<div class="thumbnail"><img class="thumbnail" src="{{ $result["video"]["thumb"] }}"></div>
							<div class="title">{{ str_replace(".", " ", $result["video"]["title"]) }}</div>
							<div class="description">
								Duration: {{ $result["video"]["duration"] }}<br>
								Posted: {{ date("n/j/Y", strtotime($result["video"]["publish_date"])) }}<br>
								Rating: {{ $result["video"]["rating"] == "0.00" ? "Unrated" : $result["video"]["rating"] }}
							</div>
							</a>
						</div>
						@if ( $index + 1 === count($results["videos"]) && count($results["videos"]) > 20 )
							<div class="media-box cf">
								<a class="more" href="/adult/browse/{{ $browseType }}/{{ $browseValue }}/{{ $page + 1 }}">More Results &#187;</a>
							</div>
						@endif 
						@if ( $count == 3 || $index + 1 === count($results["videos"]) )
							</div>
						@endif
						<?php 
							$count++; 
							if ( $count > 3 ) { $count = 1; }
						?>
					@endforeach
				
				@else
					<p style="color: #ffffff; padding-top: 50px; text-align: center; width: 100%;">Sorry, no videos available!</p>				
				@endif
					
				</div>
			</div>
			<div class="previous nav-button"><span>&#171;</span> Previous</div>
			<div class="next nav-button">Next <span>&#187;</span></div>
		</div>
		
		<div id="adult-categories" class="modal">
			<h3>Browse RedTube Categories <a class="modal-close"><i class="fa fa-times-circle-o"></i></a></h3>
			<?php
				$catColEnd =  ceil(count($categories) / 5);
				$catCount = 1;
				$catIndex = 0;
			?>
			@foreach ( $categories as $key => $cat )
				@if ( $catCount == 1 )
					<div class='modal-column'>
				@endif
				<a class="adult-cat" href="/adult/browse/category/{{ $key }}">{{ $cat }}</a>
				@if ( $catCount == $catColEnd || $catIndex + 1 === count($categories) )
					</div>
				@endif						
				<?php
					$catCount++;
					$catIndex++;
					if ( $catCount > $catColEnd ) { $catCount = 1; }
				?>
			@endforeach
		</div>
		
		<div id="adult-tags" class="modal">
			<h3>Browse RedTube Tags <a class="modal-close"><i class="fa fa-times-circle-o"></i></a></h3>
			<?php
				$tagColEnd =  ceil(count($tags) / 5);
				$tagCount = 1;
				$tagIndex = 0;
			?>
			@foreach ( $tags as $key => $tag )
				@if ( $tagCount == 1 )
					<div class='modal-column'>
				@endif
				<a class="adult-cat" href="/adult/browse/tag/{{ $key }}">{{ $tag }}</a>
				@if ( $tagCount == $tagColEnd || $tagIndex + 1 === count($tags) )
					</div>
				@endif						
				<?php
					$tagCount++;
					$tagIndex++;
					if ( $tagCount > $tagColEnd ) { $tagCount = 1; }
				?>
			@endforeach
		</div>
		
		<div id="adult-stars" class="modal">
			<h3>Browse RedTube Stars & Actors <a class="modal-close"><i class="fa fa-times-circle-o"></i></a></h3>
			<?php
				$starColEnd =  ceil(count($stars) / 5);
				$starCount = 1;
				$starIndex = 0;
			?>
			@foreach ( $stars as $key => $star )
				@if ( $starCount == 1 )
					<div class='modal-column'>
				@endif
				<a class="adult-cat" href="/adult/browse/star/{{ $key }}">{{ $star }}</a>
				@if ( $starCount == $starColEnd || $starIndex + 1 === count($stars) )
					</div>
				@endif						
				<?php
					$starCount++;
					$starIndex++;
					if ( $starCount > $starColEnd ) { $starCount = 1; }
				?>
			@endforeach
		</div>
    </div>
@endsection