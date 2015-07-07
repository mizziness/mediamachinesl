<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th>Title</th>
			<th>URL</th>
			<th>Featured</th>
			<th>New Release</th>
			<th>Active</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach ( $radio as $station ) 
		<tr>
			<td>{{ $station->title }}</td>
			<td class="center"><a href="{{ $station->url }}">URL</a></td>
			<td class="center">{{ $station->featured == 1 ? '<span class="yes"><i class="fa fa-check"></i></span>' : '<span class="no"><i class="fa fa-times"></i></span>' }}</td>
			<td class="center">{{ $station->newRelease == 1 ? '<span class="yes"><i class="fa fa-check"></i></span>' : '<span class="no"><i class="fa fa-times"></i></span>' }}</td>
			<td class="center">{{ $station->active == 1 ? '<span class="yes"><i class="fa fa-check"></i></span>' : '<span class="no"><i class="fa fa-times"></i></span>' }}</td>
			<td class="actions center">
				<a class="edit" href="/media/edit/{{ $station->id }}" title="Edit"><i class="fa fa-pencil-square"></i></a>
				<a class="delete" href="/media/delete/{{ $station->id }}" title="Delete"><i class="fa fa-minus-square"></i></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
