@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/practicas') }}">Practica</a> :
@endsection
@section("contentheader_description", $practica->$view_col)
@section("section", "Practicas")
@section("section_url", url(config('laraadmin.adminRoute') . '/practicas'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Practicas Edit : ".$practica->$view_col)

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
				{!! Form::model($practica, ['route' => [config('laraadmin.adminRoute') . '.practicas.update', $practica->id ], 'method'=>'PUT', 'id' => 'practica-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'practica_laboratorio')
					@la_input($module, 'nombre')
					@la_input($module, 'objetivo')
					@la_input($module, 'practica_materiales')
					@la_input($module, 'practica_reactivos')
					@la_input($module, 'duracion')
					@la_input($module, 'practica_pdf')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/practicas') }}">Cancel</a></button>
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
	$("#practica-edit-form").validate({
		
	});
});
</script>
@endpush
