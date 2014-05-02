	<div>
		<ol class="breadcrumb">
		  <li><a href="#">Home</a></li>
		  <li><a href="javascript:void(0);" onclick="pageloader('{{ URL::to("testtype") }}')">Test Type</a></li>
		  <li class="active">Create Test Type</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			Create Test Type
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif

			{{ Form::open(array('url' => 'testtype', 'id' => 'form-create-testtype')) }}

				<div class="form-group">
					{{ Form::label('name', 'Name') }}
					{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('description', 'Description') }}
					{{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('section_id', 'Section') }}
					{{ Form::select('section_id', $labsections, Input::old('section_id')) }}
				</div>
				<div class="form-group">
					{{ Form::label('targetTAT', 'Target Turnaround Time') }}
					{{ Form::text('targetTAT', Input::old('targetTAT'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('prevalence_threshold', 'Prevalence Threshold') }}
					{{ Form::text('prevalence_threshold', Input::old('prevalence_threshold'), array('class' => 'form-control')) }}
				</div>
				<label for="measure-form">Measures</label>
				<div class="row measure-form" style="margin-left: 180px; width: 500px">
					@foreach($measures  as $key=>$value)
					<div class="col-md-6">
						<label  class="checkbox" style="font-weight:normal;">
							<input type="checkbox" value="{{$value->id}}" />{{$value->name}}
						</label>
					</div>
					@endforeach
				</div>
				<div class="form-group actions-row">
					{{ Form::button(
						'<span class="glyphicon glyphicon-save"></span> Save',
						[
							'class' => 'btn btn-primary', 
							'onclick' => 'formsubmit("form-create-testtype")'
						] 
					) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>