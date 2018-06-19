<table class="default-table">
	<thead>
		<tr>
			<td>#</td>
			<td>Grupo</td>
			<td>Instituição</td>
			<td>Responsável</td>
			<td>Ações</td>
		</tr>
	</thead>
	<tbody>
		@foreach($group_list as $group)
			<tr>
				<td>{{ $group->id }}</td>
				<td>{{ $group->name }}</td>
				<td>{{ $group->instituition->name }}</td>
				<td>{{ $group->user->name }}</td>
				<td>
					{!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'delete']) !!}
						{!! Form::submit('Remover') !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>