@extends('layouts.appIndex')
@section('title', 'Home')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div id="content">
        <section id="home"class="site-hero overlay" style="background-image: url(img/okada.jpg);">
            <div class="container">
                <div class="row align-items-center  justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-5 element-animate fadeInUp element-animated text-center" style=" margin-top: 20%;">
                            <img src="{!! asset('favicon.ico') !!}" style="width:80px;height:80px;">
                            <h1>ANNEWATT</h1>
                            <h1>Know more about your rider.</h1>
                            <p>Discover more about the rider through his activites details .</p>
                        </div>

                        <form class="form-inline element-animate fadeInUp element-animated" id="search-form">
                            <div class="col-sm  text-center">
                                <div class="form-group row" style="margin: 10px">
                                    <select name="branch" id="branch" class="form-control form-control-block" required
                                        style="width:100%">
                                        <option value="0" selected>Choose Branch</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}">
                                                {{ $branch->name }}
                                            </option>
                                        @endforeach
                                    </select>


                                </div>
                                <div class="form-group row" style="margin: 10px">
                                    <input type="text" class="form-control form-control-block search-input"
                                        id="rideridbody" placeholder="Enter Rider ID" autocomplete="off"
                                        style="width: 1000%">
                                </div>
                                <div class="form-group row" style="margin: 10px">
                                    <button type="button" class="btn btn-primary view-riderbody"
                                        style="width: 100%">Search</button>
                                </div>
                            </div>
                        </form>
                        <div class="loader"></div>

                    </div>
                </div>
            </div>
        </section>

        <section id="about">
            <div class="container-fluid bg-light">
                <br>
                <br>
                <br>
                <header class="section-header text-center ">
                    <h1>About Us</h1>
                    <br>
                </header>
                <div class="row pb-5 px-5">
                    <div class="col-sm-8">
                        <h4>Welcome to Annewatt, your number one online local rider directory giving you more details about
                            your rider.
                            We're dedicated to providing you the very best of transport services,
                            with an emphasis on save and secure transportation.</h4><br>
                        <p>In 2017, the Edo State Government called for the harmonization of all the 8 different registered
                            Associations/Unions existing and operating differently or having working relationship with one
                            another </p>
                        <p>Consequently, they picked one of the Registered Trade Union TOAN (Tricycle Owners Association of
                            Nigeria) to operate with. </p>
                        <p>After about a year, due to issues of common ownership, the federating unions decided to pick the
                            first alphabet of each association that would be more representative of the 8 unions.
                            Therefore, the first letter of each of these Associations/Unions is what is known as ANNEWATT.
                        </p>
                        <p>In Edo State, ANNEWATT is the registered umbrella body managing and unionizing tricycles and
                            motorcycles in the state recognized by the Edo State Government.
                            From the passage of the uniform and harmonised Law of 2017 on charges, rates and levies
                            collected by the local government councils;
                            we are partners with the State and local government following the passage of this law to allow
                            for the harmonization of our union Dues into state government presumptive tax and local
                            government tax.
                            Our role is to enforce these collections from our members in line with the law.</p>
                        <p>We have the State Executive Council with a Coordinator each for Bikes and tricycles, six
                            supervisory Chairmen, a State Monitoring Leader and a General Secretary.
                            At the local government level, we have General Chairmen/ Branch/Zonal Coordinators while at the
                            Unit level, we have Unit Chairmen and the executives.
                            On the field, we have Revenue Enforcers and after collections field Monitors.,</p>
                        <br><a href="#contact" class="btn btn-primary">Get in Touch</a>
                    </div>
                    <div class="col-sm-4 ">
                        <span><img src="img/okada.jpg" class="img-fluid" alt=""></span>
                    </div>
                </div>
            </div>
        </section>


        <section id="excos" class="pb-5">
            <div class="container-fluid text-center">
                <br>
                <br>
                <br>
                <div class="section-header">
                    <h1>Excos</h1>
                    <p>Get in touch with our executives for more details about Annewatt </p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 wow fadeInUp">
                        <div class="member">
                            <img src="img/team-5.png" class="img-fluid" alt="" style="height:300px !important">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Comrade Blessing Omofoman</h4>
                                    <span>State Leader</span>
                                    {{-- <div class="social">
                                        <a href="tel: 08153553555"><i class="fa fa-mobile"></i> 08153553555</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member">
                            <img src="img/team-6.png" style="height:300px !important" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Chief Alhaji Comrade Abdullawal Haruna Momoh</h4>
                                    <span>State Leader</span>
                                    {{-- <div class="social">
                                        <a href="tel: 08153553555"><i class="fa fa-mobile"></i> 08153553555</a>
                                    </div> --}}
                                </div>
                            </div> 
                        </div>
                    </div>
 
                    <div class="col-lg-4 col-md-6 wow fadeInUp">
                        <div class="member">
                            <img src="img/team-1.png" class="img-fluid" alt="" style="height:300px !important">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4> Comrade Daniel Ayegbeni OSIAGA (Ph.D)</h4>
                                    <span> State Secretary</span>
                                    {{-- <div class="social">
                                        <a href="tel: 08153553555"><i class="fa fa-mobile"></i> 08153553555</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member">
                            <img src="img/team-2.png" style="height:300px !important" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4> Comrade Michael Okhuarobo</h4>
                                    <span> State Coordinator (Tricycles) </span>
                                    {{-- <div class="social">
                                        <a href="tel: 08153553555"><i class="fa fa-mobile"></i> 08153553555</a>
                                    </div> --}}
                                </div>
                            </div> 
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="member">
                            <img src="img/team-3.png" class="img-fluid" style="height:300px !important" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4> Comrade (Dr.) Oregbe Omorodion</h4>
                                    <span> State Coordinator(Motorcycles) </span>
                                    {{-- <div class="social">
                                        <a href="tel: 08153553555"><i class="fa fa-mobile"></i> 08153553555</a>
                                    </div> --}}
                                </div>
                            </div> 
                        </div>
                    </div>
                  
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="member">
                            <img src="img/team-4.png" class="img-fluid" style="height:300px !important" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4> Comrade Monday Odigie</h4>
                                    <span>   State Monitoring Team Leader </span>
                                    {{-- <div class="social">
                                        <a href="tel: 08153553555"><i class="fa fa-mobile"></i> 08153553555</a>
                                    </div> --}}
                                </div>
                            </div> 
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="contact">
            <div class="container-fluid text-center bg-light p-5">
                <br>
                <div class="section-header">
                    <h1>Contact Us</h1>
                    <br>
                </div>

                <div class="row wow fadeInUp">

                    <div class="col-lg-6">
                        <div class="map mb-4 mb-lg-0">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7918.9363712925715!2d6.264679761578603!3d7.071589936186962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10467d12bfa68fd1%3A0xf8ecd9829a3da969!2sEtsako-West%20Local%20Government%20Council!5e0!3m2!1sen!2sng!4v1577470961774!5m2!1sen!2sng"
                                width="600" height="400" frameborder="0" style="border:0;"
                                allowfullscreen=""></iframe>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-5 info">
                                <i class="ion-ios-location-outline"></i>
                                <p>KM134, Benin-Okene Expressway,Auchi Edo State, NG 535022</p>
                            </div>
                            <div class="col-md-4 info">
                                <i class="ion-ios-email-outline"></i>
                                <p>contact@annewatt.com</p>
                            </div>
                            <div class="col-md-3 info">
                                <i class="ion-ios-telephone-outline"></i>
                                <p>(+234)7065384843</p>
                            </div>
                        </div>

                        <div class="form">

                            @if ($message = Session::get('success'))
                                <div id="sendmessage" class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div id="errormessage"></div>
                            <form action="{{ route('savemessage') }}" method="POST" role="form" class="contactForm">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Your Name" data-rule="minlen:4"
                                            data-msg="Please enter at least 4 chars" required />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Your Email" data-rule="email"
                                            data-msg="Please enter a valid email" required />
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subject" data-rule="minlen:4"
                                        data-msg="Please enter at least 8 chars of subject" required />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" data-rule="required"
                                        data-msg="Please write something for us" placeholder="Message" required></textarea>
                                    <div class="validation"></div>
                                </div>
                                <div class="text-center"><button type="submit" title="Send Message">Send
                                        Message</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#home" class="back-to-top float-right m-4 bg-light px-3 py-2"><i class="fa fa-chevron-up"></i></a>
        </section>

    </div>
    <div class="modal fade" id="riderdetails-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="riderdetails"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div style="text-align: left" class="justify-content-left col">
                            <br>
                            <h4 id="riderID"></h4>
                            <br>
                            <h4 id="activeDate"></h4>
                        </div>
                        <div style="text-align: right" class="justify-content-right col">
                            <img id="profilepic" class="rounded mt-2" alt="profile Image" src="{!! asset('img/user.png') !!}"
                                width="150" height="150" />
                        </div>

                    </div>
                    <form id="riderdetailsform" name="riderdetailsform" class="form-horizontal ticketform">
                        {{ csrf_field() }}

                        <div class="card shadow mb-4">
                            <!-- Card Header - Accordion -->
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample">
                                <div class="card-body justify-content-center">
                                    <table class="table">
                                        <tr>
                                            <td style="text-align:left; font-weight: bold;">Branch Name:</td>
                                            <td style="text-align:left; text-transform: capitalize; font-weight: bold;"
                                                id="branchname">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:left; font-weight: bold;">Rider Name:</td>
                                            <td style="text-align:left; text-transform: capitalize; font-weight: bold;"
                                                id="ridername">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:left; font-weight: bold;">Rider Status:</td>
                                            <td style="text-align:left; text-transform: capitalize;font-weight: bold;"
                                                id="status">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:left; font-weight: bold;">Local Government Area:</td>
                                            <td style="text-align:left; text-transform: capitalize; font-weight: bold;"
                                                id="lga">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:left; font-weight: bold;">Residential Address:</td>
                                            <td>
                                                <div style=" text-align:left; text-transform: capitalize; word-wrap: break-word; width: 300px; font-weight: bold;"
                                                    id="address"></div>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:left; font-weight: bold;">Phone Number:</td>
                                            <td style="text-align:left; text-transform: capitalize;font-weight: bold;"
                                                id="phoneno">

                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="text-align:left; font-weight: bold;">Rider Vehicle Reg. No:</td>
                                            <td style="text-align:left; text-transform: uppercase;font-weight: bold;"
                                                id="vehicle"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:left; font-weight: bold;">Rider Unit:</td>
                                            <td style="text-align:left; text-transform: capitalize; font-weight: bold;"
                                                id="riderunit">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:left; font-weight: bold;">Unit Chairman Name:</td>
                                            <td style="text-align:left; text-transform: capitalize; font-weight: bold;"
                                                id="chairman">

                                        </tr>
                                        <tr>
                                            <td style="text-align:left; font-weight: bold;">Chairman's Number:</td>
                                            <td style="text-align:left; text-transform: capitalize; font-weight: bold;"
                                                id="chairmanno">
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" id="printdoc">
                    <div class="float-right">
                        <a data-dismiss="modal" class="btn btn-primary" style="color: white;"> Close </a>
                    </div>

                </div>
            </div>
        </div>
    </div>


    </div>
    <script type="text/javascript">
        var SITEURL = '{{ URL::to('') }}';
        $(document).ready(function() {
            $('.loader').hide();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



            $("a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });


            /* When click edit user */
            $('body').on('click', '.view-riderbody', function() {
                var _id = $('#rideridbody').val();
                var _branch = $('#branch').val();
                if (_branch == "0") {
                    alert("Please select the  Rider Branch");
                    return;
                }

                $("#rideridbody").attr("placeholder", "Enter Rider ID...").val("").focus().blur();
                if (_id == '') {
                    console.log('null');
                    alert("Please enter Rider ID");
                    return;
                }

                $('.loader').show();
                console.log(_id);
                $.ajax({
                    type: "GET",
                    url: "/index/" + _branch + "/" + _id + '/details',
                    success: function(results) {
                        var t = JSON.parse(results)
                        console.log(t['riderData']);
                        console.log(t['ticketData']);
                        $('.loader').hide();
                        if ((t['riderData'].length == 0) && (t['ticketData'].length == 0)) {
                            console.log('no Data');
                            alert("Rider not found");
                            return;
                        }
                        if (t['riderData'].length > 0) {
                            $('#riderdetails-modal').modal('show');
                            $('#riderID').html('Rider Identification Number: ' + _id);
                            $('#ridername').html(t['riderData'][0].surname + " " + t[
                                    'riderData'][0].middlename + " " + t['riderData'][0]
                                .firstname);
                            $('#branchname').html(t['riderData'][0].name);
                            $('#status').html(t['riderData'][0].status);
                            $('#lga').html(t['riderData'][0].lga);
                            $('#address').html(t['riderData'][0].address);
                            $('#phoneno').html(t['riderData'][0].phonenumber);
                            $('#riderunit').html(t['riderData'][0].unitparkname);
                            $('#chairmanno').html(t['riderData'][0].chairmanphoneno);
                            $('#chairman').html(t['riderData'][0].chairmanname);
                            $('#vehicle').html(t['riderData'][0].registrationnum);
                            $('#profilepic').attr("src", SITEURL +
                                "/storage/" + "" + t['riderData'][0]
                                .profilepic);
                        }

                        if (t['ticketData'].length > 0) {
                            $('#activeDate').html('Last Active Date: ' + t['ticketData'][0]
                                .collectiondate);
                        } else {
                            $('#activeDate').html('Last Active Date: Nill');
                        }
                    }
                });

            });
            //   $(window).scroll(function() {
            //     $(".slideanim").each(function(){
            //       var pos = $(this).offset().top;

            //       var winTop = $(window).scrollTop();
            //         if (pos < winTop + 600) {
            //           $(this).addClass("slide");
            //         }
            //     });
            //   });

            $('body').on('click', '.view-rider', function() {

                var _id = $('#rideridheader').val();
                $("#rideridheader").attr("placeholder", "Enter Rider ID...").val("").focus().blur();
                if (_id == '') {
                    console.log('null');
                    alert("Please Enter Rider ID");
                    return;
                }
                console.log(_id);
                $('.loader').show();
                $.ajax({
                    type: "GET",
                    url: "/index/" + _id + '/details',
                    success: function(results) {
                        console.log(results);
                        var t = JSON.parse(results)
                        console.log(t['riderData']);
                        console.log(t['ticketData']);
                        $('.loader').hide();
                        if ((t['riderData'].length == 0) && (t['ticketData'].length == 0)) {
                            console.log('no Data');
                            alert("Rider not found");
                            return;
                        }
                        if (t['riderData'].length > 0) {
                            $('#riderdetails-modal').modal('show');
                            $('#riderID').html('Rider Identification Number: ' + _id);
                            $('#ridername').html(t['riderData'][0].surname + " " + t[
                                    'riderData'][0].middlename + " " + t['riderData'][0]
                                .firstname);
                            $('#status').html(t['riderData'][0].status);
                            $('#lga').html(t['riderData'][0].lga);
                            $('#address').html(t['riderData'][0].address);
                            $('#phoneno').html(t['riderData'][0].phonenumber);
                            $('#riderunit').html(t['riderData'][0].unitparkname);
                            $('#chairmanno').html(t['riderData'][0].chairmanphoneno);
                            $('#chairman').html(t['riderData'][0].chairmanname);
                            $('#vehicle').html(t['riderData'][0].registrationnum);
                            $('#profilepic').attr("src", SITEURL +
                                "/storage/" + "" + t['riderData'][0]
                                .profilepic);

                        }

                        if (t['ticketData'].length > 0) {
                            $('#activeDate').html('Last Active Date: ' + t['ticketData'][0]
                                .collectiondate);
                        } else {
                            $('#activeDate').html('Last Active Date: Nill');
                        }
                    }
                });

            });
        });
    </script>

@endsection
