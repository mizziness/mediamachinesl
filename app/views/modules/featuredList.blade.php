<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th>Thumb</th>
			<th>Title</th>
			<th>Category</th>
			<th>URL</th>
            <th>Featured</th>
			<th>Active</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach ( $featured as $media ) 
		<?php		
			$url = $media->url;	
			if ( strpos($media->url, "http") === false ) {
				$url = "http://www.mediamachinesl.com/mediacentersl" . $media->url;
			}
		?>
		<tr>
			<td><img class="thumbnail" src="{{ $media->thumbnail }}"></td>
			<td>{{ $media->title }}</td>
			<td class="center">{{ $media->category }}</td>
			<td class="center"><a href="{{ $url }}">URL</a></td>
            <td class="center">{{ $media->featured == 1 ? '<span class="yes"><i class="fa fa-check"></i></span>' : '<span class="no"><i class="fa fa-times"></i></span>' }}</td>
			<td class="center">{{ $media->active == 1 ? '<span class="yes"><i class="fa fa-check"></i></span>' : '<span class="no"><i class="fa fa-times"></i></span>' }}</td>
			<td class="actions center">
				<a class="edit" href="/media/edit/{{ $media->id }}" title="Edit"><i class="fa fa-pencil-square"></i></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
