@include('front.common.header')
<style type="text/css">
	img {
		height: auto;
		max-width: 100%;
		vertical-align: middle;
	}
	.edit {
		padding-top: 15px;	
		padding-right: 17px;
		position: absolute;
		right: 0px !important;
		top: 0;
	}

	.edit a {
		color: #000;
	}
	.fa-lg {
		font-size:18px;
		line-height: 0.75em;
		vertical-align: -0.0667em;
		color: #f97d09;
	}
	.card div:first-child img{
		border-radius: 0px !important;
	}
	.card{
		border-radius: 7px;
		background-color: #858FBB !important;
	}
	.card_title{
		font-size: 22px;
		font-weight: 500;

		text-transform: initial;
		    font-family: inherit;
	}
	.card_text i{
		margin-right: 15px;
		color: #f97d09 !important;
	}
	.card_btn{
		font-size: 16px;
		font-weight: 600;
		color:#fff;
		border: 1px solid #043571 ;
		border-radius: 7px;
		width: 100%;
		background:#043571;
	}
	.card_btn:hover{
		color: #f97d09;
		background:lavender;
	}

	.card_content{
		background: #858FBB !important;
		text-align: left;
		padding: 20px 9px;
		box-shadow: 0 6px 12px -4px rgb(11 18 25 / 10%);
	}
</style>
<div id="page_title">
	<div class="container text-center">
		<div class="panel-heading">Shortlisted Hospital</div>
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">Shortlisted Hospital</li>
		</ol>
	</div>
</div>
<section class="profile-sec">
	<div class="container">
		<div class="row">

			@include('front.common.sidebar')
			<div class="col-md-9 col-sm-12 col-xs-12 text-center">
				<div class="main">
					<ul class="cards" id="short_hos">				

					</ul>
				</div>
				<?php if($list > 9){?>
				<button class="btn btn-primary mr-3 my-5" type="button" id="load_more" onclick="load_page()">Load More</button>

				<?php }?>
				<input type="hidden" name="page" id="page" value="1">

			</div>
		</div>
	</div>
</section>

@include('front.common.footer')

<script>

	$(document).ready(function() {	
		get_hos_data(1);
	});

	function load_page()
	{
		var page = $('#page').val();
		page++;	
		$('#page').val(page);
		get_hos_data(page);	
	}


	function get_hos_data(page)
	{
		var _token = '{{ csrf_token() }}';
		$.ajax({
			url: "{{ route('home.get_shortlist_hos') }}",
			type: "get",
			data: {page:page},
			dataType:"HTML",
			headers:{'X-CSRF-TOKEN': _token},
			cache: false,
			success: function(resp){ 
				$('#short_hos').append(resp);
			}
		});
	}


	
</script>
