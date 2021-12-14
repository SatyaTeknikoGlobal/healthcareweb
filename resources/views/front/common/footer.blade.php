<footer>
  <div class="container-fluid footerbg">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> <a href="#" class="footer-logo"> <img class="logo-dark" src="{{asset('public/assets/images/logo2.png')}}"
          alt="hospital" /> </a>
          <div class="about_info">
            <p><i class="fa fa-map-marker" aria-hidden="true"></i> 2nd Floor 3rd floor, 4th floor,
              Royal Arcade,
            </p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> info@hireahelper.com</p>
            <p><i class="fa fa-phone" aria-hidden="true"></i> +91807186985</p>
          </div>
        </div>
        <div class="col-md-3">
          <h4>Academics</h4>
          <ul>
            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>
              GRIPMER
            </a></li>
            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Academic Programme
            </a></li>
            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Training &
              Fellowships
            </a></li>
            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Annual SGRH CME
            </a></li>
            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Technician Training
              (HSSC)
            </a></li>
          </ul>
          <ul>
            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> CMRP Journal
            </a>
          </li>
          <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Medical Library</a>
          </li>


        </ul>
      </div>
      <div class="col-md-2">
        <h4>About Us</h4>
        <ul>
          <li><a href="">Home</a></li>
          <li><a href="">About us</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="">Contact</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h4>Singn up Newsletter</h4>
        <form action="#" method="post" class="newsletter">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Enter Email Address">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button"><i class="fa fa-long-arrow-right"
                aria-hidden="true"></i></button>
              </span>
            </div>
            <!-- /input-group -->
          </form>


        </div>
      </div>
      <div class="top_awro pull-right" id="back-to-top"><i class="fa fa-chevron-up" aria-hidden="true"></i> </div>
    </div>
  </div>

  <!--Boottom Footer-->
  <div class="container-fluid bottom-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class="copyright pull-left">&copy; hospital 2021 All Right Reserved</p>
          <ul class="footer-scoails pull-right">
            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>


</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/js/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/assets/js/custom.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script>
  (function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
    m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');

  ga('create', 'UA-106074231-1', 'auto');
  ga('send', 'pageview');
</script>





<!-- Modal -->
<div class="modal" id="login-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Please login to continue</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



        <div class="row">

          <div class="col-md-12">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="login-form">

              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <h4> Enter Mobile Number</h4>


                <input class="form-control" id="phone" name="phone" placeholder="Enter Mobile" type="text">


                <button class="btn btn-primary btn-skin" name="submit" type="submit"> Continue</button>



              </div>





                <!-- <div class="form-group col-md-12 col-sm-12 col-xs-12 d-none">

                  <h4>Enter Your OTP</h4>
                  <input class="form-control" id="name" name="name" placeholder="Enter OTP" type="text">
                  <button class="btn btn-primary btn-skin" name="submit" type="submit"> Continue</button>
                </div> -->



              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>


  <script src="{{asset('public/assets/swiper/swiper-bundle.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('public/assets/swiper/swiper-bundle.min.css')}}">




</body>


</html>



  <script type="text/javascript">

// $(window).load(function () {
//   $(".goog-logo-link").parent().remove();
//   $(".goog-te-gadget").html(
//     $(".goog-te-gadget").html().replace('&nbsp;&nbsp;Powered by ', '')
//   );
// });
    // $( document ).ready(function() {
     

    //   var myVar = $("#google_element").find('goog-te-combo').val();
    //     alert(myVar);
    //   //$(".goog-te-combo").addClass("form-control");
    // });
  </script>
