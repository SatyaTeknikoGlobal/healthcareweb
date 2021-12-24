@include('front.common.header')
<style>
    .card-table{
        margin:0px 15px ;
        border-radius: 5px;
          box-shadow: 2px 2px 5px 0px rgb(0 0 0 / 25%) !important;
    }


 /*  .profile-area h5:nth-child(even){
    white-space: nowrap;
   }

     .profile-area h5:nth-child(odd){
    white-space: break-spaces;
   }*/
</style>

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



                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="appointment-tab">
                            <div class="col-md-4 col-sm-4 col-xs-6 mb-3">
                                <div class="card  pro-card">
                                    <div class="img-div">
                                        <img src="{{asset('public/assets/images/procard3.jpg')}}" alt="Specialty" >
                                       <!--  <i class="fa fa-columns mr-3"></i> -->
                                       </div>
                                       <div>
                                        <h4>Total Appoinments</h4>
                                        <h4 class="theme-color">55</h4>
                                       </div>
                                    
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 mb-3">
                                <div class=" card pro-card">
                                   <div class="img-div">
                                    <img src="{{asset('public/assets/images/procard 2.jpg')}}" alt="Specialty" >
                                   <!--  <i class="fa fa-columns mr-3"></i> -->

                                   </div>
                                   <div>
                                    <h4>Today Appoinments</h4>
                                    <h4 class="theme-color">2</h4>
                                   </div>
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-12  mb-3">
                                <div class="card pro-card">
                                    <label>
                                    <div class="img-div">
                                        <img src="{{asset('public/assets/images/upload.png')}}" alt="Specialty" >
                                      <!--   <i class="fas fa-image"></i> -->
                                        
                                        
                                    </div>
                                   <div>
                                     <h4>Upload Prescriptions</h4>
                                         <input accept="image/png,image/gif,image/jpeg" formcontrolname="document" multiple="" ng2fileselect="" type="file" class="accept" id="filetag" style="opacity: 0">
                                   
                                   
                                    <h5>
                                        </label>
                                    </h5>
                                   </div>
                                </div>

                            </div>
                            <div class="card card-table mb-3">
                              
                                <div class="card-body profile-area w-auto">

                                    <div>
                                        <div class="col-md-4 col-xs-12 col-sm-4">
                                            <h5>Name :</h5>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <h5>Dr. Darren Elder</h5>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-4">
                                            <h5>Specialty :</h5>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <h5>BDS, MDS - Oral &amp; Maxillofacial Surgery</h5>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-4">
                                            <h5>Total Patient :</h5>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <h5>1500
                                                <span>Till Today</span>
                                            </h5>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-4">
                                            <h5>Appoinments :
                                            </h5>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
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
