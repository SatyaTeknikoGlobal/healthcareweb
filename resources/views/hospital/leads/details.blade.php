@include('hospital.common.header')

<?php
$BackUrl = CustomHelper::BackUrl();
$routeName = CustomHelper::getHospitalRouteName();
$booking_id = isset($booking->id) ? $booking->id : '';
$hospital_id = isset($booking->hospital_id) ? $booking->hospital_id : '';

$back_url = (request()->has('back_url'))?request()->input('back_url'):'';



?>

<style type="text/css">

</style>

<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">{{$page_heading}}</h4>
			</div>
			<div class="col-md-7 align-self-center text-end">
				<div class="d-flex justify-content-end align-items-center">
					<ol class="breadcrumb justify-content-end">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">{{$page_heading}}</li>
					</ol>
					
					
					<a href="{{ route('hospital.leads.index') }}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
						class="fa fa-arrow-left"></i>  Back</button></a>
					
					
				</div>
			</div>
		</div>

		
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12 col-xlg-12 col-md-12">
				<div class="card">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs profile-tab" role="tablist">
						<li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#details" role="tab">Details</a> </li>


						

						
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">


						<div class="tab-pane active" id="details" role="tabpanel">
							<div class="card-body">

								<!--------------- DETAILS ------------------------->


								<div class="row">
									<div class="col-md-12 border-right">
										<div class="status p-3">
											<table class="table table-borderless">
												<tbody>
													<tr>
														<td>
															<div class="d-flex flex-column"> <span class="heading d-block">Hospital</span> <span class="subheadings"></span> </div>
														</td>
														<td>
															<div class="d-flex flex-column"> <span class="heading d-block"></span> <span class="subheadings"></span>{{$hospital_details->name ?? ''}}</div>
														</td>
														<td>
															<div class="d-flex flex-column"> <span class="heading d-block">Status</span> <span class="subheadings"><i class="dots"></i> Booked</span> </div>
														</td>
													</tr>
													<tr>
													

														<td>
															<div class="d-flex flex-column"> <span class="heading d-block">Speciality</span> <span class="subheadings"></span> </div>
														</td>

														<td>
															<div class="d-flex flex-column"> 
														<?php 

															$details =  explode(",",$hospital_details->hos_specialities);												
															foreach($details as$details)
															{
																$spec = \App\Speciality::where('id',$details)->first();

														?>
														<span class="heading d-block"></span> <span class="subheadings">{{$spec->name}}</span>


													<?php } ?>

													</div>
														</td>
													
														<td> </td>
													</tr>
													<tr>
														<td>
															<div class="d-flex flex-column"> <span class="heading d-block">Contact</span> <span class="subheadings"></span></div>
														</td>
														<td colspan="2">
															<div class="d-flex flex-column"> <span class="heading d-block"></span> <span class="subheadings"></span>{{$hospital_details->phone}}</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="d-flex flex-column"> <span class="heading d-block">Description</span> <span class="d-block subheadings"></span> <span class="d-flex flex-row">{{$hospital_details->description}}
																

																	<a href="">


																		<img src="" class="rounded" width="30" />
																	</a>
																

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
							



						</div>

						<!--------------- DETAILS ------------------------->

					</div>


				</div>

			<?php if(empty($exists)){ ?>
				<div class="card">
					<div class="card-header">Information</div>
					<div class="card-body">
						<form action="{{ route('hospital.leads.documents') }}" method="post" accept-charset="UTF-8" role="form" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$booking_id}}">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                <input type="file" id="image" name="documents[]"  multiple="multiple" class="form-control"/>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-12">Description</label>
                                                <div class="col-md-12">
                                                    <textarea name="description" id="description" value=""></textarea> 
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success text-white" type="submit">Submit</button>
                                                </div>
                                            </div>
                          </form>
						

					</div>
				</div>

				<?php 
			}?>


					


				<!------------------- ASSIGN HOSPITAL ------------------->

		



					<!------------------- ASSIGN HOSPITAL ------------------->				


					<div class="tab-pane " id="profile" role="tabpanel">
						<div class="card-body">
							<center class="m-t-30"> <img  src="https://healthcareweb.appmantra.live/public/storage/hospital/071221055710-hospital.jpg" class="img-circle" width="150">
								<h4 class="card-title m-t-10"></h4>
								<b>Address</b>
								<h5></h5>
								<hr>
								<b>Phone : </b></br>

								<b>Email :</b>
							</center>
						</div>
					</div>

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

</script>