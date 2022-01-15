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
    padding: 10px;
   /* background-color: #4963A5 !important;*/
   background-color: #fff;

    word-wrap: break-word;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 1.25rem;
    box-shadow: none;
    height: 200px;
    width: auto;
    box-shadow: 0 1px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%)
}
.card a{
	height: 100%;
}
.card  img{
	width: 100%;
	height: 100%;
	border-radius: 7px;
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

	@media (max-width: 768px){
		.card{

		}
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
				<div class="appointment-tab">

									<?php 
										$user = Auth::guard('appusers')->user();
										$lists = App\UserPrescription::where('user_id',$user->id)->get();
											 
										foreach($lists as $list)
										{						
											$type = $list->type;
											if($type == 'jpg' || $type == 'png' || $type == 'jpeg')
											{
									?>
                            <div class="col-md-3 col-sm-6 col-xs-6  mb-3">
                                <div class="card">
                                	<a href="{{asset('storage/app/public/prescription/'.$list->prescription_docs)}}">

                                		<img src="{{asset('public/assets/images/img-file.jpg')}}" alt="file">
                                		
                                	</a>
                                </div>

                            </div>
                         <?php }else if($type == 'xls' || $type == 'xlsx') { ?>
                             <div class="col-md-3 col-sm-6 col-xs-6  mb-3">
                                <div class="card">
                                	<a href="{{asset('storage/app/public/prescription/'.$list->prescription_docs)}}">
                                		<img src="{{asset('public/assets/images/xls.png')}}" alt="file">
                                	</a>                           

                                </div>

                            </div>
                           <?php }else if($type == 'pdf') { ?>

                             <div class="col-md-3 col-sm-6 col-xs-6  mb-3">
                                <div class="card">
                                	<a href="{{asset('storage/app/public/prescription/'.$list->prescription_docs)}}">
                                		<img src="{{asset('public/assets/images/pdf.jpg')}}" alt="file">
                                	</a>

                                </div>

                            </div>

                           <?php	}  } ?>	 
                              

                        </div>
				<div class="main">
					<ul class="cards" id="post-data">
					</ul>
				</div>	

				

		</div>
	</div>
</section>

@include('front.common.footer')