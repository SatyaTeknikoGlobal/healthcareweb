@include('front.common.header')


<style>

	.card{
		padding: 0rem !important;
		border-radius: 7px;
		width: 100%;
	/*	background:#4963A5 !important;*/
	background:#fff;
	box-shadow:  2px 1px 40px -14px rgb(38 37 37 / 38%);
	}

	.card_content{
		height: 100%;
		border-radius: 7px;
		padding: 0px !important
	}
	.card_text{
		padding: 4px 17px;
		font-weight: 500;
		color: #000;
	}

	.card_content{
		text-align: left;
		background:transparent;
	}
	.card_content .card_btn{
	width: 93%;
    background: #fff;
    font-weight: 700;
    color: #f97d09;
    font-size: 13px;
    border-radius: 7px;
    position: relative;
    bottom: 5px;
    margin: 2px 8px;
	}

.my_description{
 display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;  
  overflow: hidden;

	}
	.card_title{
		font-size: 15px;
    margin-bottom: 10px;
    letter-spacing: 0px;
    color: #fff;
    font-weight: 500;
    background:#043571;
    padding: 12px 17px;
    border-bottom: 1px solid #f0f0f0;
    height:auto;
	}
</style>

<div id="page_title">
	<div class="container text-center">
		<div class="panel-heading">Booking History</div>
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">Booking History</li>
		</ol>
	</div>
</div>
<section class="profile-sec">
	<div class="container">
		<div class="row">

			@include('front.common.sidebar')


			<div class="col-md-9 col-sm-12 col-xs-12 text-center">
				
				
				<div class="main">
					<ul class="cards" id="post-data">
						
					
					</ul>



				</div>

				<button class="ajax-load btn btn-primary mr-3 my-5 d-block" type="button">Load More</button>

				
			</div>




		</div>
	</div>
</section>




<script>

var user_id = '{{Auth::guard('appusers')->user()->id}}';
	var page = 1;

	$( document ).ready(function() {
    get_bookings(user_id,page);
});



	$(window).scroll(function() {
	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
	        page++;
	         get_bookings(user_id,page);;
	    }
	});
	
	
	
	function get_bookings(user_id,page)
	{		


		 $.ajax(
	        {
	            url: '{{ route('home.get_bookings') }}',
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



@include('front.common.footer')