<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th>Thumb</th>
			<th>Title</th>
			<th>Category</th>
			<th>URL</th>
            <th>New Release</th>
			<th>Active</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach ( $newReleases as $new ) 
		<?php		
			$url = $new->url;	
			if ( strpos($new->url, "http") === false ) {
				$url = "http://www.mediamachinesl.com/mediacentersl" . $new->url;
			}
		?>
		<tr>
			<td><img class="thumbnail" src="{{ $new->thumbnail }}"></td>
			<td>{{ $new->title }}</td>
			<td class="center">{{ $new->category }}</td>
			<td class="center"><a href="{{ $url }}">URL</a></td>
            <td class="center">{{ $new->newRelease == 1 ? '<span class="yes"><i class="fa fa-check"></i></span>' : '<span class="no"><i class="fa fa-times"></i></span>' }}</td>
			<td class="center">{{ $new->active == 1 ? '<span class="yes"><i class="fa fa-check"></i></span>' : '<span class="no"><i class="fa fa-times"></i></span>' }}</td>
			<td class="actions center">
				<a class="edit" href="/media/edit/{{ $new->id }}" title="Edit"><i class="fa fa-pencil-square"></i></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
