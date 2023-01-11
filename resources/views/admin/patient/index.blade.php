@extends('admin.layouts.master')
@section('content')
<div id="content">
<<<<<<< master
	<div class="row no-margin-padding">
		<div class="col-md-6">
			<h3 class="block-title">Patients </h3>
		</div>
		<div class="col-md-6">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.html">
						<span class="ti-home"></span>
					</a>
				</li>
				<li class="breadcrumb-item">Patients</li>
				<li class="breadcrumb-item active">All Patients</li>
			</ol>
		</div>
	</div>
	<!-- /Page Title -->

	<!-- /Breadcrumb -->
	<!-- Main Content -->
	<div class="container-fluid">

		<div class="row">
			<!-- Widget Item -->
			<div class="col-md-12">
				<div class="widget-area-2 proclinic-box-shadow">
					<h3 class="widget-title">Patients List <span style="padding-left: 3rem; font-size: 15px">{{Session::get('patient')}}</span> <span class="float-right btn btn-warning"><a href="{{route('admin.patientAdd')}}">Add patient</a></span></h3>
					<div class="table-responsive mb-3">
						<table id="tableId" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th class="no-sort">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input" type="checkbox" id="select-all">
											<label class="custom-control-label" for="select-all"></label>
										</div>
									</th>
									<th>Patient ID</th>
									<th>Patient Name</th>
									<th>Age</th>
									<th>Phone</th>
									<th>last Visit</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									@foreach($patients as $patient)
									<td>
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input" type="checkbox" id="1">
											<input type="hidden" value="{{$patient->id}}">
											<label class="custom-control-label" for="1"></label>
										</div>
									</td>
									<td>{{$patient->id}}</td>
									<td>{{$patient->patient_name}}</td>
									<td>{{$patient->age}}</td>
									<td>{{$patient->phone}}</td>
									<td>{{$patient->date}}</td>
									<td>
										<span>
											@if($patient->status==1)
											<span class="badge badge-warning">Completed</span>
											@elseif($patient->status==2)
											<span class="badge badge-success">Pending</span>
											@else
											<span class="badge badge-danger">Cancelled</span>
											@endif
											<!-- {{--                                                {{$patient->status==0?'selected':''}}Cancelled--}}
{{--                                                {{$patient->status==1?'selected':''}}Completed--}}
{{--                                                {{$patient->status==2?'selected':''}}Pending--}} -->
									</td>
									<td>
										<a href="{{route('admin.patientEdit',['id'=>$patient->id])}}"><button class="btn btn-info">Edit</button></a>
=======
			<!-- Breadcrumb -->
			<!-- Page Title -->
			<div class="row no-margin-padding">
				<div class="col-md-6">
					<h3 class="block-title">Patients</h3>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="index.html">
								<span class="ti-home"></span>
							</a>
                        </li>
                        <li class="breadcrumb-item">Patients</li>
						<li class="breadcrumb-item active">All Patients</li>
					</ol>
				</div>
			</div>
			<!-- /Page Title -->
>>>>>>> master

										<form action="{{route('admin.patientDelete')}}" method="post" style="display: inline">@csrf
											<input type="hidden" name="id" value="{{$patient->id}}">
											<input type="submit" value="Delete" class="btn  btn-danger" onclick="return confirm('Are you sure? you want to delete this?');">
										</form>
									</td>
								</tr>
								@endforeach

							</tbody>
						</table>
						<!--Export links-->
						<nav aria-label="Page navigation example">
							<ul class="pagination justify-content-center export-pagination">
								<li class="page-item">
									<a class="page-link" href="#"><span class="ti-download"></span> csv</a>
								</li>
								<li class="page-item">
									<a class="page-link" href="#"><span class="ti-printer"></span> print</a>
								</li>
								<li class="page-item">
									<a class="page-link" href="#"><span class="ti-file"></span> PDF</a>
								</li>
								<li class="page-item">
									<a class="page-link" href="#"><span class="ti-align-justify"></span> Excel</a>
								</li>
							</ul>
						</nav>
						<!-- /Export links-->
						<button type="button" class="btn btn-danger mt-3 mb-0"><span class="ti-trash"></span> DELETE</button>
						<button type="button" class="btn btn-primary mt-3 mb-0"><span class="ti-pencil-alt"></span> EDIT</button>
					</div>
				</div>
			</div>
			<!-- /Widget Item -->
		</div>
	</div>
	<!-- /Main Content -->
</div>
@endsection
