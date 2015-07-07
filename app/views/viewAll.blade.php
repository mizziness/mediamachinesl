@extends('fullpage')

@section('title', 'Administration - Viewing {{ $type }}')

@section('content')
	<div id="admin" class="inner-container">
		<div class="row">
			<h1>Administration <a class="admin-home" href="/admin"><i class="fa fa-long-arrow-left"></i> Back to Admin</a></h1>
		</div>
		
		@if ( Session::has("message") )
			<div id="message-box" class="row">
				<div class="message">{{ Session::get("message") }}</div>
			</div>
		@endif
		
		<div class="row">
			<div class="c12">
				
				<div class="table-list cf">
					<h2>{{ $type }} List</h2>
					<p>There are currently <strong>{{ count($media) }}</strong> movie(s) in the database.</p>
					<?php  
						$module = $type . "List";
					?>
					@include('modules.' . $module)
				</div>				
				
			</div>
		</div>
		
		
    </div>
@endsection