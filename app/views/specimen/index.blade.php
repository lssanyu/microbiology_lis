@extends("layout")
@section("content")
    <div>
        <ol class="breadcrumb">
          <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
          <li class="active">Specimens</li>
        </ol>
    </div>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
    @endif

    <div class='container-fluid'>
        {{ Form::open(array('route' => array('specimen.index'))) }}
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
                <div class='col-md-2 col-md-offset-3'>
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
                    <span class="glyphicon glyphicon-filter"></span>{{ucfirst($status)}} Specimens
                    @if(Auth::user()->can('request_test'))
                    <div class="panel-btn">
                        <a class="btn btn-sm btn-info" href="{{ URL::route('specimen.create')}}">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                            Receive New Specimen
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Date Received</th>
                        <th>Patient Name</th>
                        <th>Lab Id</th>
                        <th>Specimen Type</th>
                        <th>Patient ID</th>
                        <th>Facility</th>
                        <th>Status</th>
                        @if(Auth::user()->can('receive_external_test'))
                        <th></th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                @foreach($specimens as $specimen)
                    <tr>
                        <td>{{ date('d-m-Y H:i', strtotime($specimen->time_accepted));}}</td>
                        <td>{{ $specimen->patient->name }}</td>
                        <td>{{ $specimen->lab_id }}</td>
                        <td>{{ $specimen->specimenType->name }}</td>
                        <td>{{ $specimen->patient->patient_number }}</td>
                        <td>{{ $specimen->referral->facility->name }}</td>

                        <td id="test-status-{{$specimen->id}}" class='test-status'>
                            <div class="col-md-12">
                                @if($status == 'pending')
                                <span class='label label-info'>
                                    {{$specimen->countPendingTests()}}/
                                    {{$specimen->tests->count()}}
                                    Pending
                                </span>
                                @else
                                <span class='label label-success'>
                                    Completed
                                </span>
                                @endif
                            </div>
                        </td>
                        @if(Auth::user()->can('receive_external_test'))
                        <td>
                            <a class="btn btn-sm btn-success"
                            	href="{{URL::route('specimen.show', [$specimen->id])}}"
                                title="View Specimen Details">
                                <span class="glyphicon glyphicon-eye-open"></span>
                                View
                            </a>
                        </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $specimens->links() }}
	        {{ Session::put('SOURCE_URL', URL::full()) }}
	        {{ Session::put('TESTS_FILTER_INPUT', Input::except('_token')); }}
        </div>
    </div>
@stop
