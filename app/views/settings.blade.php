@extends('page')

@section('title', 'Your Settings')

@section('content')
<div id="settings" class="media inner-container"> 
	@include('modules.navigation')
    <div id="settings-container">
    	<div class="row cf">
        
        	<div class="c3">
            	<p style="padding-bottom: 31px;"><img src="/images/mmsl-logo.png" /></p>
                @if ( $customer && $tv )
                <p style="padding-bottom: 5px;"><strong>TV Owner:</strong> {{ $customer->slname }}</p>
                <p><strong>MMSL Version:</strong> {{ $tv->version }}</p>
                @endif
            </div>
            <div class="c9">
            	<div class="scroll-pane">
            		<h1>Your MMSL Settings</h1>
                    <div><strong>Movie Player:</strong>
                    	<p style="font-size: 14px;">
                            Here, you can choose which player would you like to use for playing movies and TV episodes in MMSL.  
                            Newer viewers (4.0+) should use the <strong>Chromium</strong> option as the legacy player will not work for those viewers.  However, if you have an older viewer, you can try switching to the Legacy player.
                        </p>
                    	@if ( Session::has("message") )
                            <div id="message-box">
                                <div class="message">{{ Session::get("message") }}</div>
                            </div>
                        @endif
                        
                        @if ( $customer && $tv )
                        	{{ Form::open(array('action' => array('HomeController@saveSettings', $customer->id), 'method' => 'POST', 'class' => 'admin-form basic cf')) }}
                            	<label>{{ Form::radio('player', 'chromium', $customer->optionPlayer == "chromium" ); }} Chromium Player</label> &nbsp;&nbsp;
                                <label>{{ Form::radio('player', 'legacy', $customer->optionPlayer == "legacy" ); }} Legacy Player </label>
                                {{ Form::submit('Save', array("class" => "aButton bgBlue smButton")) }}
                        @else 
                        	<?php
								$usePlayer = "chromium";
								if ( Session::has("tempPlayer") ) {
									$usePlayer = Session::get("tempPlayer");
								} 
							?>
                        	{{ Form::open(array('action' => array('HomeController@saveSettings', 0), 'method' => 'POST', 'class' => 'admin-form basic cf')) }}
                        
                        	<label>{{ Form::radio('player', 'chromium', $usePlayer  == "chromium" ); }} Chromium Player</label> &nbsp;&nbsp;
                            <label>{{ Form::radio('player', 'legacy', $usePlayer == "legacy" ); }} Legacy Player </label>
                            {{ Form::submit('Save', array("class" => "aButton bgBlue smButton")) }}  
                        @endif                    
                        {{ Form::close() }}
                     </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection