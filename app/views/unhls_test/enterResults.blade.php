@extends("layout")
@section("content")
    <div>
        <ol class="breadcrumb">
          <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
          <li><a href="{{ URL::route('specimen.show', [$test->specimen->id]) }}">Specimen</a></li>
          <li class="active">{{ trans('messages.enter-test-results') }}</li>
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
                    <div class="col-md-6">
                    {{ Form::open(array('route' => array('unhls_test.saveResults',$test->id), 'method' => 'POST',
                        'id' => 'form-enter-results')) }}
                        @foreach($test->testType->measures as $measure)
                            <div class="form-group">
                                <?php
                                $matchedTestResult = "";
                                foreach ($test->testResults as $testResult) {
                                    if($testResult->measure_id == $measure->id)$matchedTestResult = $testResult->result;
                                }
                                $fieldName = "m_".$measure->id;
                                ?>
                                @if ( $measure->isNumeric() ) 
                                    {{ Form::label($fieldName , $measure->name) }}
                                    {{ Form::text($fieldName, $matchedTestResult, array(
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
                                @elseif ( $measure->isAlphanumeric()) 
                                    <?php
                                    $measure_values = array();
                                    if ($measure->name != 'Gram Staining') $measure_values[] = '';
                                    foreach ($measure->measureRanges as $range) {
                                        $measure_values[$range->alphanumeric] = $range->alphanumeric;
                                    }
                                    ?>
                                        {{ Form::label($fieldName , $measure->name) }}
                                        {{ Form::select($fieldName, $measure_values, array_search($matchedTestResult, $measure_values),
                                            array('class' => 'form-control result-interpretation-trigger',
                                            'data-url' => URL::route('unhls_test.resultinterpretation'),
                                            'data-measureid' => $measure->id
                                            )) 
                                        }}
                                @elseif ( $measure->isFreeText() ) 
                                    {{ Form::label($fieldName, $measure->name) }}
                                    <?php
                                        $sense = '';
                                        if($measure->name=="Sensitivity"||$measure->name=="sensitivity")
                                            $sense = ' sense'.$test->id;
                                    ?>
                                    {{Form::text($fieldName, $matchedTestResult, array('class' => 'form-control'.$sense))}}
                                @endif
                            </div>
                        @endforeach
                        <div class="form-group">
                            {{ Form::label('comment', trans('messages.comments')) }}
                            {{ Form::textarea('interpretation', $test->interpretation, 
                                array('class' => 'form-control result-interpretation', 'rows' => '2')) }}
                        </div>
                        <div class="form-group actions-row">
                            {{ Form::button('<span class="glyphicon glyphicon-save">
                                </span> '.trans('messages.save-test-results'),
                                array('class' => 'btn btn-default', 'onclick' => 'submit()')) }}
                        </div>
                    {{ Form::close() }}
                    @if(count($test->testType->organisms)>0)
                        <div class="panel panel-success">  <!-- Patient Details -->
                            <div class="panel-heading">
                                <h3 class="panel-title">{{trans("messages.culture-worksheet")}}</h3>
                            </div>
                            <div class="panel-body">
                                <p><strong>{{trans("messages.culture-work-up")}}</strong></p>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="15%">{{ trans('messages.date')}}</th>
                                            <th width="10%">{{ trans('messages.tech-initials')}}</th>
                                            <th>{{ trans('messages.observations-and-work-up')}}</th>
                                            <th width="10%"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbbody_<?php echo $test->id ?>">
                                        @if(($observations = $test->culture) != null)
                                            @foreach($observations as $observation)
                                            <tr>
                                                <td>{{ Culture::showTimeAgo($observation->created_at) }}</td>
                                                <td>{{ User::find($observation->user_id)->name }}</td>
                                                <td>{{ $observation->observation }}</td>
                                                <td></td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td>{{ Culture::showTimeAgo(date('Y-m-d H:i:s')) }}</td>
                                                <td>{{ Auth::user()->name }}</td>
                                                <td>{{ Form::textarea('observation', $test->interpretation, 
                                                    array('class' => 'form-control result-interpretation', 'rows' => '2', 'id' => 'observation_'.$test->id)) }}
                                                </td>
                                                <td><a class="btn btn-xs btn-success" href="javascript:void(0)" onclick="saveObservation(<?php echo $test->id; ?>, <?php echo Auth::user()->id; ?>, <?php echo "'".Auth::user()->name."'"; ?>)">
                                                    {{ trans('messages.save') }}</a>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ Culture::showTimeAgo(date('Y-m-d H:i:s')) }}</td>
                                                <td>{{ Auth::user()->name }}</td>
                                                <td>{{ Form::textarea('observation', '', 
                                                    array('class' => 'form-control result-interpretation', 'rows' => '2', 'id' => 'observation_'.$test->id)) }}
                                                </td>
                                                <td><a class="btn btn-xs btn-success" href="javascript:void(0)" onclick="saveObservation(<?php echo $test->id; ?>, <?php echo Auth::user()->id; ?>, <?php echo "'".Auth::user()->name."'"; ?>)">
                                                    {{ trans('messages.save') }}</a>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <p><strong>{{trans("messages.susceptibility-test-results")}}</strong></p>
                                <div class="form-group">
                                    <div class="form-pane panel panel-default">
                                        <div class="container-fluid">
                                            <?php 
                                                $cnt = 0;
                                                $zebra = "";
                                                $checked=false; 
                                                $checker = '';
                                                $susOrgIds = array();
                                            ?>
                                            @foreach($test->testType->organisms as $key=>$value)
                                                @if(count($test->susceptibility)>0)
                                                    @foreach($test->susceptibility as $drugSusceptibility)
                                                        <?php
                                                        array_push($susOrgIds, $drugSusceptibility->organism_id);
                                                        if(in_array($value->id, $susOrgIds))
                                                            $checked='checked';
                                                        ?>
                                                    @endforeach
                                                @endif
                                                {{ ($cnt%4==0)?"<div class='row $zebra'>":"" }}
                                                <?php
                                                    $cnt++;
                                                    $zebra = (((int)$cnt/4)%2==1?"row-striped":"");
                                                ?>
                                                <div class="col-md-4">
                                                    <label  class="checkbox">
                                                        <input type="checkbox" name="organism[]" value="{{ $value->id}}" {{ $checked }} onchange="javascript:showSusceptibility(<?php echo $value->id; ?>)" />{{$value->name}}
                                                    </label>
                                                </div>
                                                {{ ($cnt%4==0)?"</div>":"" }}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @foreach($test->testType->organisms as $key=>$value)
                                    @if(count($test->susceptibility)>0)
                                        @foreach($test->susceptibility as $drugSusceptibility)
                                            <?php
                                            array_push($susOrgIds, $drugSusceptibility->organism_id);
                                            if(in_array($value->id, $susOrgIds))
                                                $checker='checked';
                                            ?>
                                        @endforeach
                                    @endif
                                    <?php if($checker=='checked'){$display='display:block';}else if($checker!='checked'){$display='display:none';} ?>
                                {{ Form::open(array('','id' => 'drugSusceptibilityForm_'.$value->id, 'name' => 'drugSusceptibilityForm_'.$value->id, 'style'=>$display)) }}
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="3">{{ $value->name }}</th>
                                        </tr>
                                        <tr>
                                            <th width="50%">{{ Lang::choice('messages.drug',1) }}</th>
                                            <th>{{ trans('messages.zone-size')}}</th>
                                            <th>{{ trans('messages.interp')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="enteredResults_<?php echo $value->id; ?>">
                                        @foreach($value->drugs as $drug)
                                        {{ Form::hidden('test[]', $test->id, array('id' => 'test[]', 'name' => 'test[]')) }}
                                        {{ Form::hidden('drug[]', $drug->id, array('id' => 'drug[]', 'name' => 'drug[]')) }}
                                        {{ Form::hidden('organism[]', $value->id, array('id' => 'organism[]', 'name' => 'organism[]')) }}
                                        <tr>
                                            <td>{{ $drug->name }}</td>
                                            <td>
                                                {{ Form::select('zone[]', ['' => '']+range(0, 50), '', ['class' => 'form-control', 'id' => 'zone[]', 'style'=>'width:auto']) }}
                                            </td>
                                            <td>{{ Form::select('interpretation[]', array('' => '', 'S' => 'S', 'I' => 'I', 'R' => 'R'),'', ['class' => 'form-control', 'id' => 'interpretation[]', 'style'=>'width:auto']) }}</td>
                                        </tr>
                                        @endforeach
                                        <tr id="submit_drug_susceptibility_<?php echo $value->id; ?>">
                                            <td colspan="3" align="right">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <a class="btn btn-default" href="javascript:void(0)" onclick="saveDrugSusceptibility(<?php echo $test->id; ?>, <?php echo $value->id; ?>)">
                                                    {{ trans('messages.save') }}</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                {{ Form::close() }}
                                @endforeach
                              </div>
                            </div> <!-- ./ panel-body -->
                        </div>
                        @endif
                        <div class="col-md-6">
                        <!--this was the original holder for Patient details, specimen details and test results -->
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
@stop