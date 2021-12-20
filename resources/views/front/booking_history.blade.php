@include('front.common.header')

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


			<div class="col-md-8 col-sm-8 col-xs-12 text-center">
				
				
				<div class="main">
					<ul class="cards" id="post-data">
						
					
					</ul>
				</div>

				<button class="ajax-load btn btn-primary mr-3 " type="button">Load More</button>
			</div>




		</div>
	</div>
</section>




@include('front.common.footer')

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
	              alert('server not responding...');
	        });

	}
</script>
