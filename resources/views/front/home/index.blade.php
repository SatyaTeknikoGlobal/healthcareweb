@include('front.common.header')


    <div class="swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
          <div class="swiper-image"
            style="background: url('public/assets/images/bg1.png') no-repeat right bottom; background-size:cover;"></div>
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
            style="background: url('public/assets/images/bg1.png') no-repeat right center; background-size:cover;"></div>
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

      <!-- If we need pagination -->
      <div class="swiper-pagination"></div>
      <!-- If we need navigation buttons -->
      <div class="swiper-nav-wrapper">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>


    <div class="banner-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="care-text">
                <h2>350 Doctors</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              </div>
              <div><img src="{{asset('public/assets/images/service/s1.png')}}" alt="Pet Care"></div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="care-text">
                <h2> Medicine</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              </div>
              <div><img src="{{asset('public/assets/images/service/s2.png')}}" alt="Pet Care"></div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="care-text">
                <h2>24 hrs Helpline</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              </div>
              <div><img src="{{asset('public/assets/images/service/s3.png')}}" alt="Pet Care"></div>
            </div>
          </div>
        </div>
      </div>
    </div>





    <section id="howitw5ork our-service">
      <div class="container text-center">
        <h1 class="panel-heading">OUR SPECIALTIES</h1>
        <div class="row ">
          <div class="col-md-4 col-xs-offset-0 step-one">
            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/academics.jpg')}}" alt="academics" class="img-fluid"></div>
                  <div class="p-5">
                    <h3>Academics</h3>
                    <p class="text-justify">
                      <!-- 200character -->
                     The Department of Acupuncture is the oldest. It was started about 20 years ago and it has been actively involved in treating patients both privately as well as at the Free O.P.D. level.Free O.P.D. ..
                    </p>
                  </div>
                </div>
              </div>
              <div class="orange-widget"><a href="#" class="btn btn-primary">Read More</a></div>
            </div>
          </div>


          <div class="col-md-4 step-two">

            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/academics.jpg')}}" alt="academics" class="img-fluid"></div>
                  <div class="p-5">
                    <h3>Acupuncture</h3>
                    <p class="text-justify">The Department of Acupuncture is the oldest. It was started about 20 years ago and it has been actively involved in treating patients both privately as well as at the Free O.P.D. level.Free O.P.D. ..</p>

                  </div>
                </div>
              </div>
              <div class="orange-widget"><a href="#" class="btn btn-primary">Read More</a></div>
            </div>
          </div>


          <div class="col-md-4">

            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/academics.jpg')}}" alt="academics" class="img-fluid"></div>
                  <div class="p-5">
                    <h3>Alternative Medicine</h3>
                    <p class="text-justify">
                      The Department of Acupuncture is the oldest. It was started about 20 years ago and it has been actively involved in treating patients both privately as well as at the Free O.P.D. level.Free O.P.D. ..
                    </p>
                  </div>
                </div>
              </div>
              <div class="orange-widget"><a href="#" class="btn btn-primary">Read More</a></div>
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
        <div class="row our-service">
          <div class="col-md-4 col-xs-offset-0 step-one">
            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/our-service2.jpg')}}" alt="our-service" class="img-fluid"></div>
                  <h3>Health Check Up Programs</h3>
                  <p>
                    Catch the Disease before it Catches you
                  </p>
                  <p>

                    One Stop for all your Investigations
                  </p>

                </div>
              </div>
              <div class="orange-widget"><a href="#" class="btn btn-primary">Read More</a></div>

            </div>
          </div>


          <div class="col-md-4 col-xs-offset-0 step-one">
            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/our-service3.jpg')}}" alt="our-service" class="img-fluid"></div>
                  <h3>Publications</h3>
                  <p>
                    The hospital has been publishing the quarterly newsletter since July 1996...
                  </p>
                </div>
              </div>
              <div class="orange-widget"><a href="#" class="btn btn-primary">Read More</a></div>

            </div>
          </div>

          <div class="col-md-4 col-xs-offset-0 step-one">
            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/our-service5.jpg')}}" alt="our-service" class="img-fluid"></div>
                  <h3>Financial Services</h3>
                  <p>
                    Loan Provision
                  </p>
                  <p>


                    TPA Facility
                  </p>

                </div>
              </div>
              <div class="orange-widget"><a href="#" class="btn btn-primary">Read More</a></div>


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
                  <div><img src="{{asset('public/assets/images/Adolescent-Clinic-inner.jpg')}}" alt="Adolescent" class="img-fluid"></div>
                  <div class="p-5">
                    <h3>Adolescent Clinic</h3>
                    <p class="text-justify">
                      Yoga is not merely a few postures (Asanas) but a complete way of life. It is an integrated system of self culture which aims at harmonious development of body.</p>
                  </div>
                </div>
              </div>
              <div class="orange-widget"><a href="#" class="btn btn-primary">Read More</a></div>
            </div>
          </div>


          <div class="col-md-4 step-two">

            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/yoga.jpg')}}" alt="yoga" class="img-fluid"></div>
                  <div class="p-5">
                    <h3>Yoga Life Style</h3>
                    <p class="text-justify">Yoga is not merely a few postures (Asanas) but a complete way of life. It is
                      an integrated
                      system of self culture which aims at harmonious development of body.</p>
                  </div>
                </div>
              </div>
              <div class="orange-widget"><a href="#" class="btn btn-primary">Read More</a></div>
            </div>
          </div>


          <div class="col-md-4">

            <div class="service-widgets" tabindex="-1" style="width: 100%; display: inline-block;">
              <div class="white-widget">
                <div class="card p-0">
                  <div><img src="{{asset('public/assets/images/Adolescent-Clinic-inner.jpg')}}" alt="ALLERGY" class="img-fluid"></div>
                  <div class="p-5">
                    <h3>Allergy Clinic</h3>
                    <p class="text-justify">Yoga is not merely a few postures (Asanas) but a complete way of life. It is an integrated system of self culture which aims at harmonious development of body.</p>
                  </div>
                </div>
              </div>
              <div class="orange-widget"><a href="#" class="btn btn-primary">Read More</a></div>
            </div>

          </div>

        </div>

        <a href="#" class="btn btn-primary">View All</a>
      </div>
    </section>
    <section class="our-team">
      <div class="container">
        <div>
          <!-- <p class="title-top">Qualified Professionals</p> -->
          <h2 class="panel-heading text-center">Our Team</h2>
        </div>
        <div class="row mt-4">
          <div class="col-sm-6 col-md-3">
            <div class="card"><img src="{{asset('public/assets/images/doctor.jpg')}}" alt="Our Team" class="img-fluid">
              <div class="card-body">
                <h5 class="card-title">Wayne Jameson</h5>
                <h6>Veterinarian</h6>
                <p class="card-text">Id fermentum augue, ut pellen tesque leo nas. Maecenas at arcu risus Donec com
                  modo.</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="card"><img src="{{asset('public/assets/images/doctor.jpg')}}" alt="Our Team" class="img-fluid">
              <div class="card-body">
                <h5 class="card-title">Erica Dawson</h5>
                <h6>Veterinarian</h6>
                <p class="card-text">Id fermentum augue, ut pellen tesque leo nas. Maecenas at arcu risus Donec com
                  modo.</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="card"><img src="{{asset('public/assets/images/doctor.jpg')}}" alt="Our Team" class="img-fluid">
              <div class="card-body">
                <h5 class="card-title">Greg Tang</h5>
                <h6>Veterinarian</h6>
                <p class="card-text">Id fermentum augue, ut pellen tesque leo nas. Maecenas at arcu risus Donec com
                  modo.</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="card"><img src="{{asset('public/assets/images/doctor.jpg')}}" alt="Our Team" class="img-fluid">
              <div class="card-body">
                <h5 class="card-title">James Shaw</h5>
                <h6>Veterinarian</h6>
                <p class="card-text">Id fermentum augue, ut pellen tesque leo nas. Maecenas at arcu risus Donec com
                  modo.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center mt-5"><a href="#" class="btn btn-primary">Read More</a></div>
      </div>
    </section>

    <section id="testimonails" class="my-5">
      <div class="container text-center">
        <h1 class="panel-heading" style="color:#ffff">Testimonial</h1>
        <div class="row">
          <div class="col-md-12">


            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner my-5">
                <div class="carousel-item active testi">
                  <div class="item">
                    <div class="testi-user"><img src="{{asset('public/assets/images/client.png')}}" alt="Testimonial"></div>
                    <div class="card"><i class="fas fa-quote-left"></i>
                      <p>

                        It was a painful journey of life Six months before but after coming all my problems were cured
                        and I got full complete satisfactory treatment and within 10 days I am living my life as before.
                        The doctors who have taken my case had delivered it very efficiently. I have got my well care
                        here. Thanks for giving me a new life. Thanks to all the doctors, sisters and staff who have
                        cooperated well in those ten days.
                      </p>
                      <h6> <i class="fa fa-quote-left"></i> John Smith</h6>
                    </div>
                  </div>
                </div>
                <div class="carousel-item testi">
                  <div class="item">
                    <div class="testi-user"><img src="{{asset('public/assets/images/client.png')}}" alt="Testimonial"></div>
                    <div class="card"><i class="fas fa-quote-left"></i>
                      <p>
                        It was a painful journey of life Six months before but after coming all my problems were cured
                        and I got full complete satisfactory treatment and within 10 days I am living my life as before.
                        The doctors who have taken my case had delivered it very efficiently. I have got my well care
                        here. Thanks for giving me a new life. Thanks to all the doctors, sisters and staff who have
                        cooperated well in those ten days.</p>
                      <h6> <i class="fa fa-quote-left"></i> John Smith</h6>
                    </div>
                  </div>
                </div>
                <div class="carousel-item testi">
                  <div class="item">
                    <div class="testi-user"><img src="{{asset('public/assets/images/client.png')}}" alt="Testimonial"></div>
                    <div class="card"><i class="fas fa-quote-left"></i>
                      <p>

                        It was a painful journey of life Six months before but after coming all my problems were cured
                        and I got full complete satisfactory treatment and within 10 days I am living my life as before.
                        The doctors who have taken my case had delivered it very efficiently. I have got my well care
                        here. Thanks for giving me a new life. Thanks to all the doctors, sisters and staff who have
                        cooperated well in those ten days.
                      </p>

                      <h6> <i class="fa fa-quote-left"></i> John Smith</h6>
                    </div>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>

          </div>
        </div>
      </div>

    </section>



@include('front.common.footer')

