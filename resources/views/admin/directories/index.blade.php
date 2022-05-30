@extends('adminlte::page')

@section('content')
	<h3 class="font-weight-bold py-3">Directorios <a href="{{ route('admin.directories.create') }}" class="btn btn-success ml-2 rounded-circle"><i class='fas fa-plus'></i></a></h3>

	<table class="table table-striped">
		<thead class="table-dark">
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Estado</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach($directories as $directory)
				<tr>
					<td>{{ $directory->id }}</td>
					<td>{{ $directory->name }}</td>
					<td>{{ $directory->description }}</td>
					<td>{!! $directory->status == "active" ? "<span class='text-success'>Activo</span>" : "<span class='text-danger'>Inactivo</span>" !!}</td>
					<td width="250px">
						<div class="row align-items-center">
							<div class="col">
  							<a href="{{ route('admin.directories.show', $directory) }}"><i class="fas fa-eye"></i></a>
							</div>
							<div class="col">
  							<a href="{{ route('admin.directories.edit', $directory) }}"><i class="fas fa-pen"></i></a>
							</div>
							<div class="col">
								@if($directory->status == "forgotten")
				  				<form action="{{ route('admin.directories.reactivate', $directory) }}" method="POST">
					  				@csrf
					  				@method("PUT")
					  				<div class="activateBtn d-flex align-items-center">
					    				<i class="fas fa-arrow-up" title="Activar"></i>
					  					<button type="submit" class="small btn btn-sm btn-outline-success ml-2" style="display: none">Presiona aquí para confirmar</button>
					  				</div>
				  			@else
				  				<form action="{{ route('admin.directories.destroy', $directory) }}" method="POST">
					  				@csrf
					  				@method("DELETE")
					  				<div class="deleteBtn d-flex align-items-center">
					    				<i class="fas fa-arrow-down" title="Desactivar"></i>
					  					<button type="submit" class="small btn btn-sm btn-outline-danger ml-2" style="display: none">Presiona aquí para confirmar</button>
					  				</div>
				  			@endif
				  			</form>
							</div>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

@section("js")
	<script>
		$(".deleteBtn").click(function () {
			$(this).removeClass("text-secondary");
			$(this).addClass("text-danger");
			$(this).children()[1].style.display = "block";
		});

		$(".activateBtn").click(function () {
			$(this).removeClass("text-secondary");
			$(this).addClass("text-success");
			$(this).children()[1].style.display = "block";
		});
	</script>
@endsection
