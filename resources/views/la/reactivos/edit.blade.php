@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/reactivos') }}">Reactivo</a> :
@endsection
@section("contentheader_description", $reactivo->$view_col)
@section("section", "Reactivos")
@section("section_url", url(config('laraadmin.adminRoute') . '/reactivos'))
@section("sub_section", "Editar")

@section("htmlheader_title", "Edici&oacute;n de Reactivos : ".$reactivo->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">

	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($reactivo, ['route' => [config('laraadmin.adminRoute') . '.reactivos.update', $reactivo->id ], 'method'=>'PUT', 'id' => 'reactivo-edit-form']) !!}
					@la_form($module)

					{{--
					@la_input($module, 'unidad')
					@la_input($module, 'cantidad')
					@la_input($module, 'nombre')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Actualizar', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/reactivos') }}">Cancelar</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#reactivo-edit-form").validate({

	});
});
</script>
@endpush
