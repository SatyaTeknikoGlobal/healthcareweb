@include('front.common.header')
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        .faetures i {
    font-size: 52px;
    color: #35b6b4!important;
    margin-right: 18px;
}

.faetures p {
    font-size: 20px;
    color: #35b6b4!important;
    line-height: 30px;
}
.faetures {
    box-shadow: 0 1px 6px rgb(0 0 0 / 15%);
    border-radius: 9px;
    background-color: #fff;
    padding: 44px 6px;
    margin-top: 60px;
}
.faetures .col-md-3{
    border-right: 1px solid lightgray;
}
.about-us p{
    font-size: 16px;
    line-height: 33px;
}

 @media screen and (max-width:767px) {
            .faetures .col-md-3 {
                border-bottom: 1px solid lightgray;
            }
        }
    </style>




        <div id="page_title">
            <div class="container-fluid">
               
               <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">About Us</li>
                </ol>

                <div class="panel-heading mt-5">About Us</div>

                <div class="row faetures">
                    <div class="col-md-3">
                        <div class="d-flex">
                            <div class="ml-auto">
                                <i class="fas fa-bed"></i>
                            </div>
                            <div class="mr-auto">
                                <p class="m-0 l-h-12 f-lg-40 font-weight-bold">166+
                                </p>
                                <p class="m-0 l-h-12 f-md-24 white-space-nowrap">
                                    Beds Facility
                                </p>
                            </div>
        
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex">
                            <div class="ml-auto">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="mr-auto">
                                <p class="m-0 l-h-12 f-lg-40 font-weight-bold"> 350+
                                </p>
                                <p class="m-0 l-h-12 f-md-24 white-space-nowrap">
        
        
                                    Trained Staff
                                </p>
                            </div>
        
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex">
                            <div class="ml-auto">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <div class="mr-auto">
                                <p class="m-0 l-h-12 f-lg-40 font-weight-bold">80+
                                </p>
                                <p class="m-0 l-h-12 f-md-24 white-space-nowrap">
        
        
                                    Doctors
                                </p>
                            </div>
        
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex">
                            <div  class="ml-auto">
                                <i class="fas fa-sparkles"></i>
                            </div>
                            <div  class="mr-auto">
                                <p class="m-0 l-h-12 f-lg-40 font-weight-bold">20+
                                </p>
                                <p class="m-0 l-h-12 f-md-24 white-space-nowrap">
                                    Specialities
                                </p>
                            </div>
        
                        </div>
                    </div>
        
                </div>

               </div>
               <!-- <div class="col-md-4">
                   <img src="./images/about-us.png" alt="" class="img-fluid">
                   
               </div> -->
            </div>
        </div>


        <section class="our-team">
            <div class="container about-us">
                <div>
                  
                    
                    <h2 class="panel-heading text-center">Our Story</h2>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-6 col-md-6 mb-5">

                        <h5>

                        </h5>
                        
                        <p>

                            We have a deeper level of patient understanding and are always empathetic to their needs. This encourages a culture of providing a higher standard of patient-centred care. We ask more of ourselves and are always passionate about achieving the highest standards of medical expertise and patient care. We respect each other and our patients, and ensure that their needs are met with dignity. We rise to the occasion each time for we recognise the positive social impact we can create.
                            We understand that being the best is a continuous journey of becoming better versions of ourselves every day.

                        </p>
                    </div>
                    <div class="col-sm-6 col-md-6 mb-5 text-center">
                       <img src="./images/about-us.png" alt="" class="img-fluid" width="300">
                    </div>
                  
                    
                </div>
               
                
            </div>
        </section>

        @include('front.common.footer')



        
