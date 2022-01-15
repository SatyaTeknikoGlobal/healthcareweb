
    <footer>
      <div class="container-fluid footerbg">
        <div class="container">
          <div class="row">

            <div class="col-md-3"> 
              <a href="#" class="footer-logo"> 
              <!-- <img class="logo-dark" src="{{asset('public/assets/images/logonew.jpg')}}"
                  alt="hospital" />  -->

                  Get Cured In 
                  <br>
                  India Private Limited

            </a>
              <div class="about_info">
                <p><i class="fa fa-map-marker" aria-hidden="true"></i> 512,5th Floor,Kailash Building,26 K G Marg,Connaught Place,New Delhi-110001
                </p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> info@hospital.com</p>
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
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="">About us</a></li>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Terms & Conditions</a></li>
                <li><a href="">Contact Us</a></li>

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
              <p class="copyright pull-left">&copy; Get Cured In
India Private Limited 2022 All Right Reserved</p>
              <ul class="footer-scoails pull-right">
                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-pinterest" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>


  </div>








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

<script src="{{asset('public/assets/node_modules/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>


  <script src="{{asset('public/assets/swiper/swiper-bundle.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('public/assets/swiper/swiper-bundle.min.css')}}">

    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
    $(function () {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function () {
                new Switchery($(this)[0], $(this).data());
            });
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
            $("input[name='tch1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
            $("input[name='tch2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='tch3']").TouchSpin();
            $("input[name='tch3_22']").TouchSpin({
                initval: 40
            });
            $("input[name='tch5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });
            // For multiselect
            $('#pre-selected-options').multiSelect();
            $('#optgroup').multiSelect({
                selectableOptgroup: true
            });
            $('#public-methods').multiSelect();
            $('#select-all').click(function () {
                $('#public-methods').multiSelect('select_all');
                return false;
            });
            $('#deselect-all').click(function () {
                $('#public-methods').multiSelect('deselect_all');
                return false;
            });
            $('#refresh').on('click', function () {
                $('#public-methods').multiSelect('refresh');
                return false;
            });
            $('#add-option').on('click', function () {
                $('#public-methods').multiSelect('addOption', {
                    value: 42,
                    text: 'test 42',
                    index: 0
                });
                return false;
            });
            $(".ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                //templateResult: formatRepo, // omitted for brevity, see the source of this page
                //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
        });
    </script>
  <script>
    const swiper = new Swiper(".swiper", {
      // Optional parameters
      direction: "horizontal",
      loop: true,
      effect: "fade",
      fadeEffect: {
        crossFade: true
      },
      speed: 400,

      // If we need pagination
      /*pagination: {
    el: '.swiper-pagination',
  },*/

      // Navigation arrows
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      }

      // And if we need scrollbar
      /*scrollbar: {
    el: '.swiper-scrollbar',
  },*/
    });
  </script>

   <script type="text/javascript">
      $(".select2").select2();
    </script>


    <script>
      $(".select2-single").select2();
      $("#multiple").select2();
    </script>


    <script type="text/javascript">



   $( document ).ready( function() {



       /* HTML5 Geolocation */

       navigator.geolocation.getCurrentPosition(

                     function( position ){ // success cb

                      /* Current Coordinate */

                      var lat = position.coords.latitude;

                      var lng = position.coords.longitude;

                      var google_map_pos = new google.maps.LatLng( lat, lng );

                         //alert(lng);

                         /* Use Geocoder to get address */

                         var google_maps_geocoder = new google.maps.Geocoder();

                         google_maps_geocoder.geocode(

                             { 'latLng': google_map_pos },

                             function( results, status ) {

                               if ( status == google.maps.GeocoderStatus.OK && results[0] ) {

                                $("#latitude").val(lat);

                                $("#longitude").val(lng);

                                var address_new = $('#addressTextField').val();

                                if(address_new ==''){

                                 //console.log( results[0].formatted_address );

                                 $("#addressTextField").val(results[0].formatted_address);

                                 $("#latitude").val(lat);

                                 $("#longitude").val(lng);

                                 

                             }



                         }

                     }

                     );

                     },

                     );

   });







    function initialize() {

           var input = document.getElementById('addressTextField');

           if(input=='')

           {

            alert('Please Enter Location');

          }

          var autocomplete = new google.maps.places.Autocomplete(input);

                 // Set initial restrict to the greater list of countries.

                 autocomplete.setComponentRestrictions({

                  country: ["in"],

                });

                 autocomplete.addListener('place_changed', function() {

                   var place = autocomplete.getPlace();

                   /* Location details */

                   var address_new = place.formatted_address;

                   

         

         

                   // alert(place.geometry.location.lat());

         

                   document.getElementById('addressTextField').value = place.formatted_address;

                   document.getElementById('latitude').value = place.geometry.location.lat();

                   document.getElementById('longitude').value = place.geometry.location.lng();

                 });

               }

    google.maps.event.addDomListener(window, 'load', initialize);

         

</script>



<script type="text/javascript">
    function main() {
            var sideMenu = document.getElementById('side-nav');
            var close = document.getElementById('close');
            var menu = document.getElementById('hamburger-menu');
            var wrapper = document.getElementById('wrapper');

            menu.addEventListener('click', function () {
                sideMenu.className = 'open';
                close.classList.remove('hide');
            });
            close.addEventListener('click', function () {
                sideMenu.classList.remove('open');
                close.className = 'hide';

            });

            wrapper.addEventListener('click', () => {
  if (sideMenu.classList.contains('open')) sideMenu.classList.remove('open')
})



        }

        addEventListener('load', main);

      

</script>
<!-- 
data aos animatgion -->
<script>
  AOS.init();
</script>


</body>


</html>