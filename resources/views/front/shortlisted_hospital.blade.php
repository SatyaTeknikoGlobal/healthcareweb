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
	right: 0;
	top: 0;
}

.edit a {
	color: #000;
}
.fa-lg {
    font-size: 2.33333em;
    line-height: 0.75em;
    vertical-align: -0.0667em;
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
								
								<div class="card_image">
									<div class="edit"><a href="#"><i class="fa fa-heart fa-lg"></i></a></div>
									<img src="https://picsum.photos/500/300/?image=10">
									
								</div>
								<div class="card_content">
									<h2 class="card_title">AIIMs Hospital</h2>
									<p class="card_text"><i class="fa fa-map-marker"></i> Noida,UP 201301</p>
									<a class="btn card_btn">Details</a>
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
