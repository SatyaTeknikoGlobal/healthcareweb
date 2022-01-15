@include('front.common.header')



<style>
    .content{
        background-color: #f2f2f2;
    }
    .account-content {
    padding: 50px 136px;
}
.login-right{
    margin-bottom: 20px;
    position: relative;
}
.login-right::after{
    content: "";
    position: absolute;
    width: 20px;
    left: -10px;
    height: 20px;
    background-color: white;
    top: 20px;
    transform: translateY(-50%) rotate( 
45deg);



}
.step:before{
    content: "";
  position: absolute;
    width: 48px;
    height: 48px;
    left: -75px;
    top: 31px;
    font-size: 31px;
    text-align: center;
    background-color: #848892;
    color: #fff;
    border-radius: 50%;
    transform: translateY(-50%);

}

.step-1:before{
    content: "1";
    
   
   


}
.step-2:before{
    content: "2";
    
   
   


}
.step-6:before{
    content: "6";
    
   
   

}
.step-3:before{
    content: "3";
    
   
   

}
.step-4:before{
    content: "4";
    
   
   

}
.step-5:before{
    content: "5";
    
   
   

}
form{
    display: none;
    animation: fixedBottomContent 0.4s;
}

.form-block{
    display: block !important;
}

.login-right{
    padding: 11px 33px !important;
}

@-webkit-keyframes fixedBottomContent {
  from {
    -webkit-transform: translateY(100%);
    transform: translateY(100%);
    -webkit-transform-origin: center top 0px;
    transform-origin: center top 0px;
  }

  to {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}

@keyframes fixedBottomContent {
  from {
    -webkit-transform: translateY(100%);
    transform: translateY(100%);
    -webkit-transform-origin: center top 0px;
    transform-origin: center top 0px;
  }

  to {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}

.account-content::before{
    content: "";
    position: absolute;
    width: 3px;
    background-color: #848892;
    height: 85%;
    top: 80px;
    left: 85px;
    transform: translateX(-50%);
    
}


.account-content{
    position: relative;
    height: 100%;
}

@media  only screen and (max-width: 767px) {
    .slider-section .shape-2 {
        width: 100px;
        left: 45px
    }
     .header-logo img{
        width: 100px;
        height: auto;
    }
      .account-content{
        padding: 0px;
        margin-top: 20px;
    }
    .account-content::before {
        content: "";
        position: absolute;
        width: 3px;
        background-color: #848892;
        height: 90%;
        top: 10px;
        left: 0px;
   
        
    }
    .login-right::after{
        display: none;
    }
    .step:before{
        width: 33px;
    height: 33px;
    font-size: 21px;
    left: -33px;
       
        
    }

     .btn-primary{
        padding: 0;
    }

    .login-right {
    padding: 11px 33px !important;
    width: 94%;
    margin-left: auto;
}
   
}
</style>

<!-- <style>

   

    .content{
        background-color: #f2f2f2;
    }
    .account-content {
        padding: 50px 136px;
    }
    .login-right{
        margin-bottom: 20px;
    }
    .login-right::after{
        content: "";
        position: absolute;
        width: 20px;
        left: -10px;
        height: 20px;
        background-color: white;
        top: 20px;
        transform: translateY(-50%) rotate( 
            45deg);



    }
    .step:before{
        content: "";

        width: 48px;
        height: 48px;
        background-color: #848892;
        color: #fff;
        border-radius: 50%;
        transform: translateY(-50%);

    }

    .step-1:before{
        content: "1";
        font-size: 31px;
        position: absolute;
        left: -75px;
        top: 31px;
        text-align: center;

    }
    .step-2:before{
        content: "2";
        font-size: 31px;
        position: absolute;
        left: -75px;
        top: 31px;
        text-align: center;

    }
    .step-6:before{
        content: "6";
        font-size: 31px;
        position: absolute;
        left: -75px;
        top: 31px;
        text-align: center;
    }
    .step-3:before{
        content: "3";
        font-size: 31px;
        position: absolute;
        left: -75px;
        top: 31px;
        text-align: center;
    }
    .step-4:before{
        content: "4";
        font-size: 31px;
        position: absolute;
        left: -75px;
        top: 31px;
        text-align: center;
    }
    .step-5:before{
        content: "5";
        font-size: 31px;
        position: absolute;
        left: -75px;
        top: 31px;
        text-align: center;
    }
    form{
        display: none;
        animation: fixedBottomContent 0.4s;
    }

    .form-block{
        display: block !important;
    }

    .login-right{
        padding: 11px 33px !important;
    }

    @-webkit-keyframes fixedBottomContent {
      from {
        -webkit-transform: translateY(100%);
        transform: translateY(100%);
        -webkit-transform-origin: center top 0px;
        transform-origin: center top 0px;
    }

    to {
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
}

@keyframes fixedBottomContent {
  from {
    -webkit-transform: translateY(100%);
    transform: translateY(100%);
    -webkit-transform-origin: center top 0px;
    transform-origin: center top 0px;
}

to {
    -webkit-transform: translateY(0);
    transform: translateY(0);
}
}

.account-content::before{
    content: "";
    position: absolute;
    width: 3px;
    background-color: #848892;
    height: 85%;
    top: 80px;
    left: 85px;
    transform: translateX(-50%);
    
}


.account-content{
    position: relative;
    height: 100%;
}


 @media only screen and (max-width: 767px) {
    .slider-section .shape-2 {
        width: 100px;
        left: 45px
    }
     .header-logo img{
        width: 100px;
        height: auto;
    }
      .account-content{
        padding: 0px;
        margin-top: 20px;
    }
    .account-content::before {
        content: "";
        position: absolute;
        width: 3px;
        background-color: #848892;
        height: 100%;
        top: 0;
        left: -8px;
        transform: translateX(-50%);
    }
    .login-right::after{
        display: none;
    }
    .step:before{
        display: none;
    }

     .btn-primary{
        padding: 0;
    }
   
}
</style> -->

<div id="page_title">
    <div class="container text-center">
        <div class="panel-heading">Hospital Registration</div>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Hospital Registration</li>
        </ol>
    </div>
</div>



<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="account-content">





                    <div class="col-md-12  login-right step step-1">
                        <div class="login-header">
                            <h3 class="mb-5">About Section</h3>
                        </div>

                        <!-------------------- FORM 1 -------------------------->

                        <div id="form1">
                            <div class="form-group form-focus col-md-6">
                                <label class="focus-label">Hospital Name :</label>
                                <input type="text" name="name" id="name" class="form-control floating" placeholder="Hospital Name">
                                <span style="color:red;" class="print-error-msg-name "></span>
                            </div>
                            <div class="form-group form-focus col-md-6">
                                <label class="focus-label">Address :</label>
                                <input type="text" name="location" id="location" class="form-control floating" placeholder="Address">
                             <span style="color:red;" class="print-error-msg-location"></span>

                            </div>

                            <div class="form-group form-focus col-md-6">
                                <label class="focus-label">Email ID :</label>
                                <input type="email" name="email" id="email" class="form-control floating" placeholder="Email ID">
                                <span style="color:red;" class="print-error-msg-email "></span>

                            </div>


                            <div class="form-group form-focus col-md-6">
                                <label class="focus-label">Contact Details (Phone number as well as Landline number) :</label>
                                <input type="number" name="phone" id="phone" class="form-control floating" placeholder="Contact Details">
                                <span style="color:red;" class="print-error-msg-phone "></span>

                            </div>

                              <div class="form-group form-focus col-md-6">
                                <label class="focus-label">Established Year :</label>
                                <input type="number" name="established_year" id="established_year" class="form-control floating" placeholder="Enter Established Year">
                                <span style="color:red;" class="print-error-msg-established_year "></span>

                            </div>



                            <div class="d-flex col-md-12">
                               <button  class="btn btn-primary btn-block mx-3 w-auto" id="savenext1" 
                               >Save & Next</button>
                               <button  class="btn btn-primary btn-block mx-3 w-auto"
                               id="next1" >Next</button>


                           </div>


                       </div>
                   </div>


                    <!-------------------- FORM 2 -------------------------->

               <div class="col-md-12  login-right step step-2">
                <div class="login-header">
                    <h3 class="mb-5">Team & Specialties</h3>
                </div>
                <div  id="form2">
                     <div class="form-group form-focus col-md-6">
                        <label class="focus-label">Speciality</label>

                        <?php //print_r($speciality); ?>

                         <select class="form-control select2"  name="hos_specialities"  id="hos_specialities">
                                <option value="" selected disbaled>Select Speciality</option>                       
                            <?php if(!empty($speciality)) { 

                                // print_r($speciality);
                                     foreach($speciality as $s){ ?>
                                <option value="{{$s->id}}">{{$s->name}}</option>
                            <?php } } ?>
                        </select >
                         <span style="color:red;" class="print-error-msg-hos_specialities "></span>
                    </div>

                    <div class="form-group form-focus col-md-6">
                        <label class="focus-label">Number of Doctors :</label>

                        <input type="number" name="number_of_doctors" id="number_of_doctors" value="" class="form-control floating" placeholder="Number of Doctors">
                         <span style="color:red;" class="print-error-msg-number_of_doctors "></span>
                    </div>
                    <div class="form-group form-focus col-md-6">
                        <label class="focus-label">Number of Ambulance :</label>
                        <input type="number" name="number_of_ambulance" id="number_of_ambulance" class="form-control floating" placeholder="Number of Ambulance">
                        <span style="color:red;" class="print-error-msg-number_of_ambulance "></span>
                    </div>

                    <div class="form-group form-focus col-md-6">
                        <label class="focus-label">Number Of Nurses :</label>
                        <input type="number" name="number_of_nurses" id="number_of_nurses" class="form-control floating" placeholder="Number Of Nurses">
                         <span style="color:red;" class="print-error-msg-number_of_nurses "></span>
                    </div>


                    <div class="form-group form-focus col-md-6">
                        <label class="focus-label">Number of Beds & ICU Beds :</label>
                        <input type="number" name="number_of_beds" id="number_of_beds" class="form-control floating" placeholder="Number of Beds & ICU Beds">
                        <span style="color:red;" class="print-error-msg-number_of_beds "></span>

                    </div>



                    <div class="d-flex col-md-12">
                       <button  class="btn btn-primary btn-block mx-3 w-auto" id="savenext2"
                       >Save & Next</button>
                       <button  class="btn btn-primary btn-block mx-3 w-auto"
                       id="next2" >Next</button>
                   </div>


               </div>
           </div>





               <!-------------------- FORM 3 --------------------------> 

           <div class="col-md-12  login-right step step-3">
            <div class="login-header">
                <h3 class="mb-5">Department</h3>
            </div>
            <div  id="form3">             


                <div class="form-group form-focus col-md-6">
                    <label class="focus-label">Select Departments :</label>
                    <select class="form-control"  multiple name="departments"  id="departments">


                                <!-- <option value="" selected disbaled>Select Departments</option> -->
                            <?php if(!empty($departments)){
                                    foreach($departments as $dept){

                             ?>
                                <option value="{{$dept->id}}">{{$dept->department}}</option>
                            <?php }  } ?>
                    </select >
                     <span style="color:red;" class="print-error-msg-departments "></span>
                </div>



                <div class="d-flex col-md-12">
                   <button  class="btn btn-primary btn-block mx-3 w-auto" id="savenext3"
                   >Save & Next</button>
                   <button  class="btn btn-primary btn-block mx-3 w-auto"
                   id="next3" >Next</button>
               </div>


           </div>
       </div>


        <!-------------------- FORM 4 -------------------------->

       <div class="col-md-12  login-right step step-4">
        <div class="login-header">
            <h3 class="mb-5">Success Stories</h3>
        </div>
        <div  id="form4">
            <div class="form-group form-focus col-md-6">
                <label class="focus-label">Surgeries Success Ratios :</label>

                <input type="text" name="surgery_ratio" id="surgery_ratio" value="" class="form-control floating" placeholder="Enter Surgeries Success Ratios">
                 <span style="color:red;" class="print-error-msg-surgery_ratio "></span>
            </div>
            <div class="form-group form-focus col-md-6">
                <label class="focus-label">Mortality Ratio :</label>
                <input type="text" name="mortality_ratio" id="mortality_ratio" class="form-control floating" placeholder="Enter Mortality Ratio">
                  <span style="color:red;" class="print-error-msg-mortality_ratio "></span>
            </div>

            <div class="form-group form-focus col-md-6">
                <label class="focus-label">Success Stories :</label>
                <textarea type="text" name="success_stories" id="success_stories" class="form-control floating" placeholder="Success Stories"></textarea>
                 <span style="color:red;" class="print-error-msg-success_stories "></span>
            </div>


            <div class="form-group form-focus col-md-6">
                <label class="focus-label">About Hospital (A short message) :</label>
                <textarea type="text" name="description" id="description" class="form-control floating" placeholder="About Hospital"></textarea>
                <span style="color:red;" class="print-error-msg-description "></span>
            </div>

             <div class="form-group form-focus col-md-6">
                <label class="focus-label">Number of International Patients every year :</label>
                <input type="number" name="patients_every_year"  id="patient_every_year" class="form-control floating" placeholder="">
                <span style="color:red;" class="print-error-msg-patients_every_year "></span>
            </div>

             <div class="form-group form-focus col-md-6">
                <label class="focus-label">Number of International Patients till now :</label>
                <input type="number" name="patients_till_now"  id="patient_till_now" class="form-control floating" placeholder="">
                <span style="color:red;" class="print-error-msg-patients_till_now "></span>
            </div>



            <div class="d-flex col-md-12">
               <button  class="btn btn-primary btn-block mx-3 w-auto" id="savenext4" 
               >SAVE & NEXT</button>
               <button  class="btn btn-primary btn-block mx-3 w-auto"
               id="next4" >Next</button> 
           </div>


       </div>
   </div>


                    <!-------------------- FORM 5 -------------------------->

                   <div class="col-md-12  login-right step step-5">
                    <div class="login-header">
                        <h3 class="mb-5">Infrastructure & Facilities</h3>
                    </div>
                    <div  class="form-5" id="form5">
                        <div class="form-group form-focus col-md-12">
                            <label class="focus-label">Hospital Photos </label>

                            <input type="file" class="form-control floating" name="image" id="image">
                              <span style="color:red;" class="print-error-msg-image "></span>
                        </div>
                        <div class="form-group form-focus col-md-12">
                            <label class="focus-label">Hospital Videos</label>
                            <input type="file" class="form-control floating" name="videos" id="videos">
                            <span style="color:red;" class="print-error-msg-videos "></span>
                        </div>              


                        <div class="d-flex col-md-12">
                            <button  class="btn btn-primary btn-block mx-3 w-auto" id="savenext5"
                            >Save & Next</button>
                            <button  class="btn btn-primary btn-block mx-3 w-auto"
                            id="next5" >Next</button>
                        </div>
                    </div>
                </div>


                 <!-------------------- FORM 6  -------------------------->

                <div class="col-md-12  login-right step step-6">

                    <div class="login-header">
                        <h3 class="mb-5">Certification & KYC</h3>
                    </div>
                    <div  id="form6">
                        <div class="form-group form-focus col-md-6">
                            <label class="focus-label">NABH Certificate</label>

                            <input type="file" class="form-control floating" name="nabh_certificate" id="nabh_certificate">
                             <span style="color:red;" class="print-error-msg-nabh_certificate "></span>
                        </div>
                        <div class="form-group form-focus col-md-6">
                            <label class="focus-label">JCI Certification</label>
                           <input type="file" class="form-control floating" name="jci_certificate" id="jci_certificate">
                           <span style="color:red;" class="print-error-msg-jci_certificate "></span>
                        </div>

                        <div class="form-group form-focus col-md-6">
                            <label class="focus-label">Pan number</label>
                           <input type="file" class="form-control floating" name="pan_number" id="pan_number">
                           <span style="color:red;" class="print-error-msg-pan_number "></span>
                        </div>


                        <div class="form-group form-focus col-md-6">
                            <label class="focus-label">GST Number</label>
                           <input type="file" class="form-control floating" name="gst_number" id="gst_number">
                            <span style="color:red;" class="print-error-msg-gst_number "></span>
                        </div>



                        <div class="d-flex col-md-12">
                           <a  href="{{route('hospital.success')}}" class="btn btn-primary btn-block mx-3 w-auto" id="savenext6"
                           >Submit</a>
                           <!-- <button  class="btn btn-primary btn-block mx-3 w-auto"
                           id="next6" >Next</button> -->
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
</div>
</div>
</div>


@include('front.common.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>





<script>
    $(document).ready(function(){
        $('#form1').show();
        $('#form2').hide();
        $('#form3').hide();
        $('#form4').hide();
        $('#form5').hide();
        $('#form6').hide();
        $('#form7').hide();




    });

    $('#savenext5').on('click', function() {

        //alert("test save 5");

                $('#form5').hide();
                $('#form6').show();
    });


     $('#next5').on('click', function() {

       // alert("test next5 5");

                $('#form5').hide();
                $('#form6').show();
    });   

    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg-"+key).html(value);
            // $(".print-error-msg-"+key).find("ul").append('<li>'+value+'</li>');
        });
    }

    ///////////////////FORM1 START/////////////////////////////////////////
    $("#savenext1").click(function(e){
      e.preventDefault();
      var email = $("input[name='email']").val();
      var name = $("input[name='name']").val();
      var phone = $("input[name='phone']").val();
      var location = $("input[name='location']").val();
      var established_year = $("input[name='established_year']").val();
      var form = 'form1';
      var form_type = 'save';
      var _token = '{{ csrf_token() }}';
      $.ajax({
        url: "{{ route('hospital_form_validate') }}",
        type:'POST',
        dataType:'JSON',
        headers:{'X-CSRF-TOKEN': _token},
        cache: false,
        data: {email:email, name:name, phone:phone, location:location,established_year:established_year,form:form,form_type:form_type},
        success: function(data) {
            if($.isEmptyObject(data.error)){
               $('#form1').hide();
               if(typeof data.exists === 'object')
               {
                 $('#name').val(data.exists.name);

                $('#hos_specialities').val(data.exists.hos_specialities);
               $('#number_of_doctors').val(data.exists.number_of_doctors);
               $('#number_of_ambulance').val(data.exists.number_of_ambulance);
               $('#number_of_beds').val(data.exists.number_of_beds);
               $('#number_of_nurses').val(data.exists.number_of_nurses);
              
               $('#departments').val(data.exists.departments);

               $('#description').val(data.exists.description);
               $('#success_stories').val(data.exists.success_stories);
               $('#surgery_ratio').val(data.exists.surgery_ratio);
               $('#patients_till_now').val(data.exists.patients_till_now);
               $('#patients_every_year').val(data.exists.patients_every_year);

               }
              

               $('#form2').show();
            }else{
                printErrorMsg(data.error);
            }
        }
    });
});

$("#next1").click(function(e){
      e.preventDefault();
      var email = $("input[name='email']").val();
      var name = $("input[name='name']").val();
      var phone = $("input[name='phone']").val();
      var location = $("input[name='location']").val();
      var established_year = $("input[name='established_year']").val();
      var form = 'form1';
      var form_type = '';
      var _token = '{{ csrf_token() }}';
      $.ajax({
        url: "{{ route('hospital_form_validate') }}",
        type:'POST',
        dataType:'JSON',
        headers:{'X-CSRF-TOKEN': _token},
        cache: false,
        data: {email:email, name:name, phone:phone, location:location,established_year:established_year,form:form,form_type:form_type},
        success: function(data) {
            if($.isEmptyObject(data.error)){
               $('#form1').hide();
               if(data.exists != null)
               {
               $('#name').val(data.exists.name);
               $('#hos_specialities').val(data.exists.hos_specialities);
               $('#number_of_doctors').val(data.exists.number_of_doctors);
               $('#number_of_ambulance').val(data.exists.number_of_ambulance);
               $('#number_of_beds').val(data.exists.number_of_beds);
               $('#number_of_nurses').val(data.exists.number_of_nurses);
              
               $('#departments').val(data.exists.departments);

               $('#description').val(data.exists.description);
               $('#success_stories').val(data.exists.success_stories);
               $('#surgery_ratio').val(data.exists.surgery_ratio);
               $('#patients_till_now').val(data.exists.patients_till_now);
               $('#patients_every_year').val(data.exists.patients_every_year);

               }

              

               $('#form2').show();
            }else{
                printErrorMsg(data.error);
            }
        }
    });
});
    ///////////////////FORM1 END /////////////////////////////////////////

    ///////////////////FORM2 START/////////////////////////////////////////

    $("#savenext2").click(function(e){

       
      e.preventDefault();
       var email = $("input[name='email']").val();
      var name = $("input[name='name']").val();
      var phone = $("input[name='phone']").val();
      var location = $("input[name='location']").val();
      var established_year = $("input[name='established_year']").val();  
      var hos_specialities = $("#hos_specialities").val();

      // var hos_specialities = $("input[name='hos_specialities']").val();

     // alert("hos_specialities = "+hos_specialities);
      var number_of_doctors = $("input[name='number_of_doctors']").val();
      var number_of_ambulance = $("input[name='number_of_ambulance']").val();
      var number_of_nurses = $("input[name='number_of_nurses']").val();
      var number_of_beds = $("input[name='number_of_beds']").val();
      
      var form = 'form2';
      var form_type = 'save';
      var _token = '{{ csrf_token() }}';
       // alert("test formd2");
        

      $.ajax({
        url: "{{ route('hospital_form_validate') }}",
        type:'POST',
        dataType:'JSON',
        headers:{'X-CSRF-TOKEN': _token},
        cache: false,
        data: {email:email, name:name, phone:phone, location:location,established_year:established_year,hos_specialities:hos_specialities, number_of_doctors:number_of_doctors,number_of_ambulance:number_of_ambulance, number_of_nurses:number_of_nurses, number_of_beds:number_of_beds, form:form,form_type:form_type},
        success: function(data) {

            // alert(data);
            if($.isEmptyObject(data.error)){
               $('#form1').hide();
               $('#form2').hide();
               $('#form3').show();
            }else{
                printErrorMsg(data.error);
            }
        }
    });
});



$("#next2").click(function(e){
      e.preventDefault();
     var email = $("input[name='email']").val();
      var name = $("input[name='name']").val();
      var phone = $("input[name='phone']").val();
      var location = $("input[name='location']").val();
      var established_year = $("input[name='established_year']").val();

      var hos_specialities = $("#hos_specialities").val();
      // alert("hos_specialities = "+hos_specialities);
      var number_of_doctors = $("input[name='number_of_doctors']").val();
      var number_of_ambulance = $("input[name='number_of_ambulance']").val();
      var number_of_nurses = $("input[name='number_of_nurses']").val();
      var number_of_beds = $("input[name='number_of_beds']").val();

      var form = 'form2';
      var form_type = '';
      var _token = '{{ csrf_token() }}';
      $.ajax({
        url: "{{ route('hospital_form_validate') }}",
        type:'POST',
        dataType:'JSON',
        headers:{'X-CSRF-TOKEN': _token},
        cache: false,
        data: {email:email, name:name, phone:phone, location:location,established_year:established_year,hos_specialities:hos_specialities, number_of_doctors:number_of_doctors,number_of_ambulance:number_of_ambulance, number_of_nurses:number_of_nurses, number_of_beds:number_of_beds, form:form,form_type:form_type},
        success: function(data) {
            if($.isEmptyObject(data.error)){
               $('#form1').hide();
               $('#form2').hide();
                $('#form3').show();
            }else{
                printErrorMsg(data.error);
            }
        }
    });
});

    ///////////////////FORM2 END/////////////////////////////////////////


      ///////////////////FORM3 START/////////////////////////////////////////

    $("#savenext3").click(function(e){

       
      e.preventDefault();
       var email = $("input[name='email']").val();
      var name = $("input[name='name']").val();
      var phone = $("input[name='phone']").val();
      var location = $("input[name='location']").val();
      var established_year = $("input[name='established_year']").val();

       var hos_specialities = $("#hos_specialities").val();
      var number_of_doctors = $("input[name='number_of_doctors']").val();
      var number_of_ambulance = $("input[name='number_of_ambulance']").val();
      var number_of_nurses = $("input[name='number_of_nurses']").val();
      var number_of_beds = $("input[name='number_of_beds']").val();

      var departments = $("#departments").val();

      //alert("departments = "+departments);
      
      var form = 'form3';
      var form_type = 'save';
      var _token = '{{ csrf_token() }}';
      //  alert("test formd3");


      $.ajax({
        url: "{{ route('hospital_form_validate') }}",
        type:'POST',
        dataType:'JSON',
        headers:{'X-CSRF-TOKEN': _token},
        cache: false,
        data: {email:email, name:name, phone:phone, location:location,established_year:established_year,hos_specialities:hos_specialities, number_of_doctors:number_of_doctors,number_of_ambulance:number_of_ambulance, number_of_nurses:number_of_nurses, number_of_beds:number_of_beds,departments:departments, form:form,form_type:form_type},
        success: function(data) {

             // console.log("data = "+data);
            if($.isEmptyObject(data.error)){
               $('#form1').hide();
               $('#form2').hide();
               $('#form3').hide();
                $('#form4').show();
            }else{
                printErrorMsg(data.error);
            }
        }
    });
});



$("#next3").click(function(e){
      e.preventDefault();
     var email = $("input[name='email']").val();
      var name = $("input[name='name']").val();
      var phone = $("input[name='phone']").val();
      var location = $("input[name='location']").val();
      var established_year = $("input[name='established_year']").val();

      var hos_specialities = $("#hos_specialities").val();
      var number_of_doctors = $("input[name='number_of_doctors']").val();
      var number_of_ambulance = $("input[name='number_of_ambulance']").val();
      var number_of_nurses = $("input[name='number_of_nurses']").val();
      var number_of_beds = $("input[name='number_of_beds']").val();

      var departments = $("#departments").val();

     // alert("departments ="+departments);

      var form = 'form3';
      var form_type = '';
      var _token = '{{ csrf_token() }}';
      $.ajax({
        url: "{{ route('hospital_form_validate') }}",
        type:'POST',
        dataType:'JSON',
        headers:{'X-CSRF-TOKEN': _token},
        cache: false,
        data: {email:email, name:name, phone:phone, location:location,established_year:established_year,hos_specialities:hos_specialities, number_of_doctors:number_of_doctors,number_of_ambulance:number_of_ambulance, number_of_nurses:number_of_nurses, number_of_beds:number_of_beds,departments:departments, form:form,form_type:form_type},
        success: function(data) {
            if($.isEmptyObject(data.error)){
               $('#form1').hide();
               $('#form2').hide();
               $('#form3').hide();
                $('#form4').show();
            }else{
                printErrorMsg(data.error);
            }
        }
    });
});

    ///////////////////FORM3 END/////////////////////////////////////////



     ///////////////////FORM4 START/////////////////////////////////////////

    $("#savenext4").click(function(e){
      e.preventDefault();
       var email = $("input[name='email']").val();
      var name = $("input[name='name']").val();
      var phone = $("input[name='phone']").val();
      var location = $("input[name='location']").val();
      var established_year = $("input[name='established_year']").val();

       var hos_specialities = $("#hos_specialities").val();
      var number_of_doctors = $("input[name='number_of_doctors']").val();
      var number_of_ambulance = $("input[name='number_of_ambulance']").val();
      var number_of_nurses = $("input[name='number_of_nurses']").val();
      var number_of_beds = $("input[name='number_of_beds']").val();

      var departments = $("#departments").val();

      var surgery_ratio = $("input[name='surgery_ratio']").val();
      var mortality_ratio = $("input[name='mortality_ratio']").val();
      var success_stories = $("#success_stories").val();
      var description = $("#description").val();

      // alert("success_stories = "+success_stories);
      // alert("description = "+description);
      var patients_every_year = $("input[name='patients_every_year']").val();
      var patients_till_now = $("input[name='patients_till_now']").val();

      
      
      var form = 'form4';
      var form_type = 'save';
      var _token = '{{ csrf_token() }}';
       


      $.ajax({
        url: "{{ route('hospital_form_validate') }}",
        type:'POST',
        dataType:'JSON',
        headers:{'X-CSRF-TOKEN': _token},
        cache: false,
        data: {email:email, name:name, phone:phone, location:location,established_year:established_year,hos_specialities:hos_specialities, number_of_doctors:number_of_doctors,number_of_ambulance:number_of_ambulance, number_of_nurses:number_of_nurses, number_of_beds:number_of_beds,departments:departments,surgery_ratio:surgery_ratio, mortality_ratio:mortality_ratio, success_stories:success_stories, description:description, patients_every_year:patients_every_year,  patients_till_now:patients_till_now, form:form,form_type:form_type},
        success: function(data) {

             // console.log("data = "+data);
            if($.isEmptyObject(data.error)){
               $('#form1').hide();
               $('#form2').hide();
               $('#form3').hide();
                $('#form4').hide();
                $('#form5').show();
            }else{
                printErrorMsg(data.error);
            }
        }
    });
});



$("#next4").click(function(e){
      e.preventDefault();
     var email = $("input[name='email']").val();
      var name = $("input[name='name']").val();
      var phone = $("input[name='phone']").val();
      var location = $("input[name='location']").val();
      var established_year = $("input[name='established_year']").val();

       var hos_specialities = $("#hos_specialities").val();
      var number_of_doctors = $("input[name='number_of_doctors']").val();
      var number_of_ambulance = $("input[name='number_of_ambulance']").val();
      var number_of_nurses = $("input[name='number_of_nurses']").val();
      var number_of_beds = $("input[name='number_of_beds']").val();

      var departments = $("#departments").val();

      var surgery_ratio = $("input[name='surgery_ratio']").val();
      var mortality_ratio = $("input[name='mortality_ratio']").val();
      var success_stories = $("input[name='success_stories']").val();
      var description = $("input[name='description']").val();
      var patients_every_year = $("input[name='patients_every_year']").val();
      var patients_till_now = $("input[name='patients_till_now']").val();

      // alert("departments ="+departments);

      var form = 'form4';
      var form_type = '';
      var _token = '{{ csrf_token() }}';
      $.ajax({
        url: "{{ route('hospital_form_validate') }}",
        type:'POST',
        dataType:'JSON',
        headers:{'X-CSRF-TOKEN': _token},
        cache: false,
        data: {email:email, name:name, phone:phone, location:location,established_year:established_year,hos_specialities:hos_specialities, number_of_doctors:number_of_doctors,number_of_ambulance:number_of_ambulance, number_of_nurses:number_of_nurses, number_of_beds:number_of_beds,departments:departments,surgery_ratio:surgery_ratio, mortality_ratio:mortality_ratio, success_stories:success_stories, description:description, patients_every_year:patients_every_year,  patients_till_now:patients_till_now, form:form,form_type:form_type},
        success: function(data) {
            if($.isEmptyObject(data.error)){
               $('#form1').hide();
               $('#form2').hide();
               $('#form3').hide();
                $('#form4').hide();
                $('#form5').show();
            }else{
                printErrorMsg(data.error);
            }
        }
    });
});

    ///////////////////FORM4 END/////////////////////////////////////////



       ///////////////////FORM5 START/////////////////////////////////////////


    $("#savenext5").click(function(e){       
      e.preventDefault();

      // $('#form5fileupload').submit();


       var email = $("input[name='email']").val();
      var name = $("input[name='name']").val();
      var phone = $("input[name='phone']").val();
      var location = $("input[name='location']").val();
      var established_year = $("input[name='established_year']").val();

       var hos_specialities = $("#hos_specialities").val();
      var number_of_doctors = $("input[name='number_of_doctors']").val();
      var number_of_ambulance = $("input[name='number_of_ambulance']").val();
      var number_of_nurses = $("input[name='number_of_nurses']").val();
      var number_of_beds = $("input[name='number_of_beds']").val();

      var departments = $("#departments").val();

      var surgery_ratio = $("input[name='surgery_ratio']").val();
      var mortality_ratio = $("input[name='mortality_ratio']").val();
      var success_stories = $("input[name='success_stories']").val();
      var description = $("input[name='description']").val();
      var patients_every_year = $("input[name='patients_every_year']").val();
      var patients_till_now = $("input[name='patients_till_now']").val();

      var image = $("input[name='image']").val();
      var videos = $("input[name='videos']").val();      
      
      var form = 'form5';
      var form_type = 'save';
      var _token = '{{ csrf_token() }}'; 
      var filedata = new FormData();
      filedata.append('file', $('#image').prop('files')[0]);

      $.ajax({
      //  url: "{{ route('hospital_form_validate') }}",
        type:'POST',
        dataType:'JSON',
         contentType:'multipart/form-data',
        headers:{'X-CSRF-TOKEN': _token},
        cache: false,
        data: {email:email, name:name, phone:phone, location:location,established_year:established_year,hos_specialities:hos_specialities, number_of_doctors:number_of_doctors,number_of_ambulance:number_of_ambulance, number_of_nurses:number_of_nurses, number_of_beds:number_of_beds,departments:departments,surgery_ratio:surgery_ratio, mortality_ratio:mortality_ratio, success_stories:success_stories, description:description, patients_every_year:patients_every_year,  patients_till_now:patients_till_now, image:image,videos:videos,  form:form,form_type:form_type,filedata},
        success: function(data) {

             // console.log("data = "+data);
            if($.isEmptyObject(data.error)){
               $('#form1').hide();
               $('#form2').hide();
               $('#form3').hide();
                $('#form4').hide();
                $('#form5').hide();
                 $('#form6').show();
            }else{
                printErrorMsg(data.error);
            }
        }
    });
});



$("#next5").click(function(e){
      e.preventDefault();
     var email = $("input[name='email']").val();
      var name = $("input[name='name']").val();
      var phone = $("input[name='phone']").val();
      var location = $("input[name='location']").val();
      var established_year = $("input[name='established_year']").val();

      var hos_specialities = $("#hos_specialities").val();
      var number_of_doctors = $("input[name='number_of_doctors']").val();
      var number_of_ambulance = $("input[name='number_of_ambulance']").val();
      var number_of_nurses = $("input[name='number_of_nurses']").val();
      var number_of_beds = $("input[name='number_of_beds']").val();

      var departments = $("#departments").val();

      var surgery_ratio = $("input[name='surgery_ratio']").val();
      var mortality_ratio = $("input[name='mortality_ratio']").val();
      var success_stories = $("input[name='success_stories']").val();
      var description = $("input[name='description']").val();
      var patients_every_year = $("input[name='patients_every_year']").val();
      var patients_till_now = $("input[name='patients_till_now']").val();

        var image = $("input[name='image']").val();
      var videos = $("input[name='videos']").val();


      // alert("departments ="+departments);

      var form = 'form5';
      var form_type = '';
      var _token = '{{ csrf_token() }}';
      $.ajax({
       // url: "{{ route('hospital_form_validate') }}",
        type:'POST',
        dataType:'JSON',
        contentType:'multipart/form-data',
        headers:{'X-CSRF-TOKEN': _token},
        cache: false,
        data: {email:email, name:name, phone:phone, location:location,established_year:established_year,hos_specialities:hos_specialities, number_of_doctors:number_of_doctors,number_of_ambulance:number_of_ambulance, number_of_nurses:number_of_nurses, number_of_beds:number_of_beds,departments:departments,surgery_ratio:surgery_ratio, mortality_ratio:mortality_ratio, success_stories:success_stories, description:description, patients_every_year:patients_every_year,  patients_till_now:patients_till_now, image:image, videos:videos, form:form,form_type:form_type},
        success: function(data) {
            if($.isEmptyObject(data.error)){
               $('#form1').hide();
               $('#form2').hide();
               $('#form3').hide();
                $('#form4').hide();
                 $('#form5').hide();
                 $('#form6').show();
            }else{
                printErrorMsg(data.error);
            }
        }
    });
});

    ///////////////////FORM5 END/////////////////////////////////////////


    ///////////////////FORM6 START/////////////////////////////////////////

//     $("#savenext6").click(function(e){

//       //  alert("form 6");

       
//       e.preventDefault();
//        var email = $("input[name='email']").val();
//       var name = $("input[name='name']").val();
//       var phone = $("input[name='phone']").val();
//       var location = $("input[name='location']").val();
//       var established_year = $("input[name='established_year']").val();

//        var hos_specialities = $("#hos_specialities").val();
//       var number_of_doctors = $("input[name='number_of_doctors']").val();
//       var number_of_ambulance = $("input[name='number_of_ambulance']").val();
//       var number_of_nurses = $("input[name='number_of_nurses']").val();
//       var number_of_beds = $("input[name='number_of_beds']").val();

//       var departments = $("#departments").val();

//       var surgery_ratio = $("input[name='surgery_ratio']").val();
//       var mortality_ratio = $("input[name='mortality_ratio']").val();
//       var success_stories = $("input[name='success_stories']").val();
//       var description = $("input[name='description']").val();
//       var patients_every_year = $("input[name='patients_every_year']").val();
//       var patients_till_now = $("input[name='patients_till_now']").val();

//       var image = $("input[name='image']").val();
//       var videos = $("input[name='videos']").val();

//        var nabh_certificate = $("input[name='nabh_certificate']").val();
//       var jci_certificate = $("input[name='jci_certificate']").val();
//        var pan_number = $("input[name='pan_number']").val();
//       var gst_number = $("input[name='gst_number']").val();

      
      
//       var form = 'form6';
//       var form_type = 'save';
//       var _token = '{{ csrf_token() }}';
       


//       $.ajax({
//         url: "{{ route('hospital_form_validate') }}",
//         type:'POST',
//         dataType:'JSON',
//         contentType:'multipart/form-data',
//         headers:{'X-CSRF-TOKEN': _token},
//         cache: false,
//         data: {email:email, name:name, phone:phone, location:location,established_year:established_year,hos_specialities:hos_specialities, number_of_doctors:number_of_doctors,number_of_ambulance:number_of_ambulance, number_of_nurses:number_of_nurses, number_of_beds:number_of_beds,departments:departments,surgery_ratio:surgery_ratio, mortality_ratio:mortality_ratio, success_stories:success_stories, description:description, patients_every_year:patients_every_year,  patients_till_now:patients_till_now, image:image,videos:videos, nabh_certificate:nabh_certificate, jci_certificate:jci_certificate, pan_number:pan_number, gst_number:gst_number,  form:form,form_type:form_type},
//         success: function(data) {

//              // console.log("data = "+data);
//             if($.isEmptyObject(data.error)){
//                $('#form1').hide();
//                $('#form2').hide();
//                $('#form3').hide();
//                 $('#form4').hide();
//                 $('#form5').hide();
//                  $('#form6').show();
//             }else{
//                 printErrorMsg(data.error);
//             }
//         }
//     });
// });



// $("#next6").click(function(e){
//       e.preventDefault();
//      var email = $("input[name='email']").val();
//       var name = $("input[name='name']").val();
//       var phone = $("input[name='phone']").val();
//       var location = $("input[name='location']").val();
//       var established_year = $("input[name='established_year']").val();

//        var hos_specialities = $("#hos_specialities").val();
//       var number_of_doctors = $("input[name='number_of_doctors']").val();
//       var number_of_ambulance = $("input[name='number_of_ambulance']").val();
//       var number_of_nurses = $("input[name='number_of_nurses']").val();
//       var number_of_beds = $("input[name='number_of_beds']").val();

//       var departments = $("#departments").val();

//       var surgery_ratio = $("input[name='surgery_ratio']").val();
//       var mortality_ratio = $("input[name='mortality_ratio']").val();
//       var success_stories = $("input[name='success_stories']").val();
//       var description = $("input[name='description']").val();
//       var patients_every_year = $("input[name='patients_every_year']").val();
//       var patients_till_now = $("input[name='patients_till_now']").val();

//         var image = $("input[name='image']").val();
//       var videos = $("input[name='videos']").val();

//        var nabh_certificate = $("input[name='nabh_certificate']").val();
//       var jci_certificate = $("input[name='jci_certificate']").val();
//        var pan_number = $("input[name='pan_number']").val();
//       var gst_number = $("input[name='gst_number']").val();


//       // alert("departments ="+departments);

//       var form = 'form6';
//       var form_type = '';
//       var _token = '{{ csrf_token() }}';
//       $.ajax({
//         url: "{{ route('hospital_form_validate') }}",
//         type:'POST',
//         dataType:'JSON',
//         headers:{'X-CSRF-TOKEN': _token},
//         cache: false,
//         data: {email:email, name:name, phone:phone, location:location,established_year:established_year,hos_specialities:hos_specialities, number_of_doctors:number_of_doctors,number_of_ambulance:number_of_ambulance, number_of_nurses:number_of_nurses, number_of_beds:number_of_beds,departments:departments,surgery_ratio:surgery_ratio, mortality_ratio:mortality_ratio, success_stories:success_stories, description:description, patients_every_year:patients_every_year,  patients_till_now:patients_till_now, image:image, videos:videos, nabh_certificate:nabh_certificate, jci_certificate:jci_certificate, pan_number:pan_number, gst_number:gst_number, form:form,form_type:form_type},
//         success: function(data) {
//             if($.isEmptyObject(data.error)){
//                $('#form1').hide();
//                $('#form2').hide();
//                $('#form3').hide();
//                 $('#form4').hide();
//                  $('#form5').hide();
//                  $('#form6').show();
//             }else{
//                 printErrorMsg(data.error);
//             }
//         }
//     });
// });

    ///////////////////FORM6 END/////////////////////////////////////////




 $('#image').change(function() {
   // alert('sdfs');
        var data = new FormData();
        data.append('phone', $('#phone').val());
        data.append('email', $('#email').val());
        data.append('file', $('#image').prop('files')[0]);
        data.append('upload_type', "image");

        upload_file(data);
});

 $('#videos').change(function() {
    //alert('sdfs');
        var data = new FormData();
        data.append('phone', $('#phone').val());
        data.append('email', $('#email').val());
        data.append('file', $('#videos').prop('files')[0]);
        data.append('upload_type', "videos");

        upload_file(data);
});

 $('#nabh_certificate').change(function() {
   // alert('nabh_certificate');
        var data = new FormData();
        data.append('phone', $('#phone').val());
        data.append('email', $('#email').val());
        data.append('file', $('#nabh_certificate').prop('files')[0]);
        data.append('upload_type', "nabh_certificate");

        upload_file(data);
});

 $('#jci_certificate').change(function() {
    //alert('sdfs');
        var data = new FormData();
        data.append('phone', $('#phone').val());
        data.append('email', $('#email').val());
        data.append('file', $('#jci_certificate').prop('files')[0]);
        data.append('upload_type', "jci_certificate");

        upload_file(data);
});


 $('#pan_number').change(function() {
   // alert('pan_number');
        var data = new FormData();
        data.append('phone', $('#phone').val());
        data.append('email', $('#email').val());
        data.append('file', $('#pan_number').prop('files')[0]);
        data.append('upload_type', "pan_number");

        upload_file(data);
});

 

 $('#gst_number').change(function() {
    //alert('gst_number');
        var data = new FormData();
        data.append('phone', $('#phone').val());
        data.append('email', $('#email').val());
        data.append('file', $('#gst_number').prop('files')[0]);
        data.append('upload_type', "gst_number");

        upload_file(data);
});



function upload_file(data){
     var _token = '{{ csrf_token() }}';
               $.ajax({
                type: 'post',
                url: "{{ route('upload_image') }}",
                processData: false,
                contentType: false,
                data: data,
                dataType:"JSON",
                headers:{'X-CSRF-TOKEN': _token},
                cache: false,
                success: function (response) {
                  
                },
                error: function (err) {
                 
                }
            });
}

</script>

