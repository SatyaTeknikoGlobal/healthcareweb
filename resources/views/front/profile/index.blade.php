@include('front.common.header')

  <div id="page_title">
            <div class="container text-center">
                <div class="panel-heading">Dashboard</div>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
        <section class="profile-sec">
            <div class="container">
                <div class="row">

                	@include('front.common.sidebar')



                    <div class="col-md-9 col-sm-8 col-xs-12">
                        <div class="appointment-tab">
                            <div class="col-md-4 mb-3">
                                <div class="card ">
                                    <div>
                                        <i class="fa fa-columns mr-3"></i>
                                       </div>
                                       <div>
                                        <h4>Total Appoinments</h4>
                                        <h4 class="theme-color">55</h4>
                                       </div>
                                    
                                </div>

                            </div>
                            <div class="col-md-4 mb-3">
                                <div class=" card">
                                   <div>
                                    <i class="fa fa-columns mr-3"></i>

                                   </div>
                                   <div>
                                    <h4>Today Appoinments</h4>
                                    <h4 class="theme-color">2</h4>
                                   </div>
                                </div>

                            </div>
                            <div class="col-md-4  mb-3">
                                <div class="card d-flex">
                                    <div>
                                        <i class="fas fa-image"></i>
                                        
                                        
                                    </div>
                                   <div>
                                    <h4>Upload Prescriptions</h4>
                                    <h5>
                                        <input accept="image/png,image/gif,image/jpeg" formcontrolname="document" multiple="" ng2fileselect="" type="file" class="accept" id="filetag">
                                    </h5>
                                   </div>
                                </div>

                            </div>
                            <div class="card card-table mb-0">
                              
                                <div class="card-body profile-area">

                                    <div>
                                        <div class="col-md-4">
                                            <h5>Name :</h5>
                                        </div>
                                        <div class="col-md-8">
                                            <h5>Dr. Darren Elder</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <h5>Specialty :</h5>
                                        </div>
                                        <div class="col-md-8">
                                            <h5>BDS, MDS - Oral &amp; Maxillofacial Surgery</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <h5>Total Patient :</h5>
                                        </div>
                                        <div class="col-md-8">
                                            <h5>1500
                                                <span>Till Today</span>
                                            </h5>
                                        </div>
                                        <div class="col-md-4">
                                            <h5>Appoinments :
                                            </h5>
                                        </div>
                                        <div class="col-md-8">
                                            <h5>85</h5>
                                        </div>
                                    </div>


                                </div>
                            </div>
                           

                           
                            
                        </div>

                    </div>

                </div>
            </div>
        </section>




@include('front.common.footer')
