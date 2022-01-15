@include('front.common.header')
<style>
    .card{
        background-color: #fff;
        padding: 0;
            border-radius: 8px;

        
        
    }
    .card_text,
    .card_title{
        color: #000;
        padding: 0 21px;
            font-size: 15px;
    line-height: 27px;
    font-family: inherit;
    font-weight: 500;
    }
    .card_text{
        text-align: left;
    }

     .card_title{
           font-size: 17px;
    background-color: #043571;
    color: #fff;
    padding: 8px 9px;
    font-family: inherit;
    font-weight: 400;
        margin-bottom: 5px;
    }

    .card_btn{
            border: 1px solid;
    padding: 0 21px;
    font-family: inherit;
    text-transform: capitalize;
   margin: 6px 2px;


    }
    .card-table{
        margin:0px 15px ;
        border-radius: 5px;
        box-shadow: 2px 2px 5px 0px rgb(0 0 0 / 25%) !important;
    }

    .cards_item {
        padding: 10;
    }

    .card_content {
   
    height: 100%;
    background: none;
    padding:  0;
    text-align: center;
}





 
</style>

<div id="page_title">
    <div class="container text-center">
        <div class="panel-heading">Dashboard</div>
        <ol class="breadcrumb">
            <li><a href="{{route('home.dashboard')}}">Home</a></li>
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
                          <?php
                           $bookings = count($total_bookings);
                           $latest_booking = count($latest_bookings);

                          ?>
                        <div class="card  pro-card">
                            <div class="img-div">
                                <img src="{{asset('public/assets/images/procard3.jpg')}}" alt="Specialty" >                              
                            </div>
                            <div>
                                <h4>Total Appoinments</h4>
                                <h4 class="theme-color">{{$bookings ?? ''}}</h4>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6 mb-3">
                        <div class=" card pro-card">
                         <div class="img-div">
                            <img src="{{asset('public/assets/images/procard 2.jpg')}}" alt="Specialty" >                          
                        </div>
                        <div>
                            <h4>Today Appoinments</h4>
                            <h4 class="theme-color">{{$latest_booking ?? ''}}</h4>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 col-sm-12  mb-3">
                    <div class="card pro-card">
                        <label>
                            <div class="img-div">
                                <img src="{{asset('public/assets/images/upload.png')}}" alt="Specialty" >                               
                            </div>
                            <div>
                               <h4>Upload Prescriptions</h4>
                                <input type="hidden" name="user_id" id="user_id" value="{{auth()->guard('appusers')->user()->id ?? ''}}">
                                <input type="file" class="accept" multiple name="user_prescription[]"  id="user_prescription" style="opacity: 0">
                            <h5>
                            </label>
                        </h5>
                    </div>
                </div>

            </div>

            <div class="col-md-12 text-center my-3">
                    <h3 class="panel-heading">Today's Bookings</h3>                
            </div>
            <section class="profile-sec">
                <div class="container">
                    <div class="row">                       
                        <ul class="cards" id="post-data"></ul>                           
                </div>
                </div>
            </section>

        </div>
    </div>
</div>
</div>
</section>

@include('front.common.footer')

<script>
    $('#user_prescription').change(function() {
   var files = $('#user_prescription').prop('files');
   var data = new FormData();
   var imgArr = [];
   for(var i = 0; i < files.length; i++){         
          data.append('files[]', files[i]);
      }    
       
        data.append('user_id', $('#user_id').val());
        upload_file(data);
    });

    function upload_file(data){
       var _token = '{{ csrf_token() }}';
       $.ajax({
        type: 'post',
        url: "{{ route('home.upload_prescriptions1') }}",
        processData: false,
        contentType: false,
        data: data,
        dataType:"JSON",
        headers:{'X-CSRF-TOKEN': _token},
        cache: false,
        success: function (response) {

        },
    });
   }  


</script>


<script>

var user_id = '{{Auth::guard('appusers')->user()->id}}';
    var page = 1;

    $( document ).ready(function() {
    get_today_bookings(user_id,page);
});

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
             get_today_bookings(user_id,page);;
        }
    });    
    
    function get_today_bookings(user_id,page)
    {  
         $.ajax(
            {
                url: '{{ route('home.get_today_bookings') }}',
                type: "get",
                dataType:'HTML',
                data: {user_id:user_id,page:page},
                success: function(data) {
                    console.log("data = "+data);
                },
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {
                if(data == " "){
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();
                $("#post-data").append(data);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                  // alert('server not responding...');
            });

    }
</script>