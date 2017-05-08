@extends("layout")
@section("content")
    <div>
        <ol class="breadcrumb">
          <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
          <li class="active">{{ Lang::choice('messages.test',2) }}</li>
        </ol>
    </div>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
    @endif

    <div class='container-fluid'>
        {{ Form::open(array('route' => array('unhls_test.index'))) }}
            <div class='row'>
                <div class='col-md-3'>
                    <div class='col-md-2'>
                        {{ Form::label('date_from', trans('messages.from')) }}
                    </div>
                    <div class='col-md-10'>
                        {{ Form::text('date_from', Input::get('date_from'), 
                            array('class' => 'form-control standard-datepicker')) }}
                    </div>
                </div>
                <div class='col-md-3'>
                    <div class='col-md-2'>
                        {{ Form::label('date_to', trans('messages.to')) }}
                    </div>
                    <div class='col-md-10'>
                        {{ Form::text('date_to', Input::get('date_to'), 
                            array('class' => 'form-control standard-datepicker')) }}
                    </div>
                </div>
                <div class='col-md-3'>
                    <div class='col-md-5'>
                        {{ Form::label('test_status', trans('messages.test-status')) }}
                    </div>
                    <div class='col-md-7'>
                        {{ Form::select('test_status', $testStatus,
                            Input::get('test_status'), array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class='col-md-2'>
                        {{ Form::label('search', trans('messages.search'), array('class' => 'sr-only')) }}
                        {{ Form::text('search', Input::get('search'),
                            array('class' => 'form-control', 'placeholder' => 'Search')) }}
                </div>
                <div class='col-md-1'>
                        {{ Form::submit(trans('messages.search'), array('class'=>'btn btn-primary')) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>

    <br>

    <div class="panel panel-primary tests-log">
        <div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
                    <div class="col-md-11">
                        <span class="glyphicon glyphicon-filter"></span>{{trans('messages.list-tests')}}
                        @if(Auth::user()->can('request_test'))
                        <div class="panel-btn">
                            <a class="btn btn-sm btn-info" href="javascript:void(0)"
                                data-toggle="modal" data-target="#new-test-modal-unhls">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                {{trans('messages.new-test')}}
                            </a>
                        </div>
                        @endif
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
            <table class="table table-striped table-hover table-condensed search-table">
                <thead>
                    <tr>
                        <th>{{trans('messages.date-ordered')}}</th>
                        <th>{{trans('messages.patient-number')}}</th>
                        <th>{{'ULIN'}}</th>
                        <th>{{trans('messages.visit-number')}}</th>
                        <th class="col-md-2">{{trans('messages.patient-name')}}</th>
                        <th class="col-md-1">{{trans('messages.specimen-id')}}</th>
                        <th>{{ Lang::choice('messages.test',1) }}</th>
                        <th>{{trans('messages.test-request-status')}}</th>
                        <th class="col-md-3">{{trans('messages.test-status')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($testSet as $key => $test)
                    <tr 
                        @if(Session::has('activeTest'))
                            {{ in_array($test->id, Session::get('activeTest'))?"class='info'":""}}
                        @endif
                        >
                        <td>{{ date('d-m-Y H:i', strtotime($test->time_created));}}</td>  <!--Date Ordered-->
                        <td>{{ empty($test->specimen->patient->external_patient_number)?
                                $test->specimen->patient->patient_number:
                                $test->specimen->patient->external_patient_number
                            }}</td> <!--Patient Number -->
                        <td>{{'ULIN No:'}}</td> <!--unhls terminology -->
                        <td>
                            {{ $test->specimen->id }}</td> <!--Visit Number -->
                        <td>{{ $test->specimen->patient->name.' ('.($test->specimen->patient->getGender(true)).',
                            '.$test->specimen->patient->getAge('Y'). ')'}}</td> <!--Patient Name -->
                        <td>{{ $test->getSpecimenId() }}</td> <!--Specimen ID -->
                        <td>{{ $test->testType->name }}</td> <!--Test-->
                        <!-- ACTION BUTTONS -->
                        <td>
                            <a class="btn btn-sm btn-success"
                                href="{{ URL::route('unhls_test.viewDetails', $test->id) }}"
                                id="view-details-{{$test->id}}-link" 
                                title="{{trans('messages.view-details-title')}}">
                                <span class="glyphicon glyphicon-eye-open"></span>
                                {{trans('messages.view-details')}}
                            </a>
                        @if ($test->isNotReceived()) 
                            @if(Auth::user()->can('receive_external_test') && $test->isPaid())
                                <a class="btn btn-sm btn-default receive-test" href="javascript:void(0)"
                                    data-test-id="{{$test->id}}" data-specimen-id="{{$test->specimen->id}}"
                                    title="{{trans('messages.receive-test-title')}}">
                                    <span class="glyphicon glyphicon-thumbs-up"></span>
                                    {{trans('messages.receive-test')}}
                                </a>
                            @endif
                        @endif
                        @if ($test->specimen->isAccepted() && !($test->isVerified()))
                            @if(Auth::user()->can('reject_test_specimen') && !($test->specimen->isReferred()))
                                @if(!($test->specimenIsRejected()))
                                <a class="btn btn-sm btn-danger" id="reject-{{$test->id}}-link"
                                    href="{{URL::route('unhls_test.reject', array($test->specimen_id))}}"
                                    title="{{trans('messages.reject-title')}}">
                                    <span class="glyphicon glyphicon-thumbs-down"></span>
                                    {{trans('messages.reject')}}
                                </a>
                                @endif
                                <a class="btn btn-sm btn-midnight-blue barcode-button" onclick="print_barcode({{ "'".$test->specimen->id."'".', '."'".$barcode->encoding_format."'".', '."'".$barcode->barcode_width."'".', '."'".$barcode->barcode_height."'".', '."'".$barcode->text_size."'" }})" title="{{trans('messages.barcode')}}">
                                    <span class="glyphicon glyphicon-barcode"></span>
                                    {{trans('messages.barcode')}}
                                </a>
                            @endif
                            @if ($test->isPending())
                                @if(Auth::user()->can('start_test'))
                                    <a class="btn btn-sm btn-warning start-test" href="javascript:void(0)"
                                        data-test-id="{{$test->id}}" data-url="{{ URL::route('unhls_test.start') }}"
                                        title="{{trans('messages.start-test-title')}}">
                                        <span class="glyphicon glyphicon-play"></span>
                                        {{trans('messages.start-test')}}
                                    </a>
                                @endif
                                @if(Auth::user()->can('refer_specimens') && !($test->isExternal()) && !($test->specimen->isReferred()))
                                    <a class="btn btn-sm btn-info" href="{{ URL::route('unhls_test.refer', array($test->specimen_id)) }}">
                                        <span class="glyphicon glyphicon-edit"></span>
                                        {{trans('messages.refer-sample')}}
                                    </a>
                                @endif
                            @elseif ($test->isStarted())
                                @if(Auth::user()->can('enter_test_results'))
                                    <a class="btn btn-sm btn-info" id="enter-results-{{$test->id}}-link"
                                        href="{{ URL::route('unhls_test.enterResults', array($test->id)) }}"
                                        title="{{trans('messages.enter-results-title')}}">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        {{trans('messages.enter-results')}}
                                    </a>
                                @endif
                            @elseif ($test->isCompleted())
                                @if(Auth::user()->can('edit_test_results'))
                                    <a class="btn btn-sm btn-info" id="edit-{{$test->id}}-link"
                                        href="{{ URL::route('unhls_test.edit', array($test->id)) }}"
                                        title="{{trans('messages.edit-test-results')}}">
                                        <span class="glyphicon glyphicon-edit"></span>
                                        {{trans('messages.edit')}}
                                    </a>
                                @endif
                                @if(Auth::user()->can('verify_test_results') && Auth::user()->id != $test->tested_by)
                                    <a class="btn btn-sm btn-success" id="verify-{{$test->id}}-link"
                                        href="{{ URL::route('unhls_test.viewDetails', array($test->id)) }}"
                                        title="{{trans('messages.verify-title')}}">
                                        <span class="glyphicon glyphicon-thumbs-up"></span>
                                        {{trans('messages.verify')}}
                                    </a>
                                @endif
                            @endif
                        @endif
                        </td>

                        <td id="test-status-{{$test->id}}" class='test-status'>
                            <!-- Test Statuses -->
                            <div class="container-fluid">
                            
                                <div class="row">

                                    <div class="col-md-12">
                                        @if($test->isNotReceived())
                                            @if(!$test->isPaid())
                                                <span class='label label-default'>
                                                    {{trans('messages.not-paid')}}</span>
                                            @else
                                            <span class='label label-default'>
                                                {{trans('messages.not-received')}}</span>
                                            @endif
                                        @elseif($test->isPending())
                                            <span class='label label-info'>
                                                {{trans('messages.pending')}}</span>
                                        @elseif($test->isStarted())
                                            <span class='label label-warning'>
                                                {{trans('messages.started')}}</span>
                                        @elseif($test->isCompleted())
                                            <span class='label label-primary'>
                                                {{trans('messages.completed')}}</span>
                                        @elseif($test->isVerified())
                                            <span class='label label-success'>
                                                {{trans('messages.verified')}}</span>
                                        @endif
                                    </div>
    
                                    </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Specimen statuses -->
                                        @if($test->specimen->isReferred())
                                            <span class='label label-primary'>
                                                {{trans('messages.specimen-referred-label') }}
                                                @if($test->specimen->referral->status == Referral::REFERRED_IN)
                                                    {{ trans("messages.in") }}
                                                @elseif($test->specimen->referral->status == Referral::REFERRED_OUT)
                                                    {{ trans("messages.out") }}
                                                @endif
                                            </span>
                                        @elseif($test->specimenIsRejected())
                                            <span class='label label-danger'>
                                                {{trans('messages.specimen-rejected-label')}}</span>
                                        @elseif($test->specimen->isAccepted())
                                            <span class='label label-success'>
                                                {{trans('messages.specimen-accepted-label')}}</span>
                                        @endif
                                        </div></div></div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            
            {{ $testSet->links() }}
        {{ Session::put('SOURCE_URL', URL::full()) }}
        {{ Session::put('TESTS_FILTER_INPUT', Input::except('_token')); }}
        
        </div>
    </div>

    <div class="modal fade" id="accept-specimen-modal">
      <div class="modal-dialog">
        <div class="modal-content">
        {{ Form::open(array('route' => 'unhls_test.acceptSpecimen')) }}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">{{trans('messages.close')}}</span>
            </button>
            <h4 class="modal-title">
                <span class="glyphicon glyphicon-ok-circle"></span>
                {{trans('messages.accept-specimen-title')}}</h4>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            {{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.submit'),
                array('class' => 'btn btn-primary', 'data-dismiss' => 'modal', 'onclick' => 'submit()')) }}
            <button type="button" class="btn btn-default" data-dismiss="modal">
                {{trans('messages.cancel')}}</button>
          </div>
        {{ Form::close() }}
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal /#accept-specimen-modal-->

    <!-- OTHER UI COMPONENTS -->
    <div class="hidden pending-test-not-collected-specimen">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <span class='label label-info'>
                        {{trans('messages.pending')}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span class='label label-default'>
                        {{trans('messages.specimen-not-collected-label')}}</span>                
                </div>
            </div>
        </div>
    </div> <!-- /. pending-test-not-collected-specimen -->

    <div class="hidden pending-test-accepted-specimen">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <span class='label label-info'>
                        {{trans('messages.pending')}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span class='label label-success'>
                        {{trans('messages.specimen-accepted-label')}}</span>
                </div>
            </div>
        </div>
    </div> <!-- /. pending-test-accepted-specimen -->

    <div class="hidden started-test-accepted-specimen">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <span class='label label-warning'>
                        {{trans('messages.started')}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span class='label label-success'>
                        {{trans('messages.specimen-accepted-label')}}</span>
                </div>
            </div>
        </div>
    </div> <!-- /. started-test-accepted-specimen -->

    <div class=" hidden collect-specimen-button">
        <a class="btn btn-sm btn-info collect-specimen" href="javascript:void(0)"
            title="{{trans('messages.collect-specimen-title')}}"
            data-url="{{ URL::route('unhls_test.collectSpecimen')}}">
            <span class="glyphicon glyphicon-ambulance"></span>
            {{trans('messages.collect-specimen')}}
        </a>
    </div><!-- /. colllect-specimen button -->

    <div class="hidden accept-button">
        <a class="btn btn-sm btn-info accept-specimen" href="javascript:void(0)"
            title="{{trans('messages.accept-specimen-title')}}"
            data-url="{{ URL::route('unhls_test.acceptSpecimen') }}">
            <span class="glyphicon glyphicon-thumbs-up"></span>
            {{trans('messages.accept-specimen')}}
        </a>
    </div> <!-- /. accept-button -->

    <div class="hidden reject-start-buttons">
        <a class="btn btn-sm btn-danger reject-specimen" href="#" title="{{trans('messages.reject-title')}}">
            <span class="glyphicon glyphicon-thumbs-down"></span>
            {{trans('messages.reject')}}</a>
        <a class="btn btn-sm btn-warning start-test" href="javascript:void(0)"
            data-url="{{ URL::route('unhls_test.start') }}" title="{{trans('messages.start-test-title')}}">
            <span class="glyphicon glyphicon-play"></span>
            {{trans('messages.start-test')}}</a>
    </div> <!-- /. reject-start-buttons -->

    <div class="hidden enter-result-buttons">
        <a class="btn btn-sm btn-info enter-result">
            <span class="glyphicon glyphicon-pencil"></span>
            {{trans('messages.enter-results')}}</a>
    </div> <!-- /. enter-result-buttons -->

    <div class="hidden start-refer-button">
        <a class="btn btn-sm btn-info refer-button" href="#">
            <span class="glyphicon glyphicon-edit"></span>
            {{trans('messages.refer-sample')}}
        </a>
    </div> <!-- /. referral-button -->
    <!-- Barcode begins -->
    
    <div id="count" style='display:none;'>0</div>
    <div id ="barcodeList" style="display:none;"></div>

    <!-- jQuery barcode script -->
    <script type="text/javascript" src="{{ asset('js/barcode.js') }} "></script>
@stop