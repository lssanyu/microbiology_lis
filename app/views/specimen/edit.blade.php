@extends("layout")
@section("content")

	@if (Session::has('message'))
		<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
	@endif
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li>
		  	<a href="{{ URL::route('specimen.index') }}">{{ Lang::choice('messages.specimen',1) }}</a>
		  </li>
		  <li class="active">Edit</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-edit"></span>
			Update Specimen
		</div>
		<div class="panel-body">
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			{{ Form::model($specimen, array('route' => array('specimen.update', $specimen->id), 
				'method' => 'PUT', 'id' => 'form-edit-specimen')) }}
				<div class="form-group">
						{{ Form::label('lab_id','Lab ID', array('text-align' => 'right')) }}
						{{ Form::text('lab_id', Input::old('lab_id'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{Form::label('specimen_type', 'Sample Type')}}
					{{ Form::select('specimen_type', $specimenTypes,
					Input::get('specimenType'),
					['class' => 'form-control specimen-type']) }}
				</div>
				<div class="form-group">
					<label for="time_collected">Time of Sample Collection</label>
					<input class="form-control"
						data-format="YYYY-MM-DD HH:mm"
						data-template="DD / MM / YYYY HH : mm"
						name="time_collected"
						type="text"
						id="collection-date"
						value="{{$specimen->time_collected}}">
				</div>
				<div class="form-group">
					<label for="time_accepted">Time Sample was Received in Lab</label>
					{{ $specimen->time_accepted }}
				</div>
				<div class="form-group actions-row">
					{{ Form::button('<span class="glyphicon glyphicon-save"></span> '. trans('messages.save'), 
						['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop
