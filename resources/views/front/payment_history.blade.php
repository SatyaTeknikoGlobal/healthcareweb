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
   background-color: #fff;

    word-wrap: break-word;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 1.25rem;
    box-shadow: none;
}

.card_content{
	width: 100%;
	border-radius: 1.25rem;
	padding: 0px;
	background: transparent;
	box-shadow: inset 2px 0px 12px 2px rgb(0 0 0 / 8%) !important;

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

    font-size: 20px;
    color: #fff;
    font-weight: 400;
    background-color: #043571;
	}
	.card_text{
		color: #000;
		line-height: 12px;
		font-weight: 600;

	}
</style>
<div id="page_title">
	<div class="container text-center">
		<div class="panel-heading">Payment History</div>
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">Payment History</li>
		</ol>
	</div>
</div>
<section class="profile-sec">
	<div class="container">
		<div class="row">

			@include('front.common.sidebar')


			<div class="col-md-8 col-sm-12 col-xs-12 text-center">
				<div class="main">
					<ul class="m-0 p-0">
						<li class="cards_item col-md-4 col-sm-6 col-xs-12">
							<div class="card">
								<div class="card_content">
									<h2 class="card_title desc">#3333
									</h2>
									<p class="card_text">Rs. 200/-</p>
									<p class="card_text">10th Nov 2021</p>
									<p class="card_text">Paid At Aims Hospital</p>

									<button class="btn card_btn"><i class="fa fa-download"></i></button>

									
								</div>
							</div>
						</li>
						
						<li class="cards_item col-md-4 col-sm-6 col-xs-12">
							<div class="card">
								<div class="card_content">
									<h2 class="card_title desc">#33333</h2>
									<p class="card_text">Rs. 200/-</p>
									<p class="card_text">10th Nov 2021</p>
									<p class="card_text">Paid At Aims Hospital</p>

									<button class="btn card_btn"><i class="fa fa-download"></i></button>

									
								</div>
							</div>
						</li>

						<li class="cards_item col-md-4 col-sm-6 col-xs-12">
							<div class="card">
								<div class="card_content">
									<h2 class="card_title desc">#33333</h2>
									<p class="card_text">Rs. 200/-</p>
									<p class="card_text">10th Nov 2021</p>
									<p class="card_text">Paid At Aims Hospital</p>

									<button class="btn card_btn"><i class="fa fa-download"></i></button>

									
								</div>
							</div>
						</li>

						<li class="cards_item col-md-4 col-sm-6 col-xs-12">
							<div class="card">
								<div class="card_content">
									<h2 class="card_title desc">#33333</h2>
									<p class="card_text">Rs. 200/-</p>
									<p class="card_text">10th Nov 2021</p>
									<p class="card_text">Paid At Aims Hospital</p>

									<button class="btn card_btn"><i class="fa fa-download"></i></button>

									
								</div>
							</div>
						</li>


						<li class="cards_item col-md-4 col-sm-6 col-xs-12">
							<div class="card">
								<div class="card_content">
									<h2 class="card_title desc">#33333</h2>
									<p class="card_text">Rs. 200/-</p>
									<p class="card_text">10th Nov 2021</p>
									<p class="card_text">Paid At Aims Hospital</p>

									<button class="btn card_btn"><i class="fa fa-download"></i></button>

									
								</div>
							</div>
						</li>

						<li class="cards_item col-md-4 col-sm-6 col-xs-12">
							<div class="card">
								<div class="card_content">
									<h2 class="card_title desc">#33333</h2>
									<p class="card_text">Rs. 200/-</p>
									<p class="card_text">10th Nov 2021</p>
									<p class="card_text">Paid At Aims Hospital</p>

									<button class="btn card_btn"><i class="fa fa-download"></i></button>

									
								</div>
							</div>
						</li>

						<li class="cards_item col-md-4 col-sm-6 col-xs-12">
							<div class="card">
								<div class="card_content">
									<h2 class="card_title desc">#33333</h2>
									<p class="card_text">Rs. 200/-</p>
									<p class="card_text">10th Nov 2021</p>
									<p class="card_text">Paid At Aims Hospital</p>

									<button class="btn card_btn"><i class="fa fa-download"></i></button>

									
								</div>
							</div>
						</li>
						<li class="cards_item col-md-4 col-sm-6 col-xs-12">
							<div class="card">
								<div class="card_content">
									<h2 class="card_title desc">#33333</h2>
									<p class="card_text">Rs. 200/-</p>
									<p class="card_text">10th Nov 2021</p>
									<p class="card_text">Paid At Aims Hospital</p>

									<button class="btn card_btn"><i class="fa fa-download"></i></button>

									
								</div>
							</div>
						</li>
						<li class="cards_item col-md-4 col-sm-6 col-xs-12">
							<div class="card">
								<div class="card_content">
									<h2 class="card_title desc">#33333</h2>
									<p class="card_text">Rs. 200/-</p>
									<p class="card_text">10th Nov 2021</p>
									<p class="card_text">Paid At Aims Hospital</p>

									<button class="btn card_btn"><i class="fa fa-download"></i></button>

									
								</div>
							</div>
						</li>
						
					</ul>
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12 my-3">

				<button class="btn btn-primary mr-3 " type="button">Load More</button>
				</div>
			</div>




		</div>
	</div>
</section>




@include('front.common.footer')
