@extends("layout")
@section("content")
<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
          <li><a title="List of Isolates" href="{{{URL::route('isolate.index')}}}">Isolates</a></li>
		  <li class="active">Receive Isolates</li>
		</ol>
</div>
  <div class="panel panel-primary">
		<div class="panel-heading ">
            <div class="container-fluid">
                <div class="row less-gutter">
					<span class="glyphicon glyphicon-adjust"></span>Receive Isolate
        	 </div>
        </div>			
</div>
 
  
  @if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
	@endif
  {{ Form::open(array('route' => 'isolate.store', 'id' => 'form-new-test')) }}
  <input type="hidden" name="_token" value="{{ Session::token() }}">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">{{"Isolate Information"}}</h3>
				</div>
					<div class="panel-body inline-display-details">
					
					  <div class="form-pane panel panel-default">
					  <div class="col-md-12">
							<div class="form-group">			
								<!--{{ Form::label('lab_id','Lab ID', array('text-align' => 'right')) }}
								{{ Form::text('lab_id', Input::old('lab_id'), array('class' => 'form-control')) }}-->

								{{ Form::label('isolateID','Isolate ID', array('text-align' => 'right')) }}
								{{ Form::text('isolateID', Input::old('isolateID'), array('class' => 'form-control')) }}
												
							</div>
						</div>
						
						 <div class="col-md-12">
						 <div class="form-group">
										<label for="age">Age</label>
										<input type="text" name="age" id="age" class="form-control c input-sm" size="11">
										<select name="age_units" id="id_age_units" class="form-control input-sm">
											<option value="Y">Years</option>
											<option value="M">Months</option>
										</select>
									</div>
						
						</div>
					  <div class="col-md-12">
							<div class="form-group">
										{{ Form::label('gender', trans('messages.sex')) }}
										<div>{{ Form::radio('gender', '0', true) }}
										<span class="input-tag">{{trans('messages.male')}}</span></div>
										<div>{{ Form::radio("gender", '1', false) }}
										<span class="input-tag">{{trans('messages.female')}}</span></div>
									</div>
						</div>			

					
					 <div class="col-md-12">
										<div class="form-group">			
												{{ Form::label('facility','Facility', array('text-align' => 'right')) }}
												{{ Form::select('facility',$facilities, Input::get('facility'), array('class' => 'form-control')) }}
												
										</div>
										</div>	
						 <div class="col-md-12">
						 <div class="form-group">											
								{{ Form::label('district','District', array('text-align' => 'right')) }}
								{{ Form::select('district',  $districts, Input::get('district'), array('class' => 'form-control')) }}
						</div>
						
						</div>	
											 
						
						 
						   <div class="col-md-12">
										<div class="form-group">			
												{{ Form::label('specimen_type','Specimen Type', array('text-align' => 'right')) }}
												{{ Form::select('specimen_type',$specimenTypes, Input::get('specimen_type'),
												 ['class' => 'form-control']) }}
												
										</div>	  
						  
						  </div>				  
						  
						 
									<!-- <div class = "col-md-6">
										 <div class="form-group">											
											{{ Form::label('testType','Test Type', array('text-align' => 'right')) }}
											{{ Form::select('testType',$tests, Input::get('testType'), array('class' => 'form-control ')) }}
									</div>								
									 
									 </div> -->
									 
									 <div class="col-md-6">
										<div class="form-group">			
												{{ Form::label('organism_id','Microorganism', array('text-align' => 'right')) }}
												{{ Form::select('organism_id',$organisms, Input::get('organism_id'), array('class' => 'form-control')) }}
												
										</div>
									</div>
									<div class="col-md-6">
										<a class="btn btn-sm btn-success add-drug-susceptibility-results"                                   
										data-verb="POST"
										data-toggle="modal"
										data-target=".add-previous-drug-susceptibility-results-modal"										
										title="Add Susceptibility Test Results">
										<span class="glyphicon glyphicon-plus"></span>										
										Add Drug Susceptibility
										</a>
								</div>           									
								
								<div class="row drug-susceptibility-pattern">
									<h5 class="col-md-12">Susceptibility Pattern</h5>
									<div class="col-md-12">
										<table id='dsp' class="table table-responsive table-condensed table-bordered table-striped">
										  <thead>
											<tr>
											  <th>Antibiotic</th>
											  <th>Result</th>                     
											
											</tr>
										  </thead>
										  
										  <tbody class="drug-susceptibility-tbody">					  	
										   
										  </tbody>
										</table>
									</div>
								</div>								
										
						  
						  <div class="col-md-12">
										<div class="form-group">			
												{{ Form::label('test_reason','Purpose For Testing', array('text-align' => 'right')) }}
												{{ Form::select('test_reason',$testReasons, Input::get('test_reason'), array('class' => 'form-control')) }}
												
										</div>	  
						  
						  </div>						  
						  
							  <div class = "col-md-6">
							 				<div class="form-group">											
												{{ Form::label('dispatched_by','Dispatched by', array('text-align' => 'right')) }}												
												{{ Form::text('dispatched_by', Input::get('dispatched_by'), array('class' => 'form-control')) }}
											</div>
							 </div>
							 
							 <div class = "col-md-6">
						  <div class="form-group">											
											<label for="dispatch_date">Dispatch Date</label>
											<input class="form-control"
													data-format="YYYY-MM-DD HH:mm"
													data-template="DD / MM / YYYY HH : mm"
													name="dispatch_date"
													type="text"
													id="dispatch-date"
													value="{{$dispatchDate}}">
									</div>
									</div>

						  
							 		
											  		
						  
						<div class = "col-md-12">
						  			<div class="form-group">											
											<label for="preparation_date">Date of Preparation</label>
											<input class="form-control"
													data-format="YYYY-MM-DD HH:mm"
													data-template="DD / MM / YYYY HH : mm"
													name="preparation_date"
													type="text"
													id="preparation-date"
													value="{{$preparationDate}}">
									</div>
						</div>					 
								 <div class = "col-md-6">
							 <div class="form-group">			
											
												{{ Form::label('received_by','Received by', array('text-align' => 'right')) }}												
												{{ Auth::user()->name  }}
											</div>
							 </div>
											
							 <div class = "col-md-6">
						  <div class="form-group">											
											<label for="date_received">Date Received</label>
											<input class="form-control"
													data-format="YYYY-MM-DD HH:mm"
													data-template="DD / MM / YYYY HH : mm"
													name="date_received"
													type="text"
													id="received-date"
													value="{{$dateReceived}}">													
									</div>
									</div>						 			
									
							 				
						  </div>
							
					</div>
				</div>	
					
					<div class="form-group actions-row">
								{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save-isolate'),
									['class' => 'btn btn-primary', 'onclick' => 'submit()', 'alt' => 'save_new_test']) }}
					</div>				
        
      </div> 
	  <!-- Modal For adding previous susceptibility results-->
<div class="modal fade add-previous-drug-susceptibility-results-modal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;</button>
                <h4 class="modal-title" id="myModalLabel">
                    <span class="glyphicon glyphicon-plus"></span>
                   Previous Drug Susceptibility Test Results
                </h4>
            </div>
            <div class="modal-body">
                <input class="organism" name="organism" type="hidden">
                <div class="susceptibility-result">
                <h5 class="col-md-12 isolated-organism-input-header"></h5>
                    <div class="drugs">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <!-- <div class="col-md-4"> -->
                                <div class="form-group">
                                    {{ Form::label('drug', 'Antibiotic') }}
                                </div>
                            </div>
                            <div class="col-md-6">
                            <!-- <div class="col-md-4"> -->
                                <div class="form-group">
                                    {{ Form::label('measure', 'Measure') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
								{{ Form::select('drug',$drugSusceptabilities, Input::get('drug'), array('class' => 'form-control  antibiotic')) }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
								{{ Form::select('measure',$drugSusceptabilityMeasures, Input::get('measure'), array('class' => 'form-control susceptibilityMeasure')) }} 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            {{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.add'),
                ['class' => 'btn btn-primary  save-drug-susceptibility',
                    'data-dismiss' => 'modal']) }}
            {{ Form::button(trans('messages.cancel'),
                ['class' => 'btn btn-default cancel-drug-susceptibility-edition',
                    'data-dismiss' => 'modal']) }}
            </div>
        </div>
    </div>
</div><!-- /.add-drug-susceptibility-modal -->	  
      <script src="bootstrap.js"></script>
  </div> 
  {{ Form::close() }}
		<?php Session::put('SOURCE_URL', URL::full());?>  
		
  </div>
 
</div>
@stop







