@extends("layout")
@section("content")
    <div>
        <ol class="breadcrumb">
          <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
          <li class="active">Isolates</li>
        </ol>
    </div>  
	 @if (Session::has('message'))
        <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
    @endif
	
	
    <div class='container-fluid'>
        {{ Form::open(array('route' => array('isolate.index'))) }}
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
                    <span class="glyphicon glyphicon-filter"></span>List of Isolates
                    @if(Auth::user()->can('request_test'))
                    <div class="panel-btn">
                        <a class="btn btn-sm btn-success" href="{{ URL::route('isolate.create')}}">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                            Receive New Isolate
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
       <!-- <div class="panel-body">-->
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>                        
                        <th>Lab ID</th>  
                        <th>Specimen Type</th>
                        <th>Isolate ID</th>
                        <th>Microorganism</th>                        
                        <th>Purpose For Testing</th> 
                        <th>Facility</th>                        
                        <th>{{trans('messages.actions')}}</th>
                       
                    </tr>                                                                    
                </thead>  
                    <tbody>
                    @foreach($isolates as $isolate)
                    <tr>                      
                        <td>{{$isolate -> lab_id}}</td>   
                        <td>{{$isolate->specimenType->name}}</td> 
                        <td>{{$isolate->isolateID }}</td>
                        <td>{{$isolate->organism->name}}</td>                       
                        <td>{{$isolate->testReasons->name}}</td>
                        <td>{{$isolate->facility->name }}</td>

                        @if(Auth::user()->can('receive_external_test'))
                        <td>
                            <a class="btn btn-sm btn-success"                            
                         href="{{URL::route('isolate.show', [$isolate->id])}}"
                                title="View Isolate Details">
                                <span class="glyphicon glyphicon-eye-open"></span>
                                View
                            </a>
                        </td>
                        @endif
                        <td>                                      
                            <a class="btn btn-sm btn-info" href="{{ URL::route('isolate.edit', array($isolate->id)) }}" >
							<span class="glyphicon glyphicon-edit"></span>
							{{trans('messages.edit')}}
						</a>
                        </td>

                        

                    </tr> 
                    @endforeach 



                    </tbody>




            </table>
           
       <!-- </div>-->
    </div>
@stop
