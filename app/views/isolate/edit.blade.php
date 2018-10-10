@extends("layout")
@section("content")

	@if (Session::has('message'))
		<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
	@endif
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a title="List of Isolates" href="{{{URL::route('isolate.index')}}}">Isolates</a></li>		  
		  <li class="active">Edit</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-edit"></span>
			Update Isolate
		</div>
		<div class="panel-body">
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			{{ Form::model($isolate, array('route' => array('isolate.update', $isolate->id), 
				'method' => 'PUT', 'id' => 'form-edit-isolate')) }}
				<div class="col-md-12">
					<div class="form-group">
							{{ Form::label('lab_id','Lab ID', array('text-align' => 'right')) }}
							{{ Form::text('lab_id', Input::old('lab_id'), array('class' => 'form-control')) }}
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
							{{ Form::label('age','Age', array('text-align' => 'right')) }}						
							{{ Form::text('age', Input::old('age'), array('class' => 'form-control')) }}
											<select name="age_units" id="id_age_units" class="form-control input-sm">
												<option value="Y">Years</option>
												<option value="M">Months</option>
											</select>

							
					</div>
				</div>
				 <div class="col-md-12">
							<div class="form-group">
										{{ Form::label('gender', trans('messages.sex'), array('class' => 'required')) }}											
										<div>{{ Form::radio('gender', '0', true) }}
										<span class="input-tag">{{trans('messages.male')}}</span></div>
										<div>{{ Form::radio("gender", '1', false) }}
										<span class="input-tag">{{trans('messages.female')}}</span></div>
									</div>
						</div>	

						 <div class="col-md-12">
							<div class="form-group">
							{{Form::label('district', 'District')}}
							{{ Form::select('district', $districts,
							Input::old('district'),
							['class' => 'form-control district']) }}

							</div>
						 </div>

				<div class="col-md-12">
							<div class="form-group">
							{{Form::label('facility', 'Facility')}}
							{{ Form::select('facility', $facilities,
							Input::old('facility'),
							['class' => 'form-control facility']) }}
							</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						{{Form::label('specimen_type', 'Specimen Type')}}
						{{ Form::select('specimenType', $specimenTypes,
						Input::old('specimenType'),
						['class' => 'form-control specimen_type']) }}

					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						{{Form::label('micro_organism', 'Microorganism')}}
						{{ Form::select('micro_organism', $microorganisms,
						Input::get('microorganism'),
						['class' => 'form-control micro_organism']) }}
					</div>	
				</div>
                				
				<div class="form-group actions-row">
					{{ Form::button('<span class="glyphicon glyphicon-save"></span> '. trans('messages.save'), 
						['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop
