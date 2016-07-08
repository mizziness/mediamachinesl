<div id="navigation">
	<div class="c7">	
		<ul class="nav-left">
			<li class="home"><a href="/?access=true{{ !Session::has('demo') ? "" : '&demo=true' }}{{ !Session::has('musicOnly') ? "" : '&musicOnly=true' }}"></a></li>
			@if ( !Session::has('musicOnly') ) 
				<li class="movies"><a href="/movies"></a></li>
				<li class="music"><a href="/radio"></a></li>
				<li class="tv"><a href="/television"></a></li>
				<li class="games"><a href="/games"></a></li>
				<li class="youtube"><a href="/youtube"></a></li>
				@if ( !Session::has('demo') && !App::environment('pg') ) 
					<li class="adult"><a href="/adult"></a></li>
				@endif
			@endif
		</ul>
	</div>
	<div class="c5">
		<ul class="nav-right">
			<li class="search">
				@if ( strpos(Route::getCurrentRoute()->getPath(), "adult") === false && strpos(Route::getCurrentRoute()->getPath(), "youtube") === false )
				{{ Form::open(array('action' => array('MediaController@search'), 'method' => 'POST', 'class' => 'cf')) }}
					{{ Form::text("search", isset($searchTerm) ? $searchTerm : NULL, array("class" => "search-box", "placeholder" => "Search...")) }}
					{{ Form::submit('Search', array("class" => "search-button")) }}
				{{ Form::close() }}
				@endif
				@if ( strpos(Route::getCurrentRoute()->getPath(), "youtube") !== false )
					{{ Form::open(array('url' => "/youtube/browse/search", 'method' => 'GET', 'class' => 'cf')) }}
						{{ Form::text("search", isset($searchTerm) ? $searchTerm : NULL, array("class" => "yt-search search-box", "placeholder" => "Search YouTube")) }}
						{{ Form::submit('Search', array("class" => "search-button")) }}
					{{ Form::close() }}
				@endif
                @if ( strpos(Route::getCurrentRoute()->getPath(), "adult") !== false )
					{{ Form::open(array('url' => "/adult/browse/search", 'method' => 'GET', 'class' => 'cf')) }}
						{{ Form::text("search", isset($searchTerm) ? $searchTerm : NULL, array("class" => "rt-search search-box", "placeholder" => "Search RedTube")) }}
						{{ Form::submit('Search', array("class" => "search-button")) }}
					{{ Form::close() }}
				@endif
			</li>
            <li class="settings"><a href="/settings"><i class="fa fa-2x fa-cogs" aria-hidden="true"></i></a><li>
			<li class="help"><a href="/help"><i class="fa fa-2x fa-question" aria-hidden="true"></i></a></li>
		</ul>
	</div>
</div>