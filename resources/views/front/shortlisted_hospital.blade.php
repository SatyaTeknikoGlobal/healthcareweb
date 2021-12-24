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
}
.card_title{
	font-size: 22px;
	font-weight: 500;
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
	padding: 20px 9px
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
					<ul class="cards">
						<li class="cards_item">
							<div class="card p-0">
								
								<div class="card_image">
									<div class="edit"><a href="#">
										<i class="fa fa-heart fa-lg my-3"></i>
									</a></div>
									<img src="https://picsum.photos/500/300/?image=10">
									
								</div>
								<div class="card_content">
									<h2 class="card_title mb-3">AIIMs Hospital</h2>
									<p class="card_text mb-3"><i class="fa fa-map-marker"></i> Noida,UP 201301</p>
									<a class="btn card_btn">Details</a>
								</div>
							</div>
						</li>

						<li class="cards_item">
							<div class="card p-0">
								
								<div class="card_image">
									<div class="edit"><a href="#">
										<i class="fa fa-heart fa-lg my-3"></i>
									</a></div>
									<img src="https://picsum.photos/500/300/?image=10">
									
								</div>
								<div class="card_content">
									<h2 class="card_title mb-3">AIIMs Hospital</h2>
									<p class="card_text mb-3"><i class="fa fa-map-marker"></i> Noida,UP 201301</p>
									<a class="btn card_btn">Details</a>
								</div>
							</div>
						</li>

						<li class="cards_item">
							<div class="card p-0">
								
								<div class="card_image">
									<div class="edit"><a href="#">
										<i class="fa fa-heart fa-lg my-3"></i>
									</a></div>
									<img src="https://picsum.photos/500/300/?image=10">
									
								</div>
								<div class="card_content">
									<h2 class="card_title mb-3">AIIMs Hospital</h2>
									<p class="card_text mb-3"><i class="fa fa-map-marker"></i> Noida,UP 201301</p>
									<a class="btn card_btn">Details</a>
								</div>
							</div>
						</li>

						<li class="cards_item">
							<div class="card p-0">
								
								<div class="card_image">
									<div class="edit"><a href="#">
										<i class="fa fa-heart fa-lg my-3"></i>
									</a></div>
									<img src="https://picsum.photos/500/300/?image=10">
									
								</div>
								<div class="card_content">
									<h2 class="card_title mb-3">AIIMs Hospital</h2>
									<p class="card_text mb-3"><i class="fa fa-map-marker"></i> Noida,UP 201301</p>
									<a class="btn card_btn">Details</a>
								</div>
							</div>
						</li>

						<li class="cards_item">
							<div class="card p-0">
								
								<div class="card_image">
									<div class="edit"><a href="#">
										<i class="fa fa-heart fa-lg my-3"></i>
									</a></div>
									<img src="https://picsum.photos/500/300/?image=10">
									
								</div>
								<div class="card_content">
									<h2 class="card_title mb-3">AIIMs Hospital</h2>
									<p class="card_text mb-3"><i class="fa fa-map-marker"></i> Noida,UP 201301</p>
									<a class="btn card_btn">Details</a>
								</div>
							</div>
						</li>

						<li class="cards_item">
							<div class="card p-0">
								
								<div class="card_image">
									<div class="edit"><a href="#">
										<i class="fa fa-heart fa-lg my-3"></i>
									</a></div>
									<img src="https://picsum.photos/500/300/?image=10">
									
								</div>
								<div class="card_content">
									<h2 class="card_title mb-3">AIIMs Hospital</h2>
									<p class="card_text mb-3"><i class="fa fa-map-marker"></i> Noida,UP 201301</p>
									<a class="btn card_btn">Details</a>
								</div>
							</div>
						</li>
						
						
					</ul>
				</div>

				<button class="btn btn-primary mr-3 my-5" type="button">Load More</button>
			</div>




		</div>
	</div>
</section>




@include('front.common.footer')
