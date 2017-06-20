@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
			<li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
			<li><a title="List of Specimens" href="{{{URL::route('specimen.index')}}}">Specimens</a></li>
			<li><a href="{{ URL::route('specimen.show', [$specimen->id]) }}">Specimen</a></li>
			<li class="active">{{trans('messages.new-test')}}</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="container-fluid">
				<div class="row less-gutter">
					<span class="glyphicon glyphicon-adjust"></span>Add Test to Specimen
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
			{{ Form::open(['route' => 'unhls_test.addtest', 'id' => 'form-new-test']) }}
			<input type="hidden" name="_token" value="{{ Session::token() }}">
			<!--to be removed function for csrf_token -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title">
									{{ $specimen->specimenType->name }} | Lab ID: {{ $specimen->lab_id }}</h3>
								</div>
								<div class="panel-body inline-display-details">
									<div class="form-pane panel panel-default">
										<div class="container-fluid">
											<div class="col-md-12">
												{{ Form::hidden('specimen_id', $specimen->id) }}
												{{Form::label('test-list', trans("messages.select-tests"))}}
											</div>
											@foreach($specimen->specimenType->testTypes as $key=>$value)
											<div class="col-md-4">
												<label  class="checkbox">
													<input class="test-type id-{{$value->id}}"
														type="checkbox"
														data-test-type-name="{{$value->name}}"
														name="test_types[]"
														value="{{ $value->id}}"/>{{$value->name}}
												</label>
											</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--div that closes the panel div for clinical and sample information -->
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
@stop
