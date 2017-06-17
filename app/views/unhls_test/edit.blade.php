@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('specimen.show', [$test->specimen->id]) }}">Specimen</a></li>
		  <li class="active">{{ trans('messages.edit') }}</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
            <div class="container-fluid">
	            <div class="row less-gutter">
		            <span class="glyphicon glyphicon-adjust"></span>{{$test->testType->name }} | Lab Id: {{$test->specimen->lab_id }}

                        @if($test->testType->instruments->count() > 0)
                        <div class="panel-btn">
                            <a class="btn btn-sm btn-info fetch-test-data" href="javascript:void(0)"
                                title="{{trans('messages.fetch-test-data-title')}}"
                                data-test-type-id="{{$test->testType->id}}"
                                data-url="{{URL::route('instrument.getResult')}}"
                                data-instrument-count="{{$test->testType->instruments->count()}}">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                {{trans('messages.fetch-test-data')}}
                            </a>
                        </div>
                        @endif
                        @if($test->isCompleted() && $test->specimen->isAccepted())
						<div class="panel-btn">
							@if(Auth::user()->can('verify_test_results') && Auth::user()->id != $test->tested_by)
							<a class="btn btn-sm btn-success" href="{{ URL::route('unhls_test.verify', array($test->id)) }}">
								<span class="glyphicon glyphicon-thumbs-up"></span>
								{{trans('messages.verify')}}
							</a>
							@endif
							@if(Auth::user()->can('view_reports'))
								<a class="btn btn-sm btn-default" href="{{ URL::to('visitreport/'.$test->specimen->id.'/print') }}">
									<span class="glyphicon glyphicon-eye-open"></span>
									{{trans('messages.view-report')}}
								</a>
							@endif
						</div>
						@endif
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
			<div class="container-fluid">
                <div class="row">
					{{ Form::open(array('route' => array('unhls_test.saveResults', $test->id), 'method' => 'POST')) }}
						@foreach($test->testType->measures as $measure)
							<div class="form-group">
								<?php
								$ans = "";
								foreach ($test->testResults as $res) {
									if($res->measure_id == $measure->id)$ans = $res->result;
								}
								 ?>
							<?php
							$fieldName = "m_".$measure->id;
							?>
								@if ( $measure->isNumeric() ) 
			                        {{ Form::label($fieldName , $measure->name) }}
			                        {{ Form::text($fieldName, $ans, array(
			                            'class' => 'form-control result-interpretation-trigger',
			                            'data-url' => URL::route('unhls_test.resultinterpretation'),
			                            'data-age' => $test->specimen->patient->dob,
			                            'data-gender' => $test->specimen->patient->gender,
			                            'data-measureid' => $measure->id
			                            ))
			                        }}
		                            <span class='units'>
		                                {{Measure::getRange($test->specimen->patient, $measure->id)}}
		                                {{$measure->unit}}
		                            </span>
								@elseif ( $measure->isAlphanumeric() || $measure->isAutocomplete() ) 
			                        <?php
			                        $measure_values = array();
		                            $measure_values[] = '';
			                        foreach ($measure->measureRanges as $range) {
			                            $measure_values[$range->alphanumeric] = $range->alphanumeric;
			                        }
			                        ?>
		                            {{ Form::label($fieldName , $measure->name) }}
		                            {{ Form::select($fieldName, $measure_values, array_search($ans, $measure_values),
		                                array('class' => 'form-control result-interpretation-trigger',
		                                'data-url' => URL::route('unhls_test.resultinterpretation'),
		                                'data-measureid' => $measure->id
		                                )) 
		                            }}
								@elseif ( $measure->isFreeText() ) 
		                            {{ Form::label($fieldName, $measure->name) }}
		                            {{Form::text($fieldName, $ans, array('class' => 'form-control'))}}
								@endif
		                    </div>
		                @endforeach
		                <div class="form-group">
		                    {{ Form::label('interpretation', 'Remarks') }}
		                    {{ Form::textarea('interpretation', $test->interpretation, 
		                        array('class' => 'form-control result-interpretation', 'rows' => '2')) }}
		                </div>
		                <div class="form-group actions-row" align="left">
							{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.trans('messages.update-test-results'),
								array('class' => 'btn btn-default', 'onclick' => 'submit()')) }}
						</div>
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
@stop