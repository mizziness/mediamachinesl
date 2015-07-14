<div class="row">

	@foreach ( $backgrounds as $index => $bg ) 
		<div class="c3">
			<div class="thumb">
				<img class="bg thumbnail" src="{{ $bg->url }}" />
				<div class="actions">
					<a class="delete" href="/backgrounds/delete/{{ $bg->id }}" title="Delete"><i class="fa fa-minus-square"></i></a>
				</div>
			</div>
		</div>
	@endforeach
		
</div>