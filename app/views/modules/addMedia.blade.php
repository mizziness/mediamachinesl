<h3>Add New Media</h3>
{{ Form::open(array('action' => array('AdminController@addMedia'), 'method' => 'POST', 'files' => true, 'class' => 'admin-form basic cf')) }}
	{{ Form::label("mediaTitle", "Title") }}
	{{ Form::text("mediaTitle") }}
	
	{{ Form::label("mediaType", "Choose Media Category") }}
	{{ Form::select("mediaType", $mediaTypes) }}
	
	{{ Form::label("mediaURL", "Enter Media URL") }}
	{{ Form::text("mediaURL") }}	
	
	{{ Form::label("mediaThumb", "Upload the Media Thumnail") }}
	{{ Form::file("mediaThumb", array("id" => "mediaThumb")) }}	
	
	{{ Form::label("mediaDescription", "Description") }}
	{{ Form::textarea("mediaDescription") }}
	
	<label for="featured">Featured: {{ Form::checkbox("featured", "1") }}</label>
	<label for="newRelease">New Release: {{ Form::checkbox("newRelease", "1") }}</label>
	<label for="demo">Demo: {{ Form::checkbox("demo", "1") }}</label>
	<label for="active">Active: {{ Form::checkbox("active", "1", true) }}</label>
	
	{{ Form::label("mediaParent", "Parent Folder") }}
	<p class="note">Choose an existing parent folder from the list or enter a new one.</p>
	{{ Form::select("mediaParentExisting", $parents) }}
	{{ Form::text("mediaParent") }}
	
	<br/>
	{{ Form::submit('Add Media', array("class" => "aButton bgBlue")) }}
{{ Form::close() }}