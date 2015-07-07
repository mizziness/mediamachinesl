<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th>Thumb</th>
			<th>Title</th>
			<th>Folder</th>
			<th>URL</th>
			<th>Featured</th>
			<th>New Release</th>
			<th>Active</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach ( $television as $movie ) 
		<?php		
			$url = $movie->url;	
			if ( strpos($movie->url, "http") === false ) {
				$url = "http://www.mediamachinesl.com/mediacentersl" . $movie->url;
			}
		?>
		<tr>
			<td><img class="thumbnail" src="{{ $movie->thumbnail }}"></td>
			<td>{{ $movie->title }}</td>
			<td>{{ $movie->parent }}</td>
			<td class="center"><a href="{{ $url }}">URL</a></td>
			<td class="center">{{ $movie->featured == 1 ? '<span class="yes"><i class="fa fa-check"></i></span>' : '<span class="no"><i class="fa fa-times"></i></span>' }}</td>
			<td class="center">{{ $movie->newRelease == 1 ? '<span class="yes"><i class="fa fa-check"></i></span>' : '<span class="no"><i class="fa fa-times"></i></span>' }}</td>
			<td class="center">{{ $movie->active == 1 ? '<span class="yes"><i class="fa fa-check"></i></span>' : '<span class="no"><i class="fa fa-times"></i></span>' }}</td>
			<td class="actions center">
				<a class="edit" href="/media/edit/{{ $movie->id }}" title="Edit"><i class="fa fa-pencil-square"></i></a>
				<a class="delete" href="/media/delete/{{ $movie->id }}" title="Delete"><i class="fa fa-minus-square"></i></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
