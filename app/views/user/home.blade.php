@extends("layout-menu")
@section("content")

<div class="panel panel-primary row">

<div class="">

	<a href="{{ URL::route('user.dashboard')}}">
		<div class="panel panel-default col-sm-3">
		<span class="ion-speedometer" style="font-size:80px"></span> <br><span class="nav_title">DASHBOARD</span>
		</div>
	</a>

	<a href="{{ URL::route('unhls_patient.index')}}">
		<div class="panel panel-default col-sm-3">
		<span class="ion-person-stalker" style="font-size:80px"></span> <br><span class="nav_title">PATIENTS</span>
		</div>
	</a>

	<!-- <a href="{{ URL::route('unhls_els.index')}}">
		<div class="panel panel-default col-sm-3">
		<span class="ion-ios-cart" style="font-size:80px"></span> <br><span class="nav_title">INVENTORY & EQUIPMENT</span>
		</div>
	</a> -->
	
	<!-- <a href="#">
		<div class="panel panel-default col-sm-3">
		<span class="ion-icon ion-ios-folder"></span> <br><span class="nav_title">OTHER RESOURCES</span>
		</div>
	</a> -->	
</div>

<div class="">
	<!-- <a href="{{ URL::route('reports.index')}}">
		<div class="panel panel-default col-sm-3">
		<span class="ion-icon ion-stats-bars"></span> <br><span class="nav_title">REPORTS</span>
		</div>
	</a> -->
	
	<a href="{{ URL::route('specimen.index')}}">
		<div class="panel panel-default col-sm-3">
		<span class="ion-erlenmeyer-flask" style="font-size:80px"></span> <br><span class="nav_title">SPECIMENS</span>
		</div>
	</a>
	
	<!-- <a href="{{ URL::route('bbincidence.index')}}">
		<div class="panel panel-default col-sm-3">
		<span class="ion-icon ion-nuclear"></span> <br><span class="nav_title">BIOSAFETY & BIOSECURITY</span>
		</div>
	</a> -->
	@if(Entrust::can('manage_users'))
	<a href="{{ URL::route('user.index')}}">
		<div class="panel panel-default col-sm-3">
		<span class="ion-icon ion-key"></span> <br><span class="nav_title">ACCESS CONTROL</span>
		</div>
	</a>
	@endif
	
</div>

</div>

@stop