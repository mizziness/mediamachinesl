<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th>Thumb</th>
			<th>Title</th>
			<th>Category</th>
			<th>URL</th>
			<th>Active</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach ( $demos as $demo ) 
		<?php		
			$url = $demo->url;	
			if ( strpos($demo->url, "http") === false ) {
				$url = "http://www.mediamachinesl.com/mediacentersl" . $demo->url;
			}
		?>
		<tr>
			<td><img class="thumbnail" src="{{ $demo->thumbnail }}"></td>
			<td>{{ $demo->title }}</td>
			<td class="center">{{ $demo->category }}</td>
			<td class="center"><a href="{{ $url }}">URL</a></td>
			<td class="center">{{ $demo->active == 1 ? '<span class="yes"><i class="fa fa-check"></i></span>' : '<span class="no"><i class="fa fa-times"></i></span>' }}</td>
			<td class="actions center">
				<a class="edit" href="/media/edit/{{ $demo->id }}" title="Edit"><i class="fa fa-pencil-square"></i></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
