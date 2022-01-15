@include('front.common.header')
<style type="text/css">
	.container, .container-lg, .container-md, .container-sm, .container-xl {
    max-width: 1268px;
}
	.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    width: 100%;
    padding: 0px;
   /* background-color: #4963A5 !important;*/
   background-color: rgba(189, 235, 239, 0.5);

    word-wrap: break-word;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 1.25rem;
    box-shadow: white 0 3px 15px 0;
   transition: all 0.25s;
}

.card_content{
	width: 100%;
	border-radius: 1.25rem;
	padding: 0px;
	background: transparent;
	/*box-shadow: inset 2px 0px 12px 2px rgb(0 0 0 / 8%) !important;*/
	height: 100%;
	padding-bottom: 60px;

}
.cards_item{
	 transition: all 0.25s;
	 padding-top: 0px;
}
.cards_item:hover .card{
	transform: translateY(-5px);
    box-shadow: rgb(134 167 170 / 50%) 0 3px 15px 0;

}

.card_btn{
	border:1px solid;
	transition: all 2000ms cubic-bezier(0.19, 1, 0.22, 1) 0ms;
	transform: translateY(0);
	position: absolute;
	bottom: 20px;
	left: 40%;
}
.card_btn:hover{
	transform: translateY(-10px);
}


.card_content i{

	    color: #f97d09 !important;
	}

	button .card_btn{
		    border: 2px solid #f97d09;
		    margin:  15px 0px !important;
		    width: auto !important;

	}
	button{
		  margin:  15px 0px !important;
	}
	.card_title{
	margin-bottom: 17px;
    padding: 5px 3px;
    border-bottom: 1px solid gray;


	}
	.desc{
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: 33px;

    font-size: 20px;
    color: #fff;
    font-weight: 400;
    background-color: #043571;
	}
	.card_text{
		color: #000;
		line-height: 22px;
		font-weight: 400;
		padding: 0 21px;
		text-align: left !important;
		font-family: inherit;
		

	}
	.card_text:first-letter {
		color: #f97d09;
		font-size: 20px;
	/*	border-bottom: 1px solid;*/
		/*border-bottom-width: 300px;*/


	}

	/*.card_text:before{
		 content: ' \21D4';
		 position: relative;
		 left: 20px
	}*/

	.btn .card_btn .view_button{
		color: orange;
		font-size: 15px;
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
				<?php if($count > 9){?>
				<!-- <button class="ajax-load btn btn-primary mr-3 my-5 d-block" type="button">Load More</button> -->
			<?php }?>









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