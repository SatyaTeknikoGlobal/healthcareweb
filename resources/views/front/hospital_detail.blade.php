


    <style>
        .doctor-widget {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            padding: 0 24px;
        }

        .doc-info-left {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .doctor-img {
            -ms-flex: 0 0 150px;
            flex: 0 0 150px;
            margin-right: 20px;
            width: 150px;
        }

        .doctor-img img {
            border-radius: 5px;
        }

        .doctor-widget .doc-name {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .doc-speciality {
            font-size: 14px;
            color: #757575;
            margin-bottom: 15px;
        }

        .doc-department {
            color: #f79a6f;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .doc-department img {
            width: 19px;
            display: inline-block;
            margin-right: 10px;
        }

        .doctor-widget .rating i {
            font-size: 14px;
        }

        .rating i.filled {
            color: #f79a6f;
        }

        .doc-info-right {
            margin-left: auto;
            -ms-flex: 0 0 200px;
            flex: 0 0 200px;
            padding: 18px 46px;
            margin-bottom: 50px;
            position: relative;
        }

        #page_title .breadcrumb>li {
            position: relative;
        }

        #page_title .panel-heading {
            padding: 0 70px 2px;
        }

        .clini-infos {
            margin-bottom: 15px;
        }

        .clini-infos ul {
            font-size: 14px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .clini-infos ul li i {
            font-size: 15px;
            min-width: 30px;
            color: #f97d09 !important;
        }

        .clinic-booking a.apt-btn {
            background-color: #f97d09;
            color: #fff;
            padding: 10px;
        }

        .clinic-booking a.apt-btn:hover {
            text-decoration: none;
        }

        .clinic-booking a {
            background-color: #fff;
            border: 2px solid #f97d09;
            border-radius: 4px;
            color: #f97d09;
            display: block;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 10px 20px;
            text-align: center;
            text-transform: uppercase;
            width: max-content;
        }

        .btn-white {
            background-color: #fff;
            border: 1px solid #ccc;
            color: #272b41;
            padding: 8px;
            margin: 0 3px;
            font-size: 15px;
        }

        .doctor-action {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .clini-infos ul li {
            display: block;
            line-height: 30px;
            color: #fff;
        }

        .panel-heading {
            margin-bottom: 10px;
            position: relative;
            font-size: 26px;
            font-weight: 700;
            line-height: 20px;


        }

        .panel-heading:before {
            position: absolute;
            content: '';
            width: 50px;
            height: 3px;
            left: 50%;
            bottom: 0;
            z-index: 100;
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
            background: #1de7eb;
            background: -webkit-linear-gradient(to right, #40a8e7, #1de7eb);
            background: linear-gradient(to right, #40a8e7, #1de7eb);
        }

        #page_title .breadcrumb {
            margin-bottom: 50px;
        }

        .about-hospital {
            box-shadow: 0 1px 6px rgb(0 0 0 / 15%);
            border-radius: 9px;
        }

        .nav-tabs {
            border-bottom: 1px solid #f0f0f0;
        }
          .faetures {
            padding: 30px 26px;
        }

        .faetures .col-md-3 {

            border-right: 1px solid lightgray;

        }


        .skewed {


            transform: skew(61deg, 296deg) translate(120px, -70px);
            background-color: #003d73;
            height: 100%;
            width: 50%;
            position: absolute;
            border: 1px solid #40a8e7;
        }

        #page_title {
            position: relative;
            overflow: hidden;
            padding: 65px 0px;
        }

        .user-tabs .nav-tabs>a {
            border: 0;
            border-bottom: 3px solid transparent;
            color: #3e3e3e;
            font-weight: 600;
            padding: 20px;
            width: 25%;
            text-align: center;
            font-size: 17px;
        }

        .card div:first-child img {
            height: 150px;
        }

        figure,
        video {
            border-radius: 8px;
        }

        video {
            width: 500px;
            height: 300px;
        }
            .tabs-container .tabs .tab,
    .tabs-container .tabs input[type=radio] {
        display: none;
    }

    .tabs-container .tabs input[type=radio]+label {
        border: 0;
        border-bottom: 3px solid transparent;
        color: #3e3e3e;
        font-weight: 600;
        padding: 20px;
        width: 23%;
        text-align: center;
        font-size: 17px;
    }

    .tabs-container .tabs input[type=radio]:checked+label {
        border-bottom-width: 3px;
        color: #f79a6f;
        border-bottom: 3px solid #f79a6f;
        background-color: #fff;

    }

    .tabs-container .tabs input[type=radio]+label:hover {
        background-color: #eee;
        border-color: transparent;
        color: #272b41;

    }


    .tabs-container .tabs .tab {
        margin: 0;
        padding: 2rem 0;






    }

    .tabs input:first-of-type:checked+label~.tab:first-of-type,
    .tabs input:nth-of-type(2):checked+label~.tab:nth-of-type(2),
    .tabs input:nth-of-type(3):checked+label~.tab:nth-of-type(3),
    .tabs input:nth-of-type(4):checked+label~.tab:nth-of-type(4) {
        display: block;
    }

    .tabs-container .tabs .tab ul {
        margin: 0;
        padding: 0;
        width: 100%;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: repeat(auto-fill, minmax(auto, 1fr));
        grid-auto-flow: row;
        justify-content: center;
        list-style: none;
    }

    .tabs-container .tabs .tab ul li {
        margin: 1rem;
        font-size: 17px;
    }

    .tabs-container .tabs .tab p {
        margin: 1.5rem;
    }

    @media screen and (max-width:767px) {

        .skewed {
            display: none;
        }

        #page_title .panel-heading {
            padding: 0 11px 2px;
            font-size: 13px;
            text-transform: inherit;
        }

        .doc-info-right {
            padding: 0;
        }

        .tabs-container .tabs input[type=radio]+label {
            width: auto;
            padding: 8px 11px;
        }

        .doctor-widget {
            display: block;
            flex-direction: row;
            padding: 0;
            text-align: justify;
        }

        #page_title .breadcrumb .active {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        #page_title .breadcrumb {
            white-space: nowrap;
        }

        #page_title .breadcrumb {
            margin-bottom: 15px;
            flex-wrap: nowrap;
        }

        video {
            width: 100%;
            height: 250px;
            border-radius: 12px;
        }
    }
    </style>






    

    <div id="page_title" style="background-image: url('./images/hospital-back.jpg');background-position: 14% 51%;
    background-size: contain;">
        <div class="skewed">

        </div>
        <div class="container text-center">
            <!-- <div class="panel-heading">Booking Detail</div> -->
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Super Speciality Hospital, Shalimar Bagh</li>
            </ol>
        </div>
        <div class="panel-heading">Super Speciality Hospital, Shalimar Bagh
        </div>
        <div class="doc-info-right" style="    margin-left: 23px;">
            <div class="clini-infos">
                <ul>

                    <li><i class="fas fa-map-marker-alt"></i> Newyork, USA</li>
                    <li><i class="fas fa-map"></i> <b><a href="">Get Direction</a></b></li>


                </ul>
            </div>


        </div>
    </div>
    <div class="content mb-5" style="margin-top: -70px;">
        <div class="container">


            <div class="card about-hospital">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left5">
                            <h5 class="panel-heading text-center">
                                About Us

                            </h5>
                            <p>
                                The 280 bedded Super Specialty Hospital offers services in medical disciplines of
                                Cancer,
                                Cardiac Sciences, Neurosciences, Gastroenterology, General & Laparoscopic Surgery, MAMBS
                                (Minimal Access, Metabolic and Bariatric Surgery), Orthopaedics, Nephrology, Renal
                                Transplant and Urology. With a panel of expert staff and advanced technology,

                                Specialty Hospital, Shalimar Bagh, has experience in treating more than 4,00,000
                                patients
                                and continues to provide the best care and treatment. State-of-the-art equipment
                                includes
                                MRI 1.5 Tesla, Discovery IQ PET CT, 16-Slice CT Scanner, Philips (IE33) ECHO Machine,
                                Neurosurgical Microscope, and Holmium Laser. Our
                                Institute of Cancer Care has
                                incorporated the latest advancements in radiation therapy like Quick and Precise
                                Radiation
                                Therapy...
                            </p>
                        </div>
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    <li style="color: #003d73;"><i class="far fa-thumbs-up"></i> 99%</li>
                                    <li style="color: #003d73;"><i class="far fa-comment"></i> 35 Feedback</li>
                                    <li style="color: #003d73;"><i class="fas fa-map-marker-alt"></i> Newyork, USA</li>
                                    <li style="color: #003d73;"><i class="far fa-money-bill-alt"></i> $100 per hour
                                    </li>
                                </ul>
                            </div>
                            <div class="doctor-action"><a href="#0" class="btn btn-white fav-btn"><i
                                        class="far fa-bookmark"></i></a><a href="#0" class="btn btn-white call-btn"><i
                                        class="fas fa-phone"></i></a><a href="" class="btn btn-white call-btn"><i
                                        class="fas fa-video"></i></a>
                            </div>
                            <div class="clinic-booking"><a class="apt-btn" href="">Book Appointment</a></div>
                        </div>
                    </div>
                </div>




                <div class="row faetures">
                    <div class="col-md-3">
                        <div class="d-flex">
                            <div>
                                <i class="fas fa-bed mr-5"></i>
                            </div>
                            <div>
                                <p class="m-0 l-h-12 f-lg-40 font-weight-bold">166+
                                </p>
                                <p class="m-0 l-h-12 f-md-24 white-space-nowrap">
                                    Beds Facility
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex">
                            <div>
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <p class="m-0 l-h-12 f-lg-40 font-weight-bold"> 350+
                                </p>
                                <p class="m-0 l-h-12 f-md-24 white-space-nowrap">


                                    Trained Staff
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex">
                            <div>
                                <i class="fas fa-user-md"></i>
                            </div>
                            <div>
                                <p class="m-0 l-h-12 f-lg-40 font-weight-bold">80+
                                </p>
                                <p class="m-0 l-h-12 f-md-24 white-space-nowrap">


                                    Doctors
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex">
                            <div>
                                <i class="fas fa-sparkles"></i>
                            </div>
                            <div>
                                <p class="m-0 l-h-12 f-lg-40 font-weight-bold">20+
                                </p>
                                <p class="m-0 l-h-12 f-md-24 white-space-nowrap">
                                    Specialities
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">

            <div class="card mb-5 p-0">
                <div class="card-body pt-0 user-tabs">

                    <div class="tabs-container">
                        <div class="tabs">
                            <input type="radio" name="tabs" id="tab-1" checked="checked">
                            <label for="tab-1">Gallary</label>

                            <input type="radio" name="tabs" id="tab-2">
                            <label for="tab-2">Video</label>


                            <input type="radio" name="tabs" id="tab-3">
                            <label for="tab-3">Location</label>
                            <input type="radio" name="tabs" id="tab-4">


                            <label for="tab-4">Our Specialities</label>

                            <div class="tab">
                                <ul class="">
                                    <div class="col-md-3">
                                        <figure>
                                            <img src="./images/alternative.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="col-md-3">
                                        <figure>
                                            <img src="./images/alternative.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="col-md-3">
                                        <figure>
                                            <img src="./images/alternative.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="col-md-3">
                                        <figure>
                                            <img src="./images/alternative.jpg" alt="">
                                        </figure>
                                    </div>
                                </ul>
                            </div>
                            <div class="tab">
                                <ul>
                                    <div class="col-md-6">
                                        <video controls>
                                            <source src="videos/1.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                    <div class="col-md-6">
                                        <video controls>
                                            <source src="videos/1.mp4" type="video/mp4">
                                        </video>
                                    </div>






                                </ul>
                            </div>
                            <div class="tab" style="overflow: hidden;">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14008.203852601826!2d77.38985960000001!3d28.62823465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cef4c5f461ded%3A0xd313abdd0ac05989!2sNoida!5e0!3m2!1sen!2sin!4v1641814043852!5m2!1sen!2sin"
                                    width="1200" height="450" style="border:0;" allowfullscreen=""
                                    loading="lazy"></iframe>

                            </div>
                            <div class="tab">
                                <ul>
                                    <li>
                                        Bone Marrow Transplant (BMT)
                                    </li>
                                    <li>
                                        Thoracic Surgery
                                    </li>
                                    <li>
                                        The Da Vinci Xi Robotic Surgery
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
   
    

    