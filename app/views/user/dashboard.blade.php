@extends("layout")
@section("content")

<div class="row">
	<span style="font-weight: bold; color:blue;">DATA BELOW IS FOR CURRENT MONTH - <?php echo date('01-m-Y'); ?> to 
		<?php echo date('d-m-Y'); ?></span>
						<div class="col-md-12">
							<div class="row">
								<div class="col-lg-4 col-md-6">
									<div class="panel panel-default"><b><!-- Patients and --> Tests</b>
<!-- 										<div class="stat_box stat_down">
											<div class="stat_ico color_a"><i class="ion-ios-people"></i></div>
											<div class="stat_content">
												<span class="stat_count"></span>
												<span class="stat_name">Number of patients</span>
											</div>

										</div> -->
										<div class="stat_box stat_up">
											<div class="stat_ico color_a"><i class="ion-clipboard"></i></div>
											<div class="stat_content">
												<span class="stat_count">{{UnhlsTest::where('test_status_id','=', 4)->count()}}</span>
												<span class="stat_name">Tests done</span>
											</div>
											
										</div>
<!-- 										<div class="stat_box stat_up">
											<div class="stat_ico color_a"><i class="ion-forward"></i></div>
											<div class="stat_content">
												<span class="stat_count"></span>
												<span class="stat_name">Tests referred</span>
											</div>
											
										</div> -->										
									</div>
								</div>

<!--
								<div class="col-lg-4 col-md-6">
									<div class="panel panel-default"><b>Prevalences</b>
 										<div class="stat_box stat_up">
											<div class="stat_ico color_b"><i class="ion-ios-personadd"></i></div>
											<div class="stat_content">
												<span class="stat_count"> Unknown </span>
												<span class="stat_name">HIV Prevalence</span>
											</div>
										</div>
										<div class="stat_box stat_down">
											<div class="stat_ico color_b"><i class="ion-ios-personadd"></i></div>
											<div class="stat_content">
												<span class="stat_count"> Unknown </span>
												<span class="stat_name">Malaria Prevalence</span>
											</div>
										</div>
										<div class="stat_box stat_up">
											<div class="stat_ico color_b"><i class="ion-ios-personadd"></i></div>
											<div class="stat_content">
												<span class="stat_count"> Unknown </span>
												<span class="stat_name">TB Prevalence</span>
											</div>
										</div>																				
 									</div>
								</div>
 -->

								<div class="col-lg-4 col-md-6">
									<div class="panel panel-default"><b>Samples</b>
										<div class="stat_box">
											<div class="stat_ico color_c"><i class="ion-ios-people"></i></div>
											<div class="stat_content">
												<span class="stat_count">{{UnhlsSpecimen::count()}}</span>
												<span class="stat_name">Samples collected</span>
											</div>
										</div>
										<div class="stat_box">
											<div class="stat_ico color_c"><i class="ion-ios-close"></i></div>
											<div class="stat_content">
												<span class="stat_count">{{round(UnhlsSpecimen::where('specimen_status_id', '=',3)->count()*100/UnhlsSpecimen::count(), 2)}} % </span>
												<span class="stat_name">Samples rejected</span>
											</div>
										</div>
										<div class="stat_box">
											<div class="stat_ico color_c"><i class="ion-ios-checkmark"></i></div>
											<div class="stat_content">
												<span class="stat_count">{{round(UnhlsSpecimen::where('specimen_status_id', '=', 2)->count()*100/UnhlsSpecimen::count(), 2)}} %</span>
												<span class="stat_name">Samples accepted</span>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6">
									<div class="panel panel-default">
										<div class="stat_box">
											<div class="stat_ico color_f"><i class="ion-ios-people"></i></div>
											<div class="stat_content">
												{{--*/ $staff = count(User::all())  - 1 /*--}}
												<span class="stat_count">{{ $staff }}</span>
												<span class="stat_name">Number of Lab Staff</span>
											</div>
										</div>
<!-- 										<div class="stat_box stat_down">
											<div class="stat_ico color_f"><i class="ion-ios-person"></i></div>
											<div class="stat_content">
												<span class="stat_count">0 %</span>
												<span class="stat_name">Percentage of volunteers</span>
											</div>
										</div>
 -->
									</div>
								</div>


							</div>
<!-- 
							<div class="row">
								<div class="col-lg-4 col-md-6">
									<div class="panel panel-default"><b>Commodities</b>
										<div class="stat_box stat_down">
											<div class="stat_ico color_d"><i class="ion-ios-list"></i></div>
											<div class="stat_content">
												<span class="stat_count">0</span>
												<span class="stat_name">Number of expired tracer items</span>
											</div>

										</div>
										<div class="stat_box stat_up">
											<div class="stat_ico color_d"><i class="ion-ios-list"></i></div>
											<div class="stat_content">
												<span class="stat_count">0</span>
												<span class="stat_name">Number of stocked out tracer items</span>
											</div>
											
										</div>
										<div class="stat_box stat_up">
											<div class="stat_ico color_d"><i class="ion-gear-b"></i></div>
											<div class="stat_content">
												<span class="stat_count">0</span>
												<span class="stat_name">Non functional equipment</span>
											</div>
											
										</div>
									</div>
								</div>
 -->
<!-- 
								<div class="col-lg-4 col-md-6">
									<div class="panel panel-default"><b>Biosafety & Biosecurity Incidents</b>
										<div class="stat_box">
											<div class="stat_ico color_g"><i class="ion-nuclear"></i></div>
											<div class="stat_content">
												<span class="stat_count">{{count(Bbincidence::countbbincidents_all())}}</span>
												<span class="stat_name">Number of BB incidents</span>
											</div>
										</div>
										<div class="stat_box">
											<div class="stat_ico color_g"><i class="ion-nuclear"></i></div>
											<div class="stat_content">
												<span class="stat_count">
													{{count(Bbincidence::countbbincidents_major())}}
													<?php if((count(Bbincidence::countbbincidents_all()))>0){ ?> 
													({{round ((count(Bbincidence::countbbincidents_major())/count(Bbincidence::countbbincidents_all())*100),2) }} %)
													<?php } ?>
												</span>
												<span class="stat_name">Major incidents</span>
											</div>
										</div>
										<div class="stat_box">
											<div class="stat_ico color_g"><i class="ion-nuclear"></i></div>
											<div class="stat_content">
												<span class="stat_count">
													{{count(Bbincidence::countbbincidents_minor())}}
													<?php if((count(Bbincidence::countbbincidents_all()))>0){ ?> 
													({{round ((count(Bbincidence::countbbincidents_minor())/count(Bbincidence::countbbincidents_all())*100),2) }} %)
													<?php } ?>
													</span>
												<span class="stat_name">Minor incidents</span>
											</div>
										</div>
									</div>
								</div>
 -->

							</div>								
						</div>
					</div>

<!-- 
	<div class="row">
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="heading_b">Stocked out items</div>
									<div class="row">
										<div class="col-md-12">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>Item</th>
														<th class="text-right">Days stocked out</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Humacount Diluent ,20L </td>
														<td class="text-right">3</td>
													</tr>
													<tr>
														<td>Humacount Lyse 1L</td>
														<td class="text-right">16</td>
													</tr>
													<tr>
														<td>Nihon Kohden MEK Diluent Isotonac 3 20L</td>
														<td class="text-right">6</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="heading_b">BB Incidents</div>
									<div class="row">
										<div class="col-md-12">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>Type of Incident</th>
														<th class="text-right">Number</th>
													</tr>
												</thead>
												<tbody>
													@foreach ((Bbincidence::bbincidents_monthly_natures()) as $nature)
              										<tr>
              											<td>{{$nature->name}}</td>
              											<td class="text-right">{{$nature->total}}</td>
              										</tr>
              										@endforeach
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>
						</div>
	</div> -->
@stop