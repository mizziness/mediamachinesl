<div id="navigation">
	<div class="c7">	
		<ul class="nav-left">
			<li class="home"><a href="/"></a></li>
			<li class="movies"><a href="/movies"></a></li>
			<li class="music"><a href="/radio"></a></li>
			<li class="tv"><a href="/television"></a></li>
			<li class="games"><a href="/games"></a></li>
			<li class="youtube"><a href="/youtube"></a></li>
			<li class="adult"><a href="/adult"></a></li>
		</ul>
	</div>
	<div class="c5">
		<ul class="nav-right">
			<li class="search">
				@if ( strpos(Route::getCurrentRoute()->getPath(), "adult") === false )
				{{ Form::open(array('action' => array('MediaController@search'), 'method' => 'POST', 'class' => 'cf')) }}
					{{ Form::text("search", isset($searchTerm) ? $searchTerm : NULL, array("class" => "search-box", "placeholder" => "Search...")) }}
					{{ Form::submit('Search', array("class" => "search-button")) }}
				{{ Form::close() }}
				@endif
			</li>
			<li class="help"><a href="/help"></a></li>
		</ul>
	</div>
</div>