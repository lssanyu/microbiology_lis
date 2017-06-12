@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li class="active"><a href="{{ URL::route('facility.index') }}">{{Lang::choice('messages.facility',2)}}</a></li>
		  <li class="active">{{trans('messages.add-facility')}}</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			{{trans('messages.add-facility')}}
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif

			{{ Form::open(array('route' => 'facility.store', 'id' => 'form-add-facility')) }}

				<div class="form-group">
					{{ Form::label('name', Lang::choice('messages.name',2)) }}
					{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('level_id', 'Level') }}
					{{ Form::select('level_id', $levels,
						Input::old('level_id'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('ownership_id', 'Ownership') }}
					{{ Form::select('ownership_id', $owners,
						Input::old('ownership_id'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('district_id', 'District') }}
					{{ Form::select('district_id', $districts,
						Input::old('district_id'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'), 
						array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop