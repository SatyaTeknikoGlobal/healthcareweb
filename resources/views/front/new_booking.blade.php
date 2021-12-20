@include('front.common.header')

  <div id="page_title">
            <div class="container text-center">
                <div class="panel-heading">New Booking</div>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">New Booking</li>
                </ol>
            </div>
        </div>
        <section class="profile-sec">
            <div class="container">
                <div class="row">

                	@include('front.common.sidebar')



                  <div class="col-md-9 col-sm-8 col-xs-12">

                     @include('snippets.errors')
                    @include('snippets.flash')

                        <div class="login-right">
                            <div class="login-header">
                                <h3 class="mb-5">Book an <span>appointment</span></h3>
                            </div>
                            <form action="{{route('home.new_booking')}}" method="post" enctype="multipart/form-data">

                                {{ csrf_field() }}


                                <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">

                                 <div class="form-group form-focus col-md-6">
                                    <label class="focus-label">Name:</label>
                                    <input type="text" id="name" name="name" placeholder="Name" class="form-control floating" value="{{$user->name}}">




                                </div>

                                <?php //echo $user; ?>
                                <div class="form-group form-focus col-md-6">
                                    <label class="focus-label">Email:</label>
                                    <input type="text" id="email" name="email" placeholder="Email" class="form-control floating" value="{{$user->email}}">


                                </div>
                               
                                <div class="form-group form-focus col-md-6">
                                    <label class="focus-label">Mobile No.:</label>
                                    <input type="text" id="phone" name="phone"  placeholder="Mobile no." class="form-control floating" value="{{$user->phone}}">


                                </div>

                                 <div class="form-group form-focus col-md-6">
                                    <label class="focus-label">Alternate Phone</label>
                                    <input type="number" id="alternate_phone" name="alternate_phone"  placeholder="Alternate Phone" class="form-control floating">


                                </div>

                                <div class="form-group form-focus col-md-12">
                                    <label class="focus-label">Description</label>
                                    <textarea  id="description" name="description" cols="4" rows="5" placeholder="Enter description here !!" class="form-control"></textarea>
                                </div>

                                  <div class="form-group form-focus col-md-12">
                                    <label class="focus-label">Disease</label>
                                    <select name="diseases" id="diseases" class="form-control floating select2-single">
                                         <option value="" selected disabled>Select Disease</option>

                                <?php if(!empty($diseases)){
                                    foreach($diseases as $disease){
                              
                                    ?>
                                        <option value="{{$disease->id}}">{{$disease->name}}</option>
                                <?php } } ?>
                                        
                                    </select>
                                </div>


                                <div class="form-group form-focus col-md-6">
                                    <label class="focus-label">Country</label>
                                    <select name="country_id" id="country_id" class="form-control floating select2-single">
                                         <option value="" selected disabled>Select Country</option>

                                <?php 
                                if(!empty($countries)){
                                     foreach($countries as $country){ ?>
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                <?php } } ?>
                                        
                                    </select>
                                </div>

                                

                                <div class="form-group form-focus col-md-6">
                                    <label class="focus-label">State</label>
                                    <select name="state_id" id="state_id" class="form-control floating select2-single">
                                        <option value="" selected disabled>Select State</option>
                                        <option value=""></option>
                                        
                                    </select>
                                </div>

                                <div class="form-group form-focus col-md-6">
                                    <label class="focus-label">City</label>
                                    <select name="city_id" id="city_id" class="form-control floating select2-single">
                                         <option value="" selected disabled>Select City</option>
                                        <option value=""></option>
                                       
                                    </select>
                                </div>

                                <div class="form-group form-focus col-md-6">
                                    <label class="focus-label">Address</label>
                                    <input type="text" id="address" name="address" placeholder="Enter Address" class="form-control floating">
                                </div>

                                <!--  <div class="form-group form-focus col-md-6">
                                    <label class="focus-label">Address</label>
                                    <input type="text" id="addressTextField" name="address" placeholder="Enter Address" class="form-control floating">
                                </div> -->  


                                <div class="form-group form-focus col-md-6">
                                    <label class="focus-label">Register For</label>
                                    <select name="register_for" id="register_for" class="form-control floating">
                                        <option value="self">Self</option>
                                        <option value="family">Family</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>

                                <div class="form-group form-focus col-md-6">
                                    <label class="focus-label">Previous Medical Records:</label>
                                    <input type="file" name="medical_record[]" multiple id="medical_record" class="form-control floating">
                                </div>

                                 <input type="hidden" name="latitude" id="latitude">
                                <input type="hidden" name="longitude" id="longitude">

                                <button class="btn btn-primary btn-block btn-lg login-btn" id="submit" type="submit">Submit</button>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>


@include('front.common.footer')

<script>

$('#country_id').on('change', function()
 {


    var _token = '{{ csrf_token() }}';
    var country_id = $('#country_id').val();
    $.ajax({
      url: "{{ route('get_state') }}",
      type: "POST",
      data: {country_id:country_id},
      dataType:"HTML",
      headers:{'X-CSRF-TOKEN': _token},
      cache: false,
      success: function(resp){
        // console.log(resp);
         $('#state_id').html(resp);
     }
 });
});


    
    $('#state_id').on('change', function()
 {

    var _token = '{{ csrf_token() }}';
    var state_id = $('#state_id').val();
    $.ajax({
      url: "{{ route('get_city') }}",
      type: "POST",
      data: {state_id:state_id},
      dataType:"HTML",
      headers:{'X-CSRF-TOKEN': _token},
      cache: false,
      success: function(resp){
         $('#city_id').html(resp);
     }
 });
});


 $('#city_id').on('change', function()
 {

    var _token = '{{ csrf_token() }}';
    var city_id = $('#city_id').val();


    $.ajax({
      url: "{{ route('get_locality') }}",
      type: "POST",
      data: {city_id:city_id},
      dataType:"HTML",
      headers:{'X-CSRF-TOKEN': _token},
      cache: false,
      success: function(resp){
         $('#location').html(resp);
     }
 });
});

</script>