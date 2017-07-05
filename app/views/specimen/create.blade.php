@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
          <li><a title="List of Specimens" href="{{{URL::route('specimen.index')}}}">Specimens</a></li>
		  <li class="active">Receive Specimen</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
					<span class="glyphicon glyphicon-adjust"></span>Receive Specimen
                </div>
            </div>
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			{{ Form::open(array('route' => 'specimen.store', 'id' => 'form-new-test')) }}
			<input type="hidden" name="_token" value="{{ Session::token() }}"><!--to be removed function for csrf_token -->
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title">{{"Patient and Sample Information"}}</h3>
								</div>
									<div class="panel-body inline-display-details">
								@if($existingPatient)
									{{ Form::hidden('patient_id', $patient->id) }}
									<p>Patient No: {{$patient->patient_number}}</p>
									<!-- <p>ULIN: {{$patient->ulin}}</p> -->
									<p>Patient Name: {{$patient->name}}</p>
									<p>Age: {{$patient->getAge()}}</p>
									<p>Gender: {{$patient->getGender()}}</p>
								@else
									<div class="form-group">
											{{ Form::label('patient_name','Patient Name', array('text-align' => 'right', 'class' => 'required')) }}
											{{ Form::text('patient_name', Input::old('patient_name'), array('class' => 'form-control')) }}
									</div>
									<div class="form-group">
											{{ Form::label('patient_number','Patient ID', array('text-align' => 'right', 'class' => 'required')) }}
											{{ Form::text('patient_number', Input::old('patient_number'), array('class' => 'form-control')) }}
									</div>
									<div class="form-group">
										{{ Form::label('dob','Date Of Birth', array('class' => 'required')) }}
										{{ Form::text('dob', Input::old('dob'), array('class' => 'form-control input-sm', 'size' => '11')) }}
									</div>
									<div class="form-group">
										<label class='required' for="age">Age</label>
										<input type="text" name="age" id="age" class="form-control c input-sm" size="11">
										<select name="age_units" id="id_age_units" class="form-control input-sm">
											<option value="Y">Years</option>
											<option value="M">Months</option>
										</select>
									</div>
									<div class="form-group">
										{{ Form::label('gender', trans('messages.sex'), array('class' => 'required')) }}
										<div>{{ Form::radio('gender', '0', true) }}
										<span class="input-tag">{{trans('messages.male')}}</span></div>
										<div>{{ Form::radio("gender", '1', false) }}
										<span class="input-tag">{{trans('messages.female')}}</span></div>
									</div>
								@endif
									<div class="form-group">
										{{Form::label('', 'Specimen')}}
									</div>
									<div class="form-pane panel panel-default">
										<div class="col-md-6">
											<div class="form-group">
												{{Form::label('facility_from', 'Facility')}}
												{{ Form::select('facility_from', $facilities,
												Input::get('facility_from'),
												['class' => 'form-control']) }}
											</div>
											<div class="form-group">
												{{Form::label('specimen_type', 'Specimen Type')}}
												{{ Form::select('specimen_type', $specimenType,
												Input::get('specimenType'),
												['class' => 'form-control specimen-type']) }}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="time_collected">Time of Sample Collection</label>
												<input class="form-control"
													data-format="YYYY-MM-DD HH:mm"
													data-template="DD / MM / YYYY HH : mm"
													name="time_collected"
													type="text"
													id="collection-date"
													value="{{$collectionDate}}">
											</div>
											<div class="form-group">
												<label for="time_accepted">Time Sample was Received in Lab</label>
												Captured Automatically
												{{ Form::hidden('time_accepted', $receptionDate) }}
											</div>
										</div>
									</div>
									<div class="form-group">
										{{Form::label('', 'Tests Request')}}
									</div>
									<div class="form-pane panel panel-default">
										<div class="test-type-list">
										</div>
									</div>
									<div class="form-group">
										<a href="javascript:void(0)" class="specimen-referral">Specimen Referral</a>
									</div>
									<div class="form-pane panel panel-default specimen-referral hidden">
										<div class="form-group">
											{{Form::label('facility_to', 'Facility')}}
											{{ Form::select('facility_to', $facilities,
											Input::get('facility_to'),
											['class' => 'form-control']) }}
										</div>
									</div>
									<div class="form-group">
									<a href="javascript:void(0)" class="specimen-rejection">Specimen Rejection</a>
									</div>
									<div class="form-pane panel panel-default specimen-rejection hidden">
										<div class="form-group">
											{{ Form::label('rejectionReason', trans('messages.rejection-reason')) }}
											{{ Form::select('rejectionReason', array(0 => '')+$specimenRejectionReasons->lists('reason', 'id'),
												Input::old('rejectionReason'), array('class' => 'form-control')) }}
										</div>
									</div>
								</div>
							</div>
						</div> <!--div that closes the panel div for clinical and sample information -->
								<div class="form-group actions-row">
								{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save-test'),
									['class' => 'btn btn-primary', 'onclick' => 'submit()', 'alt' => 'save_new_test']) }}
								</div>
						</div>
					</div>
				</div>
			{{ Form::close() }}
		<?php Session::put('SOURCE_URL', URL::full());?>
		</div>
	</div>
@stop
