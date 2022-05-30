@extends('adminlte::page')

@section('content')
	<div class="py-3">
		<a href="{{ route('admin.directories.index') }}"><i class="fas fa-arrow-left"></i> Regresar</a>	
	</div>
	<h3 class="font-weight-bold pb-3"><small class="text-secondary mr-1"><i class="fas fa-folder-open"></i></small> {{ $directory->name }} <a href="{{ route('admin.directories.edit', $directory) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-pen"></i></a> <small class="text-secondary mx-1"><i class="fas fa-arrow-right"></i></small> <a href="{{ route('admin.newsletters.create', $directory) }}" class="btn btn-success rounded-circle" title="Añadir archivo"><i class='fas fa-plus'></i></a></h3>

	@if(session('info'))
		<div class="alert alert-success mt-3 w-100" role="alert">{{ session('info') }}</div>
	@endif

	<div>
		@if(count($directory->newsletters) > 0)
			<table class="table table-striped w-100">
			  <thead class="table-dark">
			    <tr align="left">
			      <th>Tipo</th>
			      <th>Nombre</th>
			      <th>Estado</th>
			      <th>Acciones</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($directory->newsletters as $newsletter)
				    <tr>
				      <td>
				      	<a href="{{ Storage::url($newsletter->url) }}" target="_blank" download>
				      		<img src="{{ asset("myicons/{$newsletter->type}.png") }}" width="25px">
				      	</a>
				      </td>
				      <td>{{ $newsletter->name }}</td>
				      <td>{{ $newsletter->status == "active" ? "Activo" : "Oculto" }}</td>
				      <td class="d-flex align-items-center" width="100px">
				      	<a class="text-secondary mr-3" href="{{ route('admin.newsletters.edit', ['directory' => $directory, 'newsletter' => $newsletter]) }}"><i class="fas fa-pen"></i></a>

				      	<form action="{{ route('admin.newsletters.destroy', ['directory' => $directory, 'newsletter' => $newsletter]) }}" method="POST">
			    				@csrf
			    				@method("DELETE")
			    				<div class="deleteBtn d-flex align-items-center ml-2">
				    				<i class="fas fa-trash" title="Quitar"></i>
				    				<button type="submit" class="small btn btn-sm btn-outline-danger ml-2" style="display: none">Presiona aquí para confirmar</button>
			    				</div>
			    			</form>
				      </td>
				    </tr>
			  	@endforeach
			  </tbody>
			</table>
		@else
			<div class="alert alert-info">Todavía no hay archivos en este directorio, añade uno nuevo con el botón verde.</div>
		@endif
	</div>
@endsection

@section("js")
	<script>
		$(".deleteBtn").click(function () {
			$(this).removeClass("text-success");
			$(this).addClass("text-danger");
			$(this).children()[1].style.display = "block";
		});
	</script>
@endsection
