<?php

$mediaTypes = array(
	'' => 'Select One',
	"movies" => "Movies",
	"radio" => "Radio",
	"television" => "Television",
	"games" => "Games",
);

$movieCount = DB::table("media")->where("category", "movies")->count();
$radioCount = DB::table("media")->where("category", "radio")->count();
$tvCount = DB::table("media")->where("category", "television")->count();
$gamesCount = DB::table("media")->where("category", "games")->count();
$backgroundsCount = DB::table("backgrounds")->count();
$demoCount = DB::table("media")->where("demo", "1")->count();
$newCount = DB::table("media")->where("newRelease", "1")->count();
$featuredCount = DB::table("media")->where("featured", "1")->count();
	
?>
@extends('fullpage')

@section('title', 'Administration')

@section('content')
	<div id="admin" class="inner-container">
		<div class="row">
			<h1>Administration</h1>
		</div>
		
		@if ( Session::has("message") )
			<div id="message-box" class="row">
				<div class="message">{{ Session::get("message") }}</div>
			</div>
		@endif
		
		<div class="row">
			<div class="c8">
				
				<div id="movies-list" class="table-list cf">
					<h2>Movies</h2>
					<p>There are currently <strong>{{ $movieCount }}</strong> movies in the database.  Displaying the <strong>5</strong> most recently added.</p>
					@include('modules.moviesList')
					<p><a href="/admin/view/movies" class="aButton bgBlue" style="float: right; margin-top: 10px;">View All <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
				
				<div id="tv-list" class="table-list cf">
					<h2>Television Shows</h2>
					<p>There are currently <strong>{{ $tvCount }}</strong> television episodess in the database.  Displaying the <strong>5</strong> most recently added.</p>
					@include('modules.televisionList')
					<p><a href="/admin/view/television" class="aButton bgBlue" style="float: right; margin-top: 10px;">View All <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>	
				
				<div id="radio-list" class="table-list cf">
					<h2>Radio Stations</h2>
					<p>There are currently <strong>{{ $radioCount }}</strong> radio stations in the database.  Displaying the <strong>5</strong> most recently added.</p>
					@include('modules.radioList')
					<p><a href="/admin/view/radio" class="aButton bgBlue" style="float: right; margin-top: 10px;">View All <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
				
				<div id="games-list" class="table-list cf">
					<h2>Games</h2>
					<p>There are currently <strong>{{ $gamesCount }}</strong> games in the database.  Displaying the <strong>5</strong> most recently added.</p>
					@include('modules.gamesList')
					<p><a href="/admin/view/games" class="aButton bgBlue" style="float: right; margin-top: 10px;">View All <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
				
				<div id="backgrounds-list" class="table-list cf">
					<h2>Radio Backgrounds</h2>
					<p>There are currently <strong>{{ $backgroundsCount }}</strong> backgrounds in the database.  Displaying the <strong>8</strong> most recently added.</p>
					@include('modules.backgroundsList')
					<p><a href="/admin/view/backgrounds" class="aButton bgBlue" style="float: right; margin-top: 10px;">View All <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
				
				<div id="demo-list" class="table-list cf">
					<h2>Demo Items</h2>
					<p>There are currently <strong>{{ $demoCount }}</strong> items marked for demo in the database.  Displaying the <strong>5</strong> most recently added.</p>
					@include('modules.demoList')
					<p><a href="/admin/view/demo" class="aButton bgBlue" style="float: right; margin-top: 10px;">View All <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
                
                <div id="new-list" class="table-list cf">
					<h2>New Releases</h2>
					<p>There are currently <strong>{{ $newCount }}</strong> items marked as new releases in the database.  Displaying the <strong>5</strong> most recently added.</p>
					@include('modules.newReleasesList')
					<p><a href="/admin/view/newReleases" class="aButton bgBlue" style="float: right; margin-top: 10px;">View All <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>	
                
                <div id="featured-list" class="table-list cf">
					<h2>Featured Items</h2>
					<p>There are currently <strong>{{ $featuredCount }}</strong> items marked as featured in the database.  Displaying the <strong>5</strong> most recently added.</p>
					@include('modules.featuredList')
					<p><a href="/admin/view/featured" class="aButton bgBlue" style="float: right; margin-top: 10px;">View All <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>		
				
			</div>
			<div class="c4">
				<div class="moduleBox">@include('modules.addMedia')</div>
				<div class="moduleBox">@include('modules.addBackground')</div>
			</div>
		</div>
		
		
    </div>
@endsection