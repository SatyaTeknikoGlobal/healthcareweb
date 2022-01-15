@include('admin.common.header')

<?php
$BackUrl = CustomHelper::BackUrl();
$routeName = CustomHelper::getAdminRouteName();


?>

<style type="text/css">
/*	.heading {
		font-weight: 500 !important
	}

	.subheadings {
		font-size: 12px;
		color: #9c27b0
	}

	.assign_modal{

		background-color: grey;
		color: white;
	}
*/

</style>

<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">{{ $page_heading }}</h4>
			</div>
			<div class="col-md-7 align-self-center text-end">
				<div class="d-flex justify-content-end align-items-center">
					<ol class="breadcrumb justify-content-end">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">{{ $page_heading }}</li>
					</ol>
					<?php if(request()->has('back_url')){ $back_url= request('back_url');  ?>
					<a href="{{ url($back_url)}}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
						class="fa fa-arrow-left"></i>  Back</button></a>
					<?php } ?>
				</div>
			</div>
		</div>
		@include('snippets.errors')

                @include('snippets.flash')
		
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12 col-xlg-12 col-md-12">
				<div class="card">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs profile-tab" role="tablist">
						<li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#details" role="tab">Details</a> </li>

						<li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#assign_hospital" role="tab">Assign Hospital</a> </li>

						<li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">Profile</a> </li>

						<li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#appointment" role="tab">Appointment History</a> </li>
						<li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#prescription" role="tab">Prescription</a> </li>

						<li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#transaction" role="tab">Transaction History</a> </li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">


						<div class="tab-pane active" id="details" role="tabpanel">
							<div class="card-body">

								<!--------------- DETAILS ------------------------->


								<div class="row">
									<div class="col-md-8 border-right">
										<div class="status p-3">
											<table class="table table-borderless">
												<tbody>
													<tr>
														<td>
															<div class="d-flex flex-column"> <span class="heading d-block">Hospital</span> <span class="subheadings">{{$hospital->name ?? ''}}</span> </div>
														</td>
														<td>
															<div class="d-flex flex-column"> <span class="heading d-block">Time/Date</span> <span class="subheadings">{{date('d M Y',strtotime($booking->appointment_date))}}</span> </div>
														</td>
														<td>
															<div class="d-flex flex-column"> <span class="heading d-block">Status</span> <span class="subheadings"><i class="dots"></i> Booked</span> </div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="d-flex flex-column"> <span class="heading d-block">Speciality</span> <span class="subheadings">{{$speciality->name ?? ''}}</span> </div>
														</td>
														<td>
															<div class="d-flex flex-column"> <span class="heading d-block">Referring Doctor</span> <span class="subheadings">Dr. Harry Pimn</span> </div>
														</td>
														<td> </td>
													</tr>
													<tr>
														<td>
															<div class="d-flex flex-column"> <span class="heading d-block">Contact</span> <span class="subheadings">{{$hospital->address ?? ''}}</span> </div>
														</td>
														<td colspan="2">
															<div class="d-flex flex-column"> <span class="heading d-block">Reason of visiting</span> <span class="subheadings">Lorem ipsum is placeholder text commonly used in the graphic, print.</span> </div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="d-flex flex-column"> <span class="heading d-block">Direction</span> <span class="d-block subheadings">Get direction by using</span> <span class="d-flex flex-row">
																<?php if(!empty($hospital->latitude) && !empty($hospital->longitude)){?>

																	<a href='https://maps.google.com/?q={{$hospital->latitude}},{{$hospital->longitude}}' target="_blank">


																		<img src="https://img.icons8.com/color/100/000000/google-maps.png" class="rounded" width="30" />
																	</a>
																<?php }?>

															</span> 
														</div>
													</td>
													<td colspan="2">
														<div class="d-flex flex-column"> <span class="heading d-block">Hospital Gallary</span> <span class="d-flex flex-row gallery"> 
															<img src="https://i.imgur.com/VfRSLTm.jpg" width="50" class="rounded"> 
															<img src="https://i.imgur.com/jb9Cy5h.jpg" width="50" class="rounded"> 
															<img src="https://i.imgur.com/vBUz4HA.jpg" width="50" class="rounded">



														</span> 
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-md-4">
								<div class="p-2 text-center">
									<div class="profile"> <img src="https://i.imgur.com/VfRSLTm.jpg" width="100" class="rounded-circle img-thumbnail"> <span class="d-block mt-3 font-weight-bold">Dr. Samsung Philip.</span> </div>
									<div class="about-doctor">
										<table class="table table-borderless">
											<tbody>
												<tr>
													<td>
														<div class="d-flex flex-column"> <span class="heading d-block">Education</span> <span class="subheadings">University of Harward</span> </div>
													</td>
													<td>
														<div class="d-flex flex-column"> <span class="heading d-block">Language</span> <span class="subheadings">Spanish, English</span> </div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="d-flex flex-column"> <span class="heading d-block">Organisation</span> <span class="subheadings">Accupunture</span> </div>
													</td>
													<td>
														<div class="d-flex flex-column"> <span class="heading d-block">Specialist</span> <span class="subheadings">Accupunture</span> </div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>



						</div>

						<!--------------- DETAILS ------------------------->

					</div>


				</div>

				<!------------------- ASSIGN HOSPITAL ------------------->

				<style type="text/css">
					.select2-search__field{
						width: 20.75em !important;
					}
				</style>

				<div class="tab-pane" id="assign_hospital" role="tabpanel">

					<div class="card-body">

						<div class="row">

							<div class="col-md-12 col-xs-12 b-r pull-right">



								<form action="{{route('admin.bookings.assign_hospital')}}" method="post" id="assign_hospital">

									{{ csrf_field() }}

									<input type="hidden" name="booking_id" value="{{$booking->id}}">
									

									<div class="form-group">
										<label for="exampleInputEmail1" class="form-label">Choose Hospital</label>
										<select class="form-control" class="form-control" name="hospital_list" id="hospital_list">

											<option value="" selected disabled>Select Hospital</option>
											<?php 
											
											if(!empty($hospitals_list)){
												foreach($hospitals_list as $hospital){
													$package = App\HealthPackages::where('included_hos_ids',$hospital->id)->first();

											?>
													<option value="{{$hospital->id}}">{{$hospital->name}}</option>
												<?php }}?>
											</select>

										</div>

									
									<div class="form-group">
										<label for="exampleInputEmail1" class="form-label">Choose Package</label>
										<select class="form-control" class="form-control" name="package_id" id="package_id">
											<option value="" selected disabled>Select Package</option>
											
											</select>

										</div>

										

										

										<div class="form-group">
											<label for="exampleInputPassword1" class="form-label">Status</label>
											<br>
											Active: <input type="radio" name="status" value="1"checked>
											&nbsp;
											Inactive: <input type="radio" name="status" value="0" >
											@include('snippets.errors_first', ['param' => 'status'])
										</div>
										<button class="btn btn-primary mb-5" type="submit">Submit</button>

									</form>
								</div>
								<hr>
								<div class="col-md-12 col-xs-12 b-r">
									<!--  <h4 class="card-title">Roles</h4> -->
									<div class="table-responsive">
										<table id="myTable1" class="table display table-striped border no-wrap">
											<thead>
												<tr>
													
													<th scope="col">Hospital Name</th>
													<th scope="col">Description</th>
													<th scope="col">Assign Status</th>           
													<th scope="col">Action</th>           

												</tr>
											</thead>
											<tbody>
												<?php 

												$lists = App\AssignBookings::where('booking_id',$booking->id)->get();

												

                                               //($lists->id);
												foreach($lists as $list)
												{ 
													//echo $list->id;
													//echo $list->description;
													$hospital_name = \App\Hospital::where('id',$list->hospital_id)->first();

													$leads = DB::table('leads_documents')->select('id','leads_id','documents','type')->where('leads_id', $list->id)->get();

													

													?>
													<tr>
														
														<td>{{$hospital_name->name ?? ''}}</td>
														<td><a href="" data-bs-toggle="modal" data-bs-target="#myModal{{$list->id}}" class="model_img img-responsive" >Click Here</a></td>


														 <div id="myModal{{$list->id}}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						                                    <div class="modal-dialog">
						                                        <div class="modal-content">
						                                            <div class="modal-header">
						                                                <h4 class="modal-title" id="myModalLabel">{{$hospital_name->name ?? ''}}</h4>
						                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
						                                            </div>
						                                            <div class="modal-body">
						                                                <h6>Description :</h6>
						                                                <p>{!!$list->description!!}</p>
						                                                
						                                            </div>
						                                            <div class="modal-footer">
						                                                <button type="button" class="btn btn-info waves-effect text-white" data-bs-dismiss="modal">Close</button>
						                                            </div>
						                                        </div>
						                                        <!-- /.modal-content -->
						                                    </div>
						                                    <!-- /.modal-dialog -->
						                                </div>


														<td>                                                			
															<?php

															$assign_status = $list->status;

															if($assign_status == '1')
															{
																?>
																<span>Assigned</span>
															<?php }else{  ?>

																<span>Not Assigned</span>

															<?php } ?>
														</td>
														
														<td>
															<?php 

															
															$html = '';

															foreach($leads as $lead)
															{

																 $image = isset($lead->documents) ? $lead->documents : '';
													            $storage = Storage::disk('public');
													            $path = 'prescription/';

																
																if($lead->type == 'png' || $lead->type == 'jpg' || $lead->type == 'jpeg' )
																{?>

																	<a href="{{ url('public/storage/'.$path.$image) }}" target="_blank"><i class='fas fa-image'></i></a>
															
																<?php }else if($lead->type == 'xlsx' || $lead->type == 'XLSX'){ ?>

																	<a href="{{ url('public/storage/'.$path.$image) }}" target="_blank"><i class='fas fa-file-excel' aria-hidden='true'></i></a>

																<?php }else if($lead->type == 'doc' || $lead->type == 'DOC'){?>

																		<a href="{{ url('public/storage/'.$path.$image) }}" target="_blank"><i class='fas fa-file'></i></a>

																 <?php }elseif($lead->type == 'pdf' || $lead->type == 'PDF'){ ?>

																 		<a href="{{ url('public/storage/'.$path.$image) }}" target="_blank"><i class='fas fa-file-pdf'></i></a>

																	<!-- <a href='/storage/app/public/$path/$image' target='_blank'><i class='fas fa-file-pdf'></i></a> -->
 
													<?php } }?>
														</td>


													</tr>

									<?php } ?>
											</tbody>
										</table>

										
									</div>
								</div>
							</div>
						</div>
					</div>




					<!------------------- ASSIGN HOSPITAL ------------------->				


					<div class="tab-pane " id="profile" role="tabpanel">
						<div class="card-body">
							<center class="m-t-30"> <img  src="https://healthcareweb.appmantra.live/public/storage/hospital/071221055710-hospital.jpg" class="img-circle" width="150">
								<h4 class="card-title m-t-10">{{$user->name ?? ''}}</h4>
								<b>Address</b>
								<h5>{{$user->address ??''}}</h5>
								<hr>
								<b>Phone : {{$user->phone ?? ''}}</b></br>

								<b>Email : {{$user->email ?? ''}}</b>
							</center>
						</div>
					</div>


					<div class="tab-pane" id="appointment" role="tabpanel">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12 col-xs-12 b-r">
									<div class="table-responsive">
										<table id="myTable" class="table display table-striped border no-wrap">
											<thead>
												<tr>
													<th scope="col">#Booking ID</th>
													<th scope="col">Hospital Name</th>
													<th scope="col">Appointment Date</th>
													<th scope="col">Date Created</th>
												</tr>
											</thead>
											<tbody>
												<?php if(!empty($appointments)){
													foreach ($appointments as $key) {
														$hospital = \App\Hospital::where('id',$key->hospital_id)->first();
														?>
														<tr>
															<td>{{$key->unique_id}}</td>

															<td>{{$hospital->name ?? ''}}</td>

															<td>{{$key->appointment_date}}</td>

															<td>{{$key->created_at}}</td>
														</tr>

													<?php }}?>

												</tbody>

											</table>
										</div>

									</div>

								</div>
							</div>

						</div>

						<div class="tab-pane" id="users" role="tabpanel">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12 col-xs-12 b-r">
										<div class="table-responsive">

										</div>

									</div>

								</div>
							</div>
						</div>


				<!----------------------- PRESCRIPTION ------------------------------------->


						<div class="tab-pane" id="prescription" role="tabpanel">
							<div class="card">
								<div class="card-header">Upload File</div>

									<div class="card-body">
											
											<form action="{{ route('admin.bookings.prescription') }}" method="post" accept-charset="UTF-8" role="form" enctype="multipart/form-data">

											{{ csrf_field() }}

												<input type="hidden" value="{{$booking->id}}" name="booking_id">


											<div class="form-group">
												<label for="exampleInputEmail1" class="form-label"></label>
												<input type="file" name="prescription[]" multiple  id="prescription" class="form-control">

												</div>
												

												
												<button class="btn btn-primary mb-5" type="submit">Submit</button>

											</form>
									</div>
							</div>
							<hr>
							<div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Prescription List</h4>
                        <div class="table-responsive m-t-40">
                            <table id="dataTable" class="table display table-striped border no-wrap">
                                <thead>
                                <tr>
                                    <th scope="col">S.NO.</th>                                   
                                    
                                    <th scope="col">Hospital Name</th>
                                    <th scope="col">Prescription</th>                                    
                                    <th scope="col">Action</th>
                                   
                                </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
						

				<!----------------------- PRESCRIPTION ------------------------------------->		


						<div class="tab-pane" id="transaction" role="tabpanel">

							<div class="card">

								<div class="card-header">Transaction Details</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-xs-12 b-r">
											<div class="table-responsive">

											</div>

										</div>

									</div>
								</div>
							</div>
						</div>



					</div>
				</div>
			</div>
			<!-- Column -->
		</div>



	</div>
</div>









@include('admin.common.footer')

<script type="text/javascript">
	
   $(function () {
    $('#myTable1').DataTable();

}); 

   $('#hospital_list').on('change', function() {

   	 var id = $('#hospital_list option:selected').attr('value');
   	 var _token = '{{ csrf_token() }}';
   	  $.ajax({
            url: "{{ route($routeName.'.bookings.packages') }}",
            type: "POST",
            data: {id:id},
            dataType:"HTML",
            headers:{'X-CSRF-TOKEN': _token},
            cache: false,
            success: function(resp){
            	$('#package_id').html(resp);
            }
        });

   	 // alert("id = "+id);
   });


</script>