@extends("layout")
@section("content")
    <div>
        <ol class="breadcrumb">
          <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
          <li><a href="{{ URL::route('unhls_test.index') }}">{{ Lang::choice('messages.test', 2) }}</a></li>
          <li class="active">{{trans('messages.referrals')}}</li>
        </ol>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
                    <div class="col-md-11">
                        <span class="glyphicon glyphicon-filter"></span> {{trans('messages.referrals')}}
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
        {{ Form::open(array('route' => 'unhls_test.referAction')) }}
            {{ Form::hidden('specimen_id', $unhlsspecimen->id) }}
            <div class="panel-body">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{trans("messages.specimen-information")}}</h3>
                    </div>
                    <div class="panel-body inline-display-details">
                        <span><strong>{{trans("messages.national-id")}}</strong> </span>
                        <span><strong>{{trans("messages.ulin")}}</strong> </span>
                        <span><strong>{{trans("messages.specimen-id")}}</strong> {{$unhlsspecimen->id}}</span>
                        <span><strong>{{trans("messages.specimen-type-title")}}</strong> {{$unhlsspecimen->specimenType->name}}</span>    
                        <span><strong>{{ Lang::choice('messages.date-specimen-collected',1) }}</strong> </span>
                       
                        <span><strong>{{trans("messages.time-specimen-collected")}}</strong>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('person', trans("messages.referring-health-worker")) }}
                    {{Form::text('person', Input::old('person'),
                        array('class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{ Form::label('sample_obtainer', 'Sample Collected by') }}
                    {{Form::text('sample_obtainer', Input::old('sample_obtainer'), array('class' => 'form-control'))}}
                    {{ Form::label('cadre_obtainer', 'Cadre') }}
                    {{Form::text('cadre_obtainer', Input::old('cadre_obtainer'), array('class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{ Form::label('sample_date', 'Date sample recieved in Lab') }}
                    {{Form::text('sample_date', Input::old('sample_date'), array('class' => 'form-control standard-datepicker'))}}
                    {{ Form::label('sample_time', 'Time Sample Recieved in Lab') }}
                    {{Form::text('sample_time', Input::old('sample_time'), array('class' => 'form-control', 'placeholder' => 'HH:MM'))}}
                </div> 
                <div class="form-group">
                     {{ Form::label('time_dispatch', trans('messages.time-dispatch')) }}
                     {{Form::text('time_dispatch', Input::old('time-dispatch'), array('class' => 'form-control', 'placeholder' => 'HH:MM'))}} 
                </div>
                <div class="form-group">
                        {{ Form::label('storage_condition', trans("messages.storage-condition")) }}
                        {{ Form::select('storage_condition', [' ' => '--- Select storage type ---','1' => 'Cold Chain','2' => 'Room Temp', '3' => 'Other'], null,
                                     array('class' => 'form-control')) }}
                </div>
                <div class = "form-group" id ="other_storage" style="display:none"> <!--TODO avoid the inline css -->
                    {{Form::text('storage_condition', Input::old('storage_condition'), array('class' => 'form-control', 'placeholder' => 'Other (Specify)'))}}
                </div>
                <div class="form-group">
                        {{ Form::label('transport_type', trans("messages.transport-type")) }}
                        {{ Form::select('transport_type', [' ' => '--- Select storage type ---',
                        '1' => 'Hub System (hub rider and poster)','2' => 'Private means', '3' => 'Arrangement with Public means',
                        '4' => 'Other'], null,
                                     array('class' => 'form-control')) }}
                </div>
                <div class = "form-group" id ="other_transport" style="display:none"> <!--TODO avoid the inline css -->
                    {{Form::text('transport_type', Input::old('transport_type'), array('class' => 'form-control', 'placeholder' => 'Other (Specify)'))}}
                </div>
                <div class="display-details">
                    <p><strong>{{ Lang::choice('messages.test-type',1) }}</strong>
                        {{$unhlsspecimen->tests->first()->testType->name}}</p>
                    </p>
                </div>
                <br>
                <div class="form-group">
                    {{ Form::label('referralType', trans('messages.referral-type')) }}
                    <div>{{ Form::radio('referral-status', '0', true) }}<span class='input-tag'>
                        {{trans('messages.vertical')}}</span></div>
                    <div>{{ Form::radio('referral-status', '1', false) }}<span class='input-tag'>
                        {{trans('messages.horizontal')}}</span></div>
                </div>
                <div class="form-group">
                    {{ Form::label('referReason', trans('messages.reasons-for-referral')) }}
                    {{ Form::select('referralReason', array(0 => '')+$referralReason->lists('reason', 'id'),
                        Input::old('referralReason'), array('class' => 'form-control')) }}
                    {{ Form::label('prioritySpecimen', trans("messages.priority-of-specimen")) }}
                    {{Form::text('prioritySpecimen', Input::old('prioritySpecimen'),
                        array('class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{ Form::label('facility', Lang::choice("messages.destination-facility",1)) }}
                    {{ Form::select('facility_id', array(0 => '')+$facilities->lists('name', 'id'), Input::old('facility_id'),
                        array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('contacts', trans("messages.contacts")) }}
                    {{Form::textarea('contacts', Input::old('contacts'),
                        array('class' => 'form-control'))}}
                </div>
                <div class="form-group actions-row">
                    {{ Form::button("<span class='glyphicon glyphicon-thumbs-up'></span> ".trans('messages.refer'),
                        ['class' => 'btn btn-danger', 'onclick' => 'submit()']) }}
                </div>
            </div>
        {{ Form::close() }}
        </div>
    </div>
@stop