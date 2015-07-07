<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th>Thumb</th>
			<th>Title</th>
			<th>URL</th>
			<th>Featured</th>
			<th>New Release</th>
			<th>Active</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach ( $games as $game ) 
		<tr>
			<td><img class="thumbnail" src="{{ $game->thumbnail }}"></td>
			<td>{{ $game->title }}</td>
			<td class="center"><a href="{{ $game->url }}">URL</a></td>
			<td class="center">{{ $game->featured == 1 ? '<span class="yes"><i class="fa fa-check"></i></span>' : '<span class="no"><i class="fa fa-times"></i></span>' }}</td>
			<td class="center">{{ $game->newRelease == 1 ? '<span class="yes"><i class="fa fa-check"></i></span>' : '<span class="no"><i class="fa fa-times"></i></span>' }}</td>
			<td class="center">{{ $game->active == 1 ? '<span class="yes"><i class="fa fa-check"></i></span>' : '<span class="no"><i class="fa fa-times"></i></span>' }}</td>
			<td class="actions center">
				<a class="edit" href="/media/edit/{{ $game->id }}" title="Edit"><i class="fa fa-pencil-square"></i></a>
				<a class="delete" href="/media/delete/{{ $game->id }}" title="Delete"><i class="fa fa-minus-square"></i></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
