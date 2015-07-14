<h3>Add New Radio Background</h3>
{{ Form::open(array('action' => array('AdminController@addBackground'), 'method' => 'POST', 'files' => true, 'class' => 'admin-form basic cf')) }}	
	{{ Form::label("backgroundURL", "Enter Full Background URL") }}
	{{ Form::text("backgroundURL", "", array("placeholder" => "http://...")) }}	
	
	{{ Form::label("backgroundImage", "Upload a Background") }}
	{{ Form::file("backgroundImage", array("id" => "backgroundImage")) }}
	
	<br/><br/>
	{{ Form::submit('Add Background', array("class" => "aButton bgBlue")) }}
{{ Form::close() }}