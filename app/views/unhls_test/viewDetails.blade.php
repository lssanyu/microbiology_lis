@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li><a href="{{ URL::route('specimen.show', [$test->specimen->id]) }}">Specimen</a></li>
		  <li class="active">{{trans('messages.test-details')}}</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
					<span class="glyphicon glyphicon-cog"></span>{{trans('messages.test-details')}}

					@if($test->isCompleted() && $test->specimen->isAccepted())
					<div class="panel-btn">
						@if(Auth::user()->can('edit_test_results'))
							<a class="btn btn-sm btn-info" href="{{ URL::to('unhls_test/'.$test->id.'/edit') }}">
								<span class="glyphicon glyphicon-edit"></span>
								{{trans('messages.edit-test-results')}}
							</a>
						@endif
						@if(Auth::user()->can('verify_test_results') && Auth::user()->id != $test->tested_by)
						<a class="btn btn-sm btn-success" href="{{ URL::route('test.verify', array($test->id)) }}">
							<span class="glyphicon glyphicon-thumbs-up"></span>
							{{trans('messages.verify')}}
						</a>
						@endif
					</div>
					@endif
					<div class="panel-btn">
						@if(Auth::user()->can('view_reports'))
							<a class="btn btn-sm btn-default"
							href="{{ URL::to('visitreport/'.$test->specimen->id.'/print') }}"
							target="_blank">
								<span class="glyphicon glyphicon-eye-open"></span>
								View Report
							</a>
							<!-- todo: use commented logic to make the above dynamic -->
							<!-- <a class="btn btn-sm btn-default" href="{{ URL::to('patientreport/'.$test->specimen->patient->id.'/'.$test->specimen->id.'/'.$test->id ) }}">
								<span class="glyphicon glyphicon-eye-open"></span>
								{{trans('messages.view-test-report')}}
							</a> -->
						@endif
					</div>
                </div>
            </div>
		</div> <!-- ./ panel-heading -->
		<div class="panel-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<div class="display-details">
							<h3 class="view"><strong>{{ Lang::choice('messages.test-type',1) }}</strong>
								{{ $test->testType->name }}</h3>
							<p class="view"><strong>{{trans('messages.date-ordered')}}</strong>
								{{ $test->isExternal()?$test->external()->request_date:$test->time_created }}</p>
							<p class="view"><strong>{{trans('messages.lab-receipt-date')}}</strong>
								{{$test->time_created}}</p>
							<p class="view"><strong>{{trans('messages.test-status')}}</strong>
								{{trans('messages.'.$test->testStatus->name)}}</p>
							<p class="view-striped"><strong>{{trans('messages.request-origin')}}</strong>
									{{ $test->specimen->referral->facility->name }}
							</p>
							<p class="view-striped"><strong>{{trans('messages.registered-by')}}</strong>
								{{$test->createdBy->name}}</p>
							@if($test->isCompleted())
							<p class="view"><strong>{{trans('messages.tested-by')}}</strong>
								{{$test->testedBy->name}}</p>
							@endif
							@if($test->isVerified())
							<p class="view"><strong>{{trans('messages.verified-by')}}</strong>
								{{$test->verifiedBy->name}}</p>
							@endif
							@if((!$test->specimen->isRejected()) && ($test->isCompleted() || $test->isVerified()))
							<!-- Not Rejected and (Verified or Completed)-->
							<p class="view-striped"><strong>{{trans('messages.turnaround-time')}}</strong>
								{{$test->getFormattedTurnaroundTime()}}</p>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-info">  <!-- Patient Details -->
							<div class="panel-heading">
								<h3 class="panel-title">{{trans("messages.patient-details")}}</h3>
							</div>
							<div class="panel-body">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-3">
											<p><strong>{{trans("messages.patient-number")}}</strong></p></div>
										<div class="col-md-9">
											{{$test->specimen->patient->patient_number}}</div></div>
									<div class="row">
										<div class="col-md-3">
											<p><strong>{{ Lang::choice('messages.name',1) }}</strong></p></div>
										<div class="col-md-9">
											{{$test->specimen->patient->name}}</div></div>
									<div class="row">
										<div class="col-md-3">
											<p><strong>{{trans("messages.age")}}</strong></p></div>
										<div class="col-md-9">
											{{$test->specimen->patient->getAge()}}</div></div>
									<div class="row">
										<div class="col-md-3">
											<p><strong>{{trans("messages.gender")}}</strong></p></div>
										<div class="col-md-9">
											{{$test->specimen->patient->gender==0?trans("messages.male"):trans("messages.female")}}
										</div></div>
								</div>
							</div> <!-- ./ panel-body -->
						</div> <!-- ./ panel -->
						<div class="panel panel-info"> <!-- Specimen Details -->
							<div class="panel-heading">
								<h3 class="panel-title">{{trans("messages.specimen-details")}}</h3>
							</div>
							<div class="panel-body">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-4">
											<p><strong>Specimen Type</strong></p>
										</div>
										<div class="col-md-8">
											{{$test->specimen->specimenType->name}}
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<p><strong>{{trans('messages.specimen-number')}}</strong></p>
										</div>
										<div class="col-md-8">
											{{$test->getSpecimenId() }}
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<p><strong>{{trans('messages.specimen-status')}}</strong></p>
										</div>
										<div class="col-md-8">
											{{trans('messages.'.$test->specimen->specimenStatus->name) }}
										</div>
									</div>
								@if($test->specimen->isRejected())
									<div class="row">
										<div class="col-md-4">
											<p><strong>{{trans('messages.rejection-reason-title')}}</strong></p>
										</div>
										<div class="col-md-8">
											{{$test->specimen->rejectedSpecimen}}
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<p><strong>{{trans('messages.reject-explained-to')}}</strong></p>
										</div>
										<div class="col-md-8">
											{{$test->specimen->reject_explained_to}}
										</div>
									</div>
								@endif
								@if($test->specimen->isReferred())
								<br>
									<div class="row">
										<div class="col-md-4">
											<p><strong>{{trans("messages.specimen-referred-label")}}</strong></p>
										</div>
										<div class="col-md-8">
											@if($test->specimen->referral->facility_from)
												{{ trans("messages.in") }}
											@endif
											@if($test->specimen->referral->facility_to)
												{{ trans("messages.out") }}
											@endif
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<p><strong>{{Lang::choice("messages.facility", 1)}}</strong></p>
										</div>
										<div class="col-md-8">
											{{$test->specimen->referral->facility->name }}
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<p><strong>@if($test->specimen->referral->facility_from)
												{{ trans("messages.originating-from") }}
											@elseif($test->specimen->referral->facility_to)
												{{ trans("messages.intended-reciepient") }}
											@endif</strong></p>
										</div>
										<div class="col-md-8">
											{{$test->specimen->referral->person }}
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<p><strong>{{trans("messages.contacts")}}</strong></p>
										</div>
										<div class="col-md-8">
											{{$test->specimen->referral->contacts }}
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<p><strong>@if($test->specimen->referral->facility_from)
												{{ trans("messages.recieved-by") }}
											@elseif($test->specimen->referral->facility_to)
												{{ trans("messages.referred-by") }}
											@endif</strong></p>
										</div>
										<div class="col-md-8">
											{{ $test->specimen->referral->user->name }}
										</div>
									</div>
								@endif
								</div>
							</div>
						</div> <!-- ./ panel -->
						<div class="panel panel-info">  <!-- Test Results -->
							<div class="panel-heading">
								<h3 class="panel-title">{{trans("messages.test-results")}}</h3>
							</div>
							<div class="panel-body">
								<div class="container-fluid">
								@foreach($test->testResults as $result)
									<div class="row">
										<div class="col-md-4">
											<p><strong>{{ Measure::find($result->measure_id)->name }}</strong></p>
										</div>
										<div class="col-md-3">
											{{$result->result}}	
										</div>
										<div class="col-md-5">
	        								{{ Measure::getRange($test->specimen->patient, $result->measure_id) }}
											{{ Measure::find($result->measure_id)->unit }}
										</div>
									</div>
								@endforeach
									<div class="row">
										<div class="col-md-2">
											<p><strong>{{trans('messages.test-remarks')}}</strong></p>
										</div>
										<div class="col-md-10">
											{{$test->interpretation}}
										</div>
									</div>
								</div>
							</div> <!-- ./ panel-body -->
						</div>  <!-- ./ panel -->
					</div>
				</div>
			</div> <!-- ./ container-fluid -->
			@if(count($test->testType->organisms)>0)
            <div class="panel panel-success">  <!-- Patient Details -->
                <div class="panel-heading">
                    <h3 class="panel-title">{{trans("messages.culture-worksheet")}}</h3>
                </div>
                <div class="panel-body">
                    <p><strong>{{trans("messages.culture-work-up")}}</strong></p>
                    <table class="table table-bordered">
                        <thead>
                            
                        </thead>
                        <tbody id="tbbody">
                        	<tr>
                                <th width="15%">{{ trans('messages.date')}}</th>
                                <th width="10%">{{ trans('messages.tech-initials')}}</th>
                                <th>{{ trans('messages.observations-and-work-up')}}</th>
                            </tr>
                            @if(($observations = $test->culture) != null)
                                @foreach($observations as $observation)
                                <tr>
                                    <td>{{ $observation->created_at }}</td>
                                    <td>{{ User::find($observation->user_id)->name }}</td>
                                    <td>{{ $observation->observation }}</td>
                                </tr>
                                @endforeach
                            @else
                            	<tr>
                            		<td colspan="3">{{ trans('messages.no-data-found') }}</td>
                            	</tr>
                            @endif
                        </tbody>
                    </table>
                    <p><strong>{{trans("messages.susceptibility-test-results")}}</strong></p>
                    <div class="row">
                    	@if(count($test->susceptibility)>0)
	                    	@foreach($test->testType->organisms as $organism)
	                    	<div class="col-md-6">
	                    		<table class="table table-bordered">
			                        <tbody>
			                        	<tr>
			                                <th colspan="3">{{ $organism->name }}</th>
			                            </tr>
			                            <tr>
			                                <th width="50%">{{ Lang::choice('messages.drug',1) }}</th>
			                                <th>{{ trans('messages.zone-size')}}</th>
			                                <th>{{ trans('messages.interp')}}</th>
			                            </tr>
			                            @foreach($organism->drugs as $drug)
			                            	@if($drugSusceptibility = Susceptibility::getDrugSusceptibility($test->id, $organism->id, $drug->id))
			                            		@if($drugSusceptibility->interpretation)
					                            <tr>
					                                <td>{{ $drug->name }}</td>
					                                <td>{{ $drugSusceptibility->zone!=null?$drugSusceptibility->zone:'' }}</td>
					                                <td>{{ $drugSusceptibility->interpretation!=null?$drugSusceptibility->interpretation:'' }}</td>
					                            </tr>
					                            @endif
				                            @endif
			                            @endforeach
			                        </tbody>
			                    </table>
	                    	</div>
	                    	@endforeach
                    	@endif
                    </div>
                  </div>
                </div> <!-- ./ panel-body -->
            @endif
		</div> <!-- ./ panel-body -->
	</div> <!-- ./ panel -->
@stop