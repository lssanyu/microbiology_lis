@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li>
		  	<a href="{{ URL::route('unhls_test.index') }}">{{ Lang::choice('messages.test',2) }}</a>
		  </li>
		  <li class="active">{{trans('messages.new-test')}}</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
                    <div class="col-md-11">
						<span class="glyphicon glyphicon-adjust"></span>{{trans('messages.new-test')}}
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-sm btn-primary pull-right" href="#" onclick="window.history.back();return false;"
                            alt="{{trans('messages.back')}}" title="{{trans('messages.back')}}">
                            <span class="glyphicon glyphicon-backward"></span></a>
                    </div>
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
			{{ Form::open(array('route' => 'unhls_test.saveNewTest', 'id' => 'form-new-test')) }}
			<input type="hidden" name="_token" value="{{ Session::token() }}"><!--to be removed function for csrf_token -->
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title">{{trans("messages.patient-details")}}</h3>
								</div>
								<div class="panel-body inline-display-details">
									<span><strong>{{trans("messages.patient-number")}}</strong> {{ $patient->patient_number }}</span>
							<!--		<span><strong>{{ trans('messages.nin') }}</strong> {{ $patient->nin }}</span> -->
									<span><strong>{{ Lang::choice('messages.name',1) }}</strong> {{ $patient->name }}</span>
									<span><strong>{{trans("messages.age")}}</strong> {{ $patient->getAge() }}</span>
									<span><strong>{{trans("messages.gender")}}</strong>
										{{ $patient->gender==0?trans("messages.male"):trans("messages.female") }}</span>
								</div>
							</div>
							<div class="form-group">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title">{{"Clinical Information and Sample Information"}}</h3>
								</div>
									<div class="panel-body inline-display-details">
									<div class="col-md-12">
										<div class="form-group">
											{{ Form::hidden('patient_id', $patient->id) }}
											{{ Form::label('visit_type', trans("messages.visit-type")) }}
											{{ Form::select('visit_type', [' ' => '--- Select visit type ---','0' => trans("messages.out-patient"),'1' => trans("messages.in-patient")], null,
												 array('class' => 'form-control')) }}
										</div>
										<div class="form-group">
											{{ Form::label('ward_id','Ward/Clinic/Health Unit') }}
											{{ Form::select('ward_id', $ward, Input::get('ward_id'),
											array('class' => 'form-control')) }}
										</div>
										<div class="form-group">
												{{ Form::label('bed_no','Bed No:', array('text-align' => 'right')) }}
												{{ Form::text('bed_no', Input::old('bed_no'), array('class' => 'form-control')) }}
										</div>
										<div class="form-group">
											{{ Form::label('clinical_notes','Clinical Notes') }}
											{{ Form::textarea('clinical_notes', Input::old('clinical_notes'), array('class' => 'form-control')) }}
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											{{ Form::label('previous_therapy','Previous Therapy') }}
											{{ Form::text('previous_therapy', Input::old('previous_therapy'), array('class' => 'form-control')) }}
										</div>
										<div class="form-group">
											{{ Form::label('current_therapy','Current Therapy', array('text-align' => 'right')) }}
											{{ Form::text('current_therapy', Input::old('current_therapy'), array('class' => 'form-control')) }}
										</div>
										<div class="form-group">
											{{ Form::label('physician', 'Test Requested By') }}
											{{Form::text('physician', Auth::user()->name, array('class' => 'form-control', 'placeholder' =>Auth::user()->name))}}
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											{{ Form::label('cadre', 'Cadre') }}
											{{Form::text('cadre', Auth::user()->designation, array('class' => 'form-control', 'placeholder' =>Auth::user()->designation))}}
										</div>
										<div class="form-group">
											{{ Form::label('phone_contact', 'Phone Contact') }}
											{{Form::text('phone_contact', Input::old('phone_contact'), array('class' => 'form-control'))}}
										</div>
										<div class="form-group">
											{{ Form::label('email', 'E-mail') }}
											{{Form::email('email', Auth::user()->email, array('class' => 'form-control', 'placeholder' =>Auth::user()->email))}}
										</div>
									</div>
									<div class="form-pane panel panel-default">
										<div class="col-md-6">
											<div class="form-group">
												{{Form::label('specimen_type', 'Specimen')}}
												{{ Form::select('specimen_type', $specimenType,
												Input::get('specimenType'),
												['class' => 'form-control specimen-type']) }}
											</div>
											<div class="form-group">
										        {{Form::label('test_type_category', 'Lab Section')}}
										    	{{ Form::select('test_type_category', $testCategory,
										        Input::get('testCategory'),
										        ['class' => 'form-control test-type-category']) }}
											</div>
										</div>
										<div class="col-md-6 test-type-list">
										</div>
							            <div class="col-md-12">
								            <a class="btn btn-default add-test-to-list"
								            	href="javascript:void(0);"
								                data-measure-id="0"
								                data-new-measure-id="">
								            <span class="glyphicon glyphicon-plus-sign"></span>Add Test to List</a>
							            </div>
									</div>
									<div class="form-pane panel panel-default test-list-panel">
							            <div class="col-md-12">
								            <div class="col-md-11">
								                <div class="col-md-4">
													<b>Specimen</b>
								                </div>
								                <div class="col-md-4">
													<b>Lab Section</b>
								                </div>
								                <div class="col-md-4">
													<b>Test</b>
								                </div>
								            </div>
								            <div class="col-md-1">
								            </div>
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
		</div>
	</div>

<div class="hidden test-list-loader">
    <div class="col-md-12 new-test-list-row">
        <div class="col-md-11">
            <div class="col-md-4 specimen-name">
            </div>
            <div class="col-md-4 test-type-category-name">
            </div>
            <div class="col-md-4 test-type-name">
                <input class="specimen-type-id" type="hidden">
                <input class="test-type-id" type="hidden">
            </div>
        </div>
        <div class="col-md-1">
            <button class="col-md-12 delete-test-from-list close" aria-hidden="true" type="button" 
                title="{{trans('messages.delete')}}">×</button>
        </div>
    </div><!-- Test List Item -->
</div><!-- Test List Item Loader-->
@stop