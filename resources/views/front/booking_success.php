@include('front.common.header')

<section>
	<div class="container">
		<div class="row">
			<div class="ml-auto mr-auto my-5" style="width: auto;">
				<img src="<?=base_url('assets/images/checkmark.gif')?>" style="width: 200px">
				<p _ngcontent-hit-c6="" class="empty-txt">Registration Successful
				</p>

                <a href="<?=base_url('/')?>" class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                    Go to Home </a>
			</div>
			
		</div>
	</div>
</section>


@include('front.common.footer')