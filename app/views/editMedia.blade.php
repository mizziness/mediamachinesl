<?php

$mediaTypes = array(
	'' => 'Select One',
	"movies" => "Movies",
	"radio" => "Radio",
	"television" => "Television",
	"games" => "Games",
);
		
?>

@extends('fullpage')

@section('title', 'Edit Media')

@section('content')
	<div id="admin" class="inner-container">
		
		<div class="row">
			<h1>Edit Media</h1>
			<h2>Editing: {{ $media->title }}</h2>
		</div>
		
		@if ( Session::has("message") )
			<div id="message-box" class="row">
				<div class="message">{{ Session::get("message") }}</div>
			</div>
		@endif
		
		<div class="row">
			<div class="c12">
				
				{{ Form::open(array('action' => array('AdminController@updateMedia', $media->id), 'method' => 'POST', 'files' => true, 'class' => 'admin-form basic cf')) }}
					{{ Form::label("mediaTitle", "Title") }}
					{{ Form::text("mediaTitle", $media->title) }}
					
					{{ Form::label("mediaType", "Choose Media Category") }}
					{{ Form::select("mediaType", $mediaTypes, $media->category) }}
					
					{{ Form::label("mediaURL", "Enter Media URL") }}
					{{ Form::text("mediaURL", $media->url) }}
					
					@if ( !empty($media->thumbnail) ) 
						<br>
						<div class="c2"><img width="90" src="{{ $media->thumbnail }}" style="margin: 0;"></div>
						<div class="c10">
							{{ Form::label("mediaThumb", "Replace the Media Thumnail") }}
							{{ Form::file("mediaThumb", array("id" => "mediaThumb")) }}	
						</div>
						<div class="cf"></div>
						<br>
					@else
						{{ Form::label("mediaThumb", "Upload the Media Thumnail") }}
						{{ Form::file("mediaThumb", array("id" => "mediaThumb")) }}						
					@endif
					
					{{ Form::label("mediaDescription", "Description") }}
					{{ Form::textarea("mediaDescription", $media->description) }}
					
					<label for="featured">Featured: {{ Form::checkbox("featured", "1", $media->featured ? "true" : "") }}</label>
					<label for="newRelease">New Release: {{ Form::checkbox("newRelease", "1", $media->newRelease ? "true" : "") }}</label>	
					<label for="active">Active: {{ Form::checkbox("active", "1", $media->active ? "true" : "") }}</label>
					
					{{ Form::label("mediaParent", "Parent Folder") }}
					<p class="note">Choose an existing parent folder from the list or enter a new one.</p>
					{{ Form::select("mediaParentExisting", $parents, $media->parent) }}
					{{ Form::text("mediaParent") }}
					
					<br/>
					{{ Form::submit('Save Changes', array("class" => "aButton bgBlue")) }}
				{{ Form::close() }}			
				
			</div>
		</div>
		
		
    </div>
@endsection