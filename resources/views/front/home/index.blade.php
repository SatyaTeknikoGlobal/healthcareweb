@include('front.common.header')


<style>
div[class^='banner-b']{
	display: block !important;
}

 .slider {
	 position: relative;
	 height: 450px;
}
.slider--el {
	 z-index: 1;
	 position: absolute;
	 top: 0;
	 left: 0;
	 width: 100%;
	 height: 100%;
	 transition: transform 2.8s, z-index 0.1s;
	 overflow: hidden;
}
 .slider--el.active {
	 z-index: 10;
}
 .slider--el.active .slider--el-bg {
	 transform: scale(0.834);
}
 .slider--el.active .slider--el-content {
	 opacity: 1;
}
.slider--el.active .slider--el-content h1,
.slider--el.active .slider--el-content p

{
	color: #fff;
}


 .slider--el.next {
	 z-index: 5;
}
 .slider--el.next .slider--el-bg {
	 transform: scale(0.834);
}
 .slider--el.anim-5parts .part {
	 position: absolute;
	 top: 0;
	 width: 20.1%;
	 height: 100%;
	 overflow: hidden;
	 will-change: transform;
}
 .slider--el.anim-5parts .part:before {
	 content: "";
	 display: block;
	 position: absolute;
	 background-size: cover;
	 top: 0;
	 width: 500%;
	 height: 100%;
	 background-image: url('public/assets/images/hospital-library.jpg');
}
 .slider--el.anim-5parts .part.part-1 {
	 transition: transform 1.1s 0.3s;
	 left: 0%;
}
 .slider--el.anim-5parts .part.part-1:before {
	 left: 0%;
}
 .slider--el.anim-5parts .part.part-2 {
	 transition: transform 1.1s 0.5s;
	 left: 20%;
}
 .slider--el.anim-5parts .part.part-2:before {
	 left: -100%;
}
 .slider--el.anim-5parts .part.part-3 {
	 transition: transform 1.1s 0.7s;
	 left: 40%;
}
 .slider--el.anim-5parts .part.part-3:before {
	 left: -200%;
}
 .slider--el.anim-5parts .part.part-4 {
	 transition: transform 1.1s 0.5s;
	 left: 60%;
}
 .slider--el.anim-5parts .part.part-4:before {
	 left: -300%;
}
 .slider--el.anim-5parts .part.part-5 {
	 transition: transform 1.1s 0.3s;
	 left: 80%;
}
 .slider--el.anim-5parts .part.part-5:before {
	 left: -400%;
}
 .slider--el.anim-5parts.removed .part {
	 transform: translateY(100%);
}
 .slider--el.anim-9parts .slider--el-bg {
	 perspective: 2000;
}
 .slider--el.anim-9parts .part {
	 position: absolute;
	 width: 33.5%;
	 height: 33.5%;
	 overflow: hidden;
	 will-change: transform;
	 transform-origin: 0% 100%;
}
 .slider--el.anim-9parts .part:before {
	 content: "";
	 display: block;
	 position: absolute;
	 background-size: cover;
	 width: 300%;
	 height: 300%;
	 background-image: url('public/assets/images/background2.jpg');
}
 .slider--el.anim-9parts .part.left-top {
	 top: 0%;
	 left: 0%;
	 transition: transform 0.9s 0.5s cubic-bezier(0.58, -0.7, 0.59, 0.95), opacity 0.6s 0.9s;
}
 .slider--el.anim-9parts .part.left-top:before {
	 top: 0%;
	 left: 0%;
}
 .slider--el.anim-9parts .part.mid-top {
	 top: 0%;
	 left: 33.3333333333%;
	 transition: transform 0.9s 0.4s cubic-bezier(0.58, -0.7, 0.59, 0.95), opacity 0.6s 0.8s;
}
 .slider--el.anim-9parts .part.mid-top:before {
	 top: 0%;
	 left: -100%;
}
 .slider--el.anim-9parts .part.right-top {
	 top: 0%;
	 left: 66.6666666667%;
	 transition: transform 0.9s 0.5s cubic-bezier(0.58, -0.7, 0.59, 0.95), opacity 0.6s 0.9s;
}
 .slider--el.anim-9parts .part.right-top:before {
	 top: 0%;
	 left: -200%;
}
 .slider--el.anim-9parts .part.left-mid {
	 top: 33.3333333333%;
	 left: 0%;
	 transition: transform 0.9s 0.6s cubic-bezier(0.58, -0.7, 0.59, 0.95), opacity 0.6s 1s;
}
 .slider--el.anim-9parts .part.left-mid:before {
	 top: -100%;
	 left: 0%;
}
 .slider--el.anim-9parts .part.mid-mid {
	 top: 33.3333333333%;
	 left: 33.3333333333%;
	 transition: transform 0.9s 0.3s cubic-bezier(0.58, -0.7, 0.59, 0.95), opacity 0.6s 0.7s;
}
 .slider--el.anim-9parts .part.mid-mid:before {
	 top: -100%;
	 left: -100%;
}
 .slider--el.anim-9parts .part.right-mid {
	 top: 33.3333333333%;
	 left: 66.6666666667%;
	 transition: transform 0.9s 0.6s cubic-bezier(0.58, -0.7, 0.59, 0.95), opacity 0.6s 1s;
}
 .slider--el.anim-9parts .part.right-mid:before {
	 top: -100%;
	 left: -200%;
}
 .slider--el.anim-9parts .part.left-bot {
	 top: 66.6666666667%;
	 left: 0%;
	 transition: transform 0.9s 0.7s cubic-bezier(0.58, -0.7, 0.59, 0.95), opacity 0.6s 1.1s;
}
 .slider--el.anim-9parts .part.left-bot:before {
	 top: -200%;
	 left: 0%;
}
 .slider--el.anim-9parts .part.mid-bot {
	 top: 66.6666666667%;
	 left: 33.3333333333%;
	 transition: transform 0.9s 0.8s cubic-bezier(0.58, -0.7, 0.59, 0.95), opacity 0.6s 1.2s;
}
 .slider--el.anim-9parts .part.mid-bot:before {
	 top: -200%;
	 left: -100%;
}
 .slider--el.anim-9parts .part.right-bot {
	 top: 66.6666666667%;
	 left: 66.6666666667%;
	 transition: transform 0.9s 0.7s cubic-bezier(0.58, -0.7, 0.59, 0.95), opacity 0.6s 1.1s;
}
 .slider--el.anim-9parts .part.right-bot:before {
	 top: -200%;
	 left: -200%;
}
 .slider--el.anim-9parts.removed .part {
	 transform: rotateX(90deg);
	 opacity: 0;
}
 .slider--el.anim-3parts .part {
	 position: absolute;
	 top: 0;
	 width: 33.5%;
	 height: 100%;
	 overflow: hidden;
	 transition: transform 1.5s 0.3s;
	 will-change: transform;
}
 .slider--el.anim-3parts .part:before {
	 content: "";
	 display: block;
	 position: absolute;
	 background-size: cover;
	 width: 300%;
	 height: 100%;
	 background-image: url('public/assets/images/bg1.png');
}
 .slider--el.anim-3parts .part.left {
	 left: 0;
}
 .slider--el.anim-3parts .part.left:before {
	 left: 0;
}
 .slider--el.anim-3parts .part.mid {
	 left: 33.3333333333%;
}
 .slider--el.anim-3parts .part.mid:before {
	 left: -100%;
}
 .slider--el.anim-3parts .part.right {
	 left: 66.6666666667%;
}
 .slider--el.anim-3parts .part.right:before {
	 left: -200%;
}
 .slider--el.anim-3parts.removed .left {
	 transform: translate3D(-100%, -33.333%, 0);
}
 .slider--el.anim-3parts.removed .mid {
	 transform: translate3D(0, 100%, 0);
}
 .slider--el.anim-3parts.removed .right {
	 transform: translate3D(100%, -33.333%, 0);
}
 .slider--el.anim-4parts .part {
	 position: absolute;
	 width: 50.2%;
	 height: 50.2%;
	 overflow: hidden;
	 will-change: transform;
}
 .slider--el.anim-4parts .part:before {
	 content: "";
	 display: block;
	 position: absolute;
	 background-size: cover;
	 width: 200%;
	 height: 200%;
	 background-image: url('public/assets/images/bg2.jpg');
}
 .slider--el.anim-4parts .part.top {
	 top: 0;
	 transition: transform 1.3s 0.3s;
}
 .slider--el.anim-4parts .part.top:before {
	 top: 0;
}
 .slider--el.anim-4parts .part.bot {
	 top: 50%;
	 transition: transform 1.3s 0.5s;
}
 .slider--el.anim-4parts .part.bot:before {
	 top: -100%;
}
 .slider--el.anim-4parts .part.left {
	 left: 0;
}
 .slider--el.anim-4parts .part.left:before {
	 left: 0;
}
 .slider--el.anim-4parts .part.right {
	 left: 50%;
}
 .slider--el.anim-4parts .part.right:before {
	 left: -100%;
}
 .slider--el.anim-4parts.removed .left {
	 transform: translateX(-100%);
}
 .slider--el.anim-4parts.removed .right {
	 transform: translateX(100%);
}
 .slider--el-bg {
	 position: absolute;
	 top: -10%;
	 left: -10%;
	 width: 120%;
	 height: 120%;
	 background-size: cover;
	 transition: transform 1s 1s;
	 will-change: transform;
}
 .slider--el-bg .part:after {
	 content: "";
	 position: absolute;
	 top: 0;
	 left: 0;
	 width: 100%;
	 height: 100%;
	 background: rgba(0, 0, 0, 0.15);
}
 .slider--el-content {
	 position: absolute;
	 top: 50%;
	 left: 0;
	 width: 100%;
	 height: 100%;
	 padding: 0 20rem;
	 transition: opacity 0.3s;
	 opacity: 0;
}
 .slider--el-heading {
	 font-size: 9rem;
	 font-family: Tesla;
	 text-transform: uppercase;
	 color: #fff;
}
 .slider--el.removed .slider--el-content {
	 opacity: 0;
}
 
 .swiper-nav-wrapper .swiper-button-next, .swiper-nav-wrapper .swiper-button-prev {
    font-size: 0;
    line-height: 0;
    /* position: absolute; */
    top: 50%;
    display: block;
    width: 40px
px
;
    height: 40px;
    padding: 0;
    -webkit-transform: translate(0, -50%);
    -ms-transform: translate(0, -50%);
    transform: translate(0, -50%);
    box-shadow: 1px 6px 14px rgb(0 0 0 / 20%);
    background: #fff;
    border-radius: 100%;
    cursor: pointer;
    border: none;
    outline: none;
    background: rgb(94, 85, 85);
}
</style>


<!--     <div class="swiper">
   
      <div class="swiper-wrapper">
       
        <div class="swiper-slide">
          <div class="swiper-image"
            style="background: url('public/assets/images/banner.png') no-repeat right bottom; background-size:cover;"></div>
          <div class="overlay"></div>
          <div class="content-wrapper">
            <div class="content">
              <h1>World class medical facilities!</h1>
              <p>At your doorstep in Noida Extension. Our team with high mobility bring your the best response in the
                time of crisis. Because Family, comes first.</p>
              <a href="" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="swiper-image"
            style="background: url('public/assets/images/bg1.png') no-repeat center center; background-size:cover;"></div>
          <div class="overlay"></div>
          <div class="content-wrapper content-right">
            <div class="content">
              <h1>Multiple in house services</h1>
              <p>
                Provinding surmountable in house and treating with multiple outsourced services</p>
              <a href="" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="swiper-image"
            style="background: url('public/assets/images/background2.jpg') no-repeat right center; background-size:cover;"></div>
          <div class="overlay"></div>
          <div class="content-wrapper">
            <div class="content">
              <h1> Diagnostic Laboratories</h1>
              <p>

                Computerized laboratory supporting early & accurate medical and surgical diagnosis
              </p>
              <a href="" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
      </div>

   
      <div class="swiper-pagination"></div>
  
      <div class="swiper-nav-wrapper">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
 -->

	
<div class="slider">
  <div class="slider--el slider--el-1 anim-4parts active">
    <div class="slider--el-bg">
      <div class="part top left"></div>
      <div class="part top right"></div>
      <div class="part bot left"></div>
      <div class="part bot right"></div>
    </div>
    <div class="slider--el-content">
     <h1> Diagnostic Laboratories</h1>
              <p>

                Computerized laboratory supporting early & accurate medical and surgical diagnosis
              </p>
              <a href="" class="btn btn-primary">Learn More</a>
    </div>
  </div>
  <div class="slider--el slider--el-2 anim-9parts">
    <div class="slider--el-bg">
      <div class="part left-top"></div>
      <div class="part mid-top"></div>
      <div class="part right-top"></div>
      <div class="part left-mid"></div>
      <div class="part mid-mid"></div>
      <div class="part right-mid"></div>
      <div class="part left-bot"></div>
      <div class="part mid-bot"></div>
      <div class="part right-bot"></div>
    </div>
    <div class="slider--el-content">
     <h1>World class medical facilities!</h1>
              <p>At your doorstep in Noida Extension. Our team with high mobility bring your the best response in the
                time of crisis. Because Family, comes first.</p>
              <a href="" class="btn btn-primary">Learn More</a>
    </div>
  </div>
  <div class="slider--el slider--el-3 anim-5parts">
    <div class="slider--el-bg">
      <div class="part part-1"></div>
      <div class="part part-2"></div>
      <div class="part part-3"></div>
      <div class="part part-4"></div>
      <div class="part part-5"></div>
    </div>
    <div class="slider--el-content">
       <h1>Multiple in house services</h1>
              <p>
                Provinding surmountable in house and treating with multiple outsourced services</p>
              <a href="" class="btn btn-primary">Learn More</a>
    </div>
  </div>
  <div class="slider--el slider--el-4 anim-3parts">
    <div class="slider--el-bg">
      <div class="part left"></div>
      <div class="part mid"></div>
      <div class="part right"></div>
    </div>
    <div class="slider--el-content">
     <h1>Multiple in house services</h1>
              <p>
                Provinding surmountable in house and treating with multiple outsourced services</p>
              <a href="" class="btn btn-primary">Learn More</a>
    </div>
  </div>
 <div class="swiper-nav-wrapper">
        <div class="swiper-button-prev left  slider--control" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-6d0dfeb88b7ed54c"></div>
        <div class="swiper-button-next right slider--control" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-6d0dfeb88b7ed54c"></div>
      </div>


</div>


    <div class="banner-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card bg-blue-lighten" data-aos="fade-right" data-aos-duration="1000">
             

              <div class="care-text">
                  <h2>350 Doctors</h2>
               

                <p>
                   We are focused yet fast, personal yet practical, advanced yet seamless in delivering the exact care our patients need.
                </p>
              </div>
              <div class="py-3"><img src="{{asset('public/assets/images/service/s1.png')}}" alt="Specialty"></div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card bg-blue-lighten" data-aos="fade-right" data-aos-duration="1500">
            

              <div class="care-text">
                  <h2> Medicine</h2>
               
                <p>
                  We ask more of ourselves and are always passionate about achieving the highest standards of medical expertise and patient care. 
                </p>
              </div>
              <div class="py-3"><img src="{{asset('public/assets/images/service/s2.png')}}" alt="Specialty"></div>
            </div>
          </div>
          <div class="col-md-4 mb-3" > 
            <div class="card bg-blue-lighten" data-aos="fade-right" data-aos-duration="2000">
             
              <div class="care-text">
                 <h2>24 hrs Helpline</h2>
               
                <p>
                  We always deliver on our commitment and ensure the highest level of patient care is met at every stage, every time. 
                </p>
              </div>
              <div class="py-3"><img src="{{asset('public/assets/images/service/s3.png')}}" alt="Specialty"></div>


            </div>
          </div>
        </div>
      </div>
    </div>



    <section id="howitw5ork our-service">
      <div class="container text-center">
        <h1 class="panel-heading"> Our Specialties</h1>
        <div class="row ">
          <div class="col-md-4 col-xs-offset-0 step-one">
            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/academics.jpg')}}" alt="academics" class="img-fluid"></div>
                  <div class="desc">
                    <h3>Academics</h3>
                    <p class="text-justify">

                      It flourished under his guidance to a full-fledged Department of Academics. He is now the Advisor
                      of
                      the department. The department has been entrusted with the following tasks.
                    </p>
                  </div>
                </div>
              </div>
              <div class="orange-widget"><a href="#" class="btn btn-primary" data-aos="fade-in" data-aos-duration="1000">Read More</a></div>
            </div>
          </div>


          <div class="col-md-4 step-two">

            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/ACUPUNCTURE.jpg')}}" alt="ACUPUNCTURE" class="img-fluid"></div>
                  <div class="desc">
                    <h3>Acupuncture</h3>
                    <p class="text-justify">The Department of Acupuncture is the oldest. It was started about 20 years
                      ago and it has been
                      actively involved in treating patients both privately as well as at the Free O.P.D. level.</p>

                  </div>
                </div>
              </div>
              <div class="orange-widget"><a href="#" class="btn btn-primary" data-aos="fade-in" data-aos-duration="1000">Read More</a></div>
            </div>
          </div>


          <div class="col-md-4">

            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/alternative.jpg')}}" alt="ALTERNATIVE MEDICINE" class="img-fluid"></div>
                  <div class="desc">
                    <h3>Alternative Medicine</h3>
                    <p class="text-justify">
                      In the continuous endeavour to provide excellent & complete services for Total Health &
                      Wellness-Plus (Sampurna Swastha) by way of various Holistic Healing Alternatives & therapies, for
                      the rich & poor alike!
                    </p>
                  </div>
                </div>
              </div>
              <div class="orange-widget"><a href="#" class="btn btn-primary" data-aos="fade-in" data-aos-duration="1000">Read More</a></div>
            </div>

          </div>

        </div>
        <!-- 
        <a href="#" class="btn btn-primary">View All</a> -->
      </div>
    </section>





    <section id="howitw5ork" class="our-service">
      <div class="container text-center">
        <h1 class="panel-heading" style="color:#ffff">OUR SERVICES</h1>
        <div class="row our-service56">
          <div class="col-md-4 col-xs-offset-0 step-one">
            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/our-service2.jpg')}}" alt="our-service" class="img-f"></div>
                  <h3>Health Check Up Programs</h3>
                  <p>
                    Catch the Disease before it Catches you
                  </p>
                  <p>

                    One Stop for all your Investigations
                  </p>

                </div>
              </div>
              <div class="orange-widget"><a href="#" class="btn btn-primary"  data-aos="fade-in" data-aos-duration="1000">Read More</a></div>

            </div>
          </div>


          <div class="col-md-4 col-xs-offset-0 step-one">
            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/our-service3.jpg')}}" alt="our-service" class="img-f"></div>
                  <h3>Publications</h3>
                  <p>
                    The hospital has been publishing the quarterly newsletter since July 1996...
                  </p>
                </div>
              </div>
              <div class="orange-widget"><a href="#" class="btn btn-primary"  data-aos="fade-in" data-aos-duration="1000">Read More</a></div>

            </div>
          </div>

          <div class="col-md-4 col-xs-offset-0 step-one">
            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/our-service5.jpg')}}" alt="our-service" class="img-f"></div>
                  <h3>Financial Services</h3>
                  <p>
                    Loan Provision
                  </p>
                  <p>


                    TPA Facility
                  </p>

                </div>
              </div>
              <div class="orange-widget"><a href="#" class="btn btn-primary"  data-aos="fade-in" data-aos-duration="1000">Read More</a></div>


            </div>
          </div>

        </div>


      </div>
    </section>
    <section id="howitw5ork">
      <div class="container text-center">
        <h1 class="panel-heading">Specialty Clinic</h1>
        <div class="row">
          <div class="col-md-4 col-xs-offset-0 step-one">
            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/Adolescent-Clinic-inner.jpg')}}" alt="Adolescent" class="img-fluid "></div>
                  <div class="p-5">
                    <h3>Adolescent Clinic</h3>
                    <p class="text-justify">
                      Yoga is not merely a few postures (Asanas) but a complete way of life. It is an integrated system of self culture which aims at harmonious development of body.</p>
                  </div>
                </div>
              </div>
              <div class="orange-widget" aos-animate" data-aos="fade-in" data-aos-duration="1000"><a href="#" class="btn btn-primary"  data-aos="fade-in" data-aos-duration="1000">Read More</a></div>
            </div>
          </div>


          <div class="col-md-4 step-two">

            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/yoga.jpg')}}" alt="yoga" class="img-fluid "></div>
                  <div class="p-5">
                    <h3>Yoga Life Style</h3>
                    <p class="text-justify">Yoga is not merely a few postures (Asanas) but a complete way of life. It is
                      an integrated
                      system of self culture which aims at harmonious development of body.</p>
                  </div>
                </div>
              </div>
              <div class="orange-widget" aos-animate" data-aos="fade-in" data-aos-duration="1000"><a href="#" class="btn btn-primary"  data-aos="fade-in" data-aos-duration="1000">Read More</a></div>
            </div>
          </div>


          <div class="col-md-4">

            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/Adolescent-Clinic-inner.jpg')}}" alt="ALLERGY" class="img-fluid "></div>
                  <div class="p-5">
                    <h3>Allergy Clinic</h3>
                    <p class="text-justify">Yoga is not merely a few postures (Asanas) but a complete way of life. It is an integrated system of self culture which aims at harmonious development of body.</p>
                  </div>
                </div>
              </div>
              <div class="orange-widget" aos-animate" data-aos="fade-in" data-aos-duration="1000"><a href="#" class="btn btn-primary"  data-aos="fade-in" data-aos-duration="1000">Read More</a></div>
            </div>

          </div>

        </div>

     <!--    <a href="#" class="btn btn-primary">View All</a> -->
      </div>
    </section>
    <section class="our-team our-team2">
            <div class="">
                <div>
                    <!-- <p class="title-top">Qualified Professionals</p> -->
                    <h2 class="panel-heading text-center">Our Team</h2>
                </div>
              </div>
                <div class="container">
                <div class="row mt-4">
                    <div class="col-sm-6 col-md-3 mb-5">
                        <div class="card45">


                          <img src="{{asset('public/assets/images/doctor.jpg')}}" alt="Our Team" class="img-fluid">


                            <div class="card-body">
                                <h5 class="card-title"> Dr. Harit Chaturvedi</h5>
                              
                                <p class="card-text">




                                    Cancer Care / Oncology, Thoracic Oncology, Surgical Oncology
                                </p>
                                  <h6>Chairman</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 mb-5">
                        <div class="card45"><img src="{{asset('public/assets/images/doctor.jpg')}}" alt="Our Team" class="img-fluid">
                            <div class="card-body">
                                <h5 class="card-title"> Prof (Dr.) Subhash Gupta</h5>
                              
                                <p class="card-text">

                                    Liver Transplant and Biliary Sciences
                                </p>
                                  <h6>Chairman</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 mb-5">
                        <div class="card45"><img src="{{asset('public/assets/images/doctor.jpg')}}" alt="Our Team" class="img-fluid">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Dr. Sandeep Budhiraja
                                </h5>
                                
                                <p class="card-text">


                                    Internal Medicine
                                </p>
                                <h6>Group Medical Director</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 mb-5">
                        <div class="card45"><img src="{{asset('public/assets/images/doctor.jpg')}}" alt="Our Team" class="img-fluid">
                            <div class="card-body">
                                <h5 class="card-title">Dr. Ambrish Mithal</h5>
                               
                                <p class="card-text">



                                    Endocrinology & Diabetes
                                </p>
                                 <h6>Chairman & Head</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="text-center mt-5"><a href="#" class="btn btn-primary">Read More</a></div> -->

                <div class="call-to-action-shape-01">
                 <svg id="svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0, 0, 400,370.35681610247025">
                    <g id="svgg">
                        <path class="shape-path" id="path0" d="M249.954 0.635 C 240.575 3.389,233.929 9.074,230.209 17.528 C 221.671 36.930,201.468 54.980,166.331 74.599 C 150.321 83.539,133.886 91.550,97.896 107.960 C 60.753 124.895,46.948 131.724,33.211 139.957 C 2.314 158.477,-5.531 173.697,7.558 189.731 C 8.181 190.495,11.285 193.759,14.456 196.984 C 38.336 221.280,50.229 238.507,53.680 253.797 C 54.907 259.234,55.006 266.165,53.979 274.748 C 51.984 291.423,54.149 301.599,62.854 316.468 C 72.588 333.095,83.951 343.673,97.896 349.088 C 107.191 352.698,115.551 354.028,136.688 355.260 C 160.933 356.672,172.530 358.640,186.647 363.738 C 199.456 368.363,216.007 367.283,240.657 360.214 C 277.351 349.690,331.341 324.707,386.917 292.536 C 397.502 286.408,398.745 285.641,398.645 285.304 C 398.595 285.134,396.907 276.638,394.895 266.423 C 371.016 145.183,358.578 74.176,357.552 53.239 C 357.423 50.608,357.277 49.322,356.993 48.307 C 352.156 31.013,314.465 7.243,281.287 0.562 L 278.494 0.000 265.276 0.009 L 252.059 0.017 249.954 0.635 " stroke="none" fill-rule="evenodd"></path>
                    </g>
                </svg>
            </div>
            </div>
    </section>

        <section id="testimonails" class="my-5">
            <div class="container text-center">
                <h1 class="panel-heading text-white">Testimonial</h1>
                <div class="row">
                    <div class="col-md-12" style="overflow: hidden;">


                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner my-5">
                                <div class="carousel-item active testi">
                                    <div class="item">
                                        <div class="testi-user"><img src="{{asset('public/assets/images/user.png')}}" alt="Testimonial"></div>
                                        <div class="card"><i class="fas fa-quote-left"></i>
                                            <p>

                                                Providing best healthcare facility. Doctors are best. All the staff are
                                                polite. Nurses are
                                                working so hard. God Bless them. The doctors who have taken my case had
                                                delivered it very
                                                efficiently. I have got my well care here. Thanks for giving me a new
                                                life. Thanks to all the
                                                doctors, sisters and staff who have cooperated well in those ten days.



                                            </p>
                                            <h6> <i class="fa fa-quote-left"></i> SANDEEP YADAV</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item testi">
                                    <div class="item">
                                        <div class="testi-user"><img src="{{asset('public/assets/images/user.png')}}" alt="Testimonial"></div>
                                        <div class="card"><i class="fas fa-quote-left"></i>
                                            <p>
                                                It was a painful journey of life Six months before but after coming all
                                                my problems were cured
                                                and I got full complete satisfactory treatment and within 10 days I am
                                                living my life as before.
                                                The doctors who have taken my case had delivered it very efficiently. I
                                                have got my well care
                                                here. Thanks for giving me a new life. Thanks to all the doctors,
                                                sisters and staff who have
                                                cooperated well in those ten days.</p>
                                            <h6> <i class="fa fa-quote-left"></i> Priyanka Khulbe </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item testi">
                                    <div class="item">
                                        <div class="testi-user"><img src="{{asset('public/assets/images/user.png')}}" alt="Testimonial"></div>
                                        <div class="card"><i class="fas fa-quote-left"></i>
                                            <p>

                                                The hospital management is very understanding and treats well. My father
                                                was admitted for COVID
                                                but despite being critical, he recovered. All thanks to Dr. Rana and his
                                                entire COVID team. The
                                                doctors who have taken my case had delivered it very efficiently. I have
                                                got my well care here.
                                                Thanks for giving me a new life. Thanks to all the doctors, sisters and
                                                staff who have
                                                cooperated well in those ten days.



                                            </p>

                                            <h6> <i class="fa fa-quote-left"></i> Manish Jain</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </section>


        <script>
        	$(document).ready(function() {
  
  var sliding = false,
      curSlide = 1,
      numOfSlides = $(".slider--el").length;
  
  $(document).on("click", ".slider--control", function() {
    if (sliding) return;
    sliding = true;
    $(".slider--el").show();
    $(".slider--el").css("top");
    $(".slider--el.active").addClass("removed");
    ($(this).hasClass("right")) ? curSlide++ : curSlide--;
    if (curSlide < 1) curSlide = numOfSlides;
    if (curSlide > numOfSlides) curSlide = 1;
    $(".slider--el-" + curSlide).addClass("next");
    
    setTimeout(function() {
      $(".slider--el.removed").hide();
      $(".slider--el").removeClass("active next removed");
      $(".slider--el-" + curSlide).addClass("active");
      sliding = false;
    }, 1000);
  });
  
});




//           window.onload=function(){
//   $('.slider').slider({
//   autoplay:true,

//     autoplaySpeed:1500,
//   arrows:true

//   });
// };

</script>




@include('front.common.footer')

