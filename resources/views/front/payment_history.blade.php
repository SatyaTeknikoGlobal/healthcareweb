@include('front.common.header')
<style type="text/css">
	.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 28px solid rgba(0,0,0,.125);
    border-radius: 1.25rem;
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


			<div class="col-md-8 col-sm-8 col-xs-12 text-center">
				<div class="main">
					<ul class="cards">
						<li class="cards_item">
							<div class="card">
								<div class="card_content">
									<h2 class="card_title">#33333</h2>
									<p class="card_text">Rs. 200/-</p>
									<p class="card_text">10th Nov 2021</p>
									<p class="card_text">Paid At Aims Hospital</p>

									<button class="btn card_btn"><i class="fa fa-download"></i></button>

									
								</div>
							</div>
						</li>
						
						<li class="cards_item">
							<div class="card">
								<div class="card_content">
									<h2 class="card_title">#33333</h2>
									<p class="card_text">Rs. 200/-</p>
									<p class="card_text">10th Nov 2021</p>
									<p class="card_text">Paid At Aims Hospital</p>

									<button class="btn card_btn"><i class="fa fa-download"></i></button>

									
								</div>
							</div>
						</li>

						<li class="cards_item">
							<div class="card">
								<div class="card_content">
									<h2 class="card_title">#33333</h2>
									<p class="card_text">Rs. 200/-</p>
									<p class="card_text">10th Nov 2021</p>
									<p class="card_text">Paid At Aims Hospital</p>

									<button class="btn card_btn"><i class="fa fa-download"></i></button>

									
								</div>
							</div>
						</li>

						<li class="cards_item">
							<div class="card">
								<div class="card_content">
									<h2 class="card_title">#33333</h2>
									<p class="card_text">Rs. 200/-</p>
									<p class="card_text">10th Nov 2021</p>
									<p class="card_text">Paid At Aims Hospital</p>

									<button class="btn card_btn"><i class="fa fa-download"></i></button>

									
								</div>
							</div>
						</li>


						<li class="cards_item">
							<div class="card">
								<div class="card_content">
									<h2 class="card_title">#33333</h2>
									<p class="card_text">Rs. 200/-</p>
									<p class="card_text">10th Nov 2021</p>
									<p class="card_text">Paid At Aims Hospital</p>

									<button class="btn card_btn"><i class="fa fa-download"></i></button>

									
								</div>
							</div>
						</li>

						<li class="cards_item">
							<div class="card">
								<div class="card_content">
									<h2 class="card_title">#33333</h2>
									<p class="card_text">Rs. 200/-</p>
									<p class="card_text">10th Nov 2021</p>
									<p class="card_text">Paid At Aims Hospital</p>

									<button class="btn card_btn"><i class="fa fa-download"></i></button>

									
								</div>
							</div>
						</li>

						<li class="cards_item">
							<div class="card">
								<div class="card_content">
									<h2 class="card_title">#33333</h2>
									<p class="card_text">Rs. 200/-</p>
									<p class="card_text">10th Nov 2021</p>
									<p class="card_text">Paid At Aims Hospital</p>

									<button class="btn card_btn"><i class="fa fa-download"></i></button>

									
								</div>
							</div>
						</li>
						
					</ul>
				</div>

				<button class="btn btn-primary mr-3 " type="button">Load More</button>
			</div>




		</div>
	</div>
</section>




@include('front.common.footer')
