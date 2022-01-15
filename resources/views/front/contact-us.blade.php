
@include('front.common.header')

    <style>
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #f0f0f0;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 17px 16px rgb(0 0 0 / 10%);
        }

        .card-label>input,
        .card-label>select,
        .card-label>textarea {
            background-color: #fff;
            border: 1px solid #dbdbdb;
            border-radius: 4px;
            box-shadow: 0 1px 3px #0000000d;
            display: block;
            height: 50px;
            margin-top: -13px;
            padding: 5px 15px 0;
            transition: border-color .3s;
        }

        .card-label>label {
            background-color: #fff;
            color: #292020;
            display: inline-block;
            font-weight: 500;
            margin: 6px auto auto 8px;
            padding: 6px 7px;
            position: relative;
            z-index: 1050;
            font-size: 15px;
        }

        .our-team p {
            font-size: 18px;
            line-height: 28px;
            color: #fff;
        }

        .our-team h2 {
            font-size: 34px;
            color: #fff;
        }

        .contact {
            padding: 10px;
        }

        .contact::after {
            background-color: #003a70;
            border-radius: 10px;
            content: "";
            height: 90%;
            left: 0;
            max-width: 800px;
            position: absolute;
            top: 0;
            width: 90%;
            z-index: -1;
        }

        .hospital-list i {
            background: #019b87;
            padding: 8px;
            border-radius: 100px;
            color: #fff;
        }

        .hospital-list h5 {
            color: #019b87;
            font-size: 18px;

        }

        .sticky-top {

            position: sticky;
            top: 10%;
            z-index: 1;
        }

        iframe {
            border: 2px solid rgb(77, 106, 121) !important;
            border-radius: 9px;
               width: 600px;
            height: 450px;
        }

        .hospital-list {
            box-shadow: 0 0 3px 0px rgb(0 0 0 / 36%) !important;
        }

         @media screen and (max-width:767px) {
            iframe {
            width: 100%;
            height: 100%;}


            .contact::after{
                display: none;
            }
            .our-team h2,
             .our-team p{
                color: #292020;
            }
            
        }
    </style>


    <div id="page_title">
        <div class="container text-center">
            <div class="panel-heading">Contact Us</div>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Contact Us</li>
            </ol>
        </div>
    </div>
    <section class="our-team">
        <div class="container" style="position: relative;">


            <div class="row mt-4 contact">
                <div class="col-sm-6 col-md-6 mb-5">
                    <h2 class="mb-5">
                        Enquiry Form</h2>
                    <p>

                        If you have any medical, or hospital process related query, reach out to us and don't hesitate
                        to ask. We are here to provide you transparent, seamless, and informative care
                        Please fill in the required details and our team will get in touch with you.

                        We would love to hear from you! Let us know of your experience with Max Healthcare, and keep in
                        touch. Please fill in the required details and our team will get in touch with you.

                    </p>





                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form class="ng-untouched ng-pristine ng-valid">
                                <div class="info-widget">


                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group card-label"><label>
                                                    Full Name</label><input type="text" name="firstname"
                                                    class="form-control ng-untouched ng-pristine ng-valid"></div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group card-label"><label>Email</label><input type="email"
                                                    name="email" class="form-control ng-untouched ng-pristine ng-valid">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group card-label"><label>Phone</label><input type="text"
                                                    name="phone" class="form-control ng-untouched ng-pristine ng-valid">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group card-label"><label>Enquiry Type</label>
                                                <select name="" id=""
                                                    class="form-control ng-untouched ng-pristine ng-valid">

                                                    <option value="Appointment">Appointment</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group card-label"><label>Hospital</label>
                                                <select name="" id=""
                                                    class="form-control ng-untouched ng-pristine ng-valid">
                                                    <option>- Select Hospital -</option>

                                                    <option value="Appointment">Appointment</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group card-label">
                                                <label for="remark">
                                                    Remark
                                                </label> <textarea id="remarks" name="remarks"
                                                    placeholder="Please enter remark here" 
                                                    class="gw-track form-control" style="height: 120px !important;"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 my-5">
                                            <button class="btn btn-primary btn-block btn-lg login-btn" id="submit"
                                                type="submit">Submit</button>
                                        </div>
                                    </div>


                                </div>


                                <div class="terms-accept">
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="terms_accept">
                                        <label for="terms_accept" class="ml-3 mb-0">I have read and
                                            accept <a href="#">Terms &amp;
                                                Conditions</a></label>
                                    </div>
                                </div>


                        </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>


        </div>
    </section>

    <section class="our-team324">
        <div class="container">
            <div class="row">
                <h1 class="mb-5">Find us here</h1>
            </div>


            <div class="row mt-4">

                <div class="col-sm-6 col-md-6 mb-5">


                    <div class="card p-0 mb-5 hospital-list">
                        <div class="card-body d-flex">
                            <div class="mr-5"><img src="./images/hospital.jpg" alt="" class="img-fluid"
                                    style="height: auto;"></div>
                            <div>
                                <h5 class="mb-3">
                                    Super Speciality Hospital, Mumbai

                                </h5>
                                <p>
                                    Dr. Balabhai Nanavati Hospital, S.V. Road, Vile Parle (West), Mumbai, Maharashtra,
                                    400056, India
                                </p>
                                <p>
                                    <b><i class="fa fa-phone mr-3"> </i> +91 4589562358</b>

                                </p>

                            </div>
                        </div>

                    </div>
                    <div class="card p-0 mb-5 hospital-list">
                        <div class="card-body d-flex">
                            <div class="mr-5"><img src="./images/hospital.jpg" alt="" class="img-fluid"
                                    style="height: auto;"></div>
                            <div>
                                <h5 class="mb-3">
                                    Super Speciality Hospital, Mumbai

                                </h5>
                                <p>
                                    Dr. Balabhai Nanavati Hospital, S.V. Road, Vile Parle (West), Mumbai, Maharashtra,
                                    400056, India
                                </p>
                                <p>
                                    <b><i class="fa fa-phone mr-3"> </i> +91 4589562358</b>

                                </p>

                            </div>
                        </div>

                    </div>
                    <div class="card p-0 mb-5 hospital-list">
                        <div class="card-body d-flex">
                            <div class="mr-5"><img src="./images/hospital.jpg" alt="" class="img-fluid"
                                    style="height: auto;"></div>
                            <div>
                                <h5 class="mb-3">
                                    Super Speciality Hospital, Mumbai

                                </h5>
                                <p>
                                    Dr. Balabhai Nanavati Hospital, S.V. Road, Vile Parle (West), Mumbai, Maharashtra,
                                    400056, India
                                </p>
                                <p>
                                    <b><i class="fa fa-phone mr-3"> </i> +91 4589562358</b>

                                </p>

                            </div>
                        </div>

                    </div>
                    <div class="card p-0 mb-5 hospital-list">
                        <div class="card-body d-flex">
                            <div class="mr-5"><img src="./images/hospital.jpg" alt="" class="img-fluid"
                                    style="height: auto;"></div>
                            <div>
                                <h5 class="mb-3">
                                    Super Speciality Hospital, Mumbai

                                </h5>
                                <p>
                                    Dr. Balabhai Nanavati Hospital, S.V. Road, Vile Parle (West), Mumbai, Maharashtra,
                                    400056, India
                                </p>
                                <p>
                                    <b><i class="fa fa-phone mr-3"> </i> +91 4589562358</b>

                                </p>

                            </div>
                        </div>

                    </div>
                    <div class="card p-0 mb-5 hospital-list">
                        <div class="card-body d-flex">
                            <div class="mr-5"><img src="./images/hospital.jpg" alt="" class="img-fluid"
                                    style="height: auto;"></div>
                            <div>
                                <h5 class="mb-3">
                                    Super Speciality Hospital, Mumbai

                                </h5>
                                <p>
                                    Dr. Balabhai Nanavati Hospital, S.V. Road, Vile Parle (West), Mumbai, Maharashtra,
                                    400056, India
                                </p>
                                <p>
                                    <b><i class="fa fa-phone mr-3"> </i> +91 4589562358</b>

                                </p>

                            </div>
                        </div>

                    </div>
                    <div class="card p-0 mb-5 hospital-list">
                        <div class="card-body d-flex">
                            <div class="mr-5"><img src="./images/hospital.jpg" alt="" class="img-fluid"
                                    style="height: auto;"></div>
                            <div>
                                <h5 class="mb-3">
                                    Super Speciality Hospital, Mumbai

                                </h5>
                                <p>
                                    Dr. Balabhai Nanavati Hospital, S.V. Road, Vile Parle (West), Mumbai, Maharashtra,
                                    400056, India
                                </p>
                                <p>
                                    <b><i class="fa fa-phone mr-3"> </i> +91 4589562358</b>

                                </p>

                            </div>
                        </div>

                    </div>






                </div>
                <div class="col-md-6 ">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14008.203852601826!2d77.38985960000001!3d28.62823465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cef4c5f461ded%3A0xd313abdd0ac05989!2sNoida!5e0!3m2!1sen!2sin!4v1641814043852!5m2!1sen!2sin"
                       allowfullscreen="" loading="lazy"
                        class="sticky-top"></iframe>
                </div>
            </div>



        </div>


        </div>
    </section>


@include('front.common.footer')