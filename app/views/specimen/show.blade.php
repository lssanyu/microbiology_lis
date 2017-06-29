@extends("layout")
@section("content")
    <div>
        <ol class="breadcrumb">
          <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
          <li><a title="List of Specimens" href="{{{URL::route('specimen.index')}}}">Specimens</a></li>
          <li class="active">{{ Lang::choice('messages.test',2) }}</li>
        </ol>
    </div>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
    @endif
    <div class="panel panel-primary tests-log">
        <div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
                        <span class="glyphicon glyphicon-filter"></span>
                        Tests
                        @if(Auth::user()->can('request_test'))
                        <div class="panel-btn">
                            <a class="btn btn-sm btn-info"
                                href="{{ URL::route('unhls_test.getAddTest', [$specimen->id]) }}">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                Add New Test
                            </a>
                            <a class="btn btn-sm btn-default" href="{{ URL::to('visitreport/'.$specimen->id.'/print') }}"
                                target="_blank">
                                <span class="glyphicon glyphicon-eye-open"></span>
                                View Report
                            </a>
                        </div>
                        @endif
                </div>
            </div>
        </div>
        <div class="panel-body">

        <div class="panel-body">
            <div class="container-fluid">
                        <div class="row">
                            <div class="panel panel-info">  <!-- Patient Details -->
                                <div class="panel-heading">
                                    <h3 class="panel-title">Patient and Specimen Details</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-hover table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="col-md-3">
                                                Patient Number
                                                </th>
                                                <th class="col-md-3">
                                                Patient Name
                                                </th>
                                                <th class="col-md-3">
                                                {{trans("messages.age")}}
                                                </th>
                                                <th class="col-md-3">
                                                {{trans("messages.gender")}}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                {{$specimen->patient->patient_number}}    
                                                </td>
                                                <td>
                                                {{$specimen->patient->name}}
                                                </td>
                                                <td>
                                                {{$specimen->patient->getAge()}}   
                                                </td>
                                                <td>
                                                {{$specimen->patient->gender==0?trans("messages.male"):trans("messages.female")}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-hover table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="col-md-3">
                                                Specimen Type
                                                </th>
                                                <th class="col-md-3">
                                                Lab ID
                                                </th>
                                                <th class="col-md-3">
                                                Status
                                                </th>
                                                <th class="col-md-3">
                                                Facility
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                {{$specimen->specimenType->name}}
                                                </td>
                                                <td>
                                                {{$specimen->lab_id}}   
                                                </td>
                                                <td>
                                                    <!-- Specimen statuses -->
                                                    @if($specimen->isRejected())
                                                        Rejected
                                                    @elseif($specimen->isReferredOut())
                                                        Referred
                                                    @elseif($specimen->isAccepted())
                                                        Accepted
                                                    @endif
                                                </td>
                                                <td>
                                                {{ $specimen->referral->facility->name }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div> <!-- ./ panel-body -->
                        </div> <!-- ./ panel -->
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover table-condensed search-table">
                <thead>
                    <tr>
                        <th>{{trans('messages.date-ordered')}}</th>
                        <th>Patient Number</th>
                        <th>{{ Lang::choice('messages.test',1) }}</th>
                        <th>{{trans('messages.test-request-status')}}</th>
                        <th>{{trans('messages.test-status')}}</th>
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
                                        @elseif($test->specimenIsRejected())
                                            <span class='label label-danger'>
                                                {{trans('messages.specimen-rejected-label')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $testSet->links() }}
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
            <!-- <div class="row">
                <div class="col-md-12">
                    <span class='label label-success'>
                        {{trans('messages.specimen-accepted-label')}}</span>
                </div>
            </div> -->
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
            <!-- <div class="row">
                <div class="col-md-12">
                    <span class='label label-success'>
                        {{trans('messages.specimen-accepted-label')}}</span>
                </div>
            </div> -->
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