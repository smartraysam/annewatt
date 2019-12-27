@extends('layouts.appIndex')
@section('content')
<div id="content">
    <section id="home"class="site-hero overlay" style="background-image: url(img/okada.jpg);">
        <div class="container">
            <div class="row align-items-center  justify-content-center">
                <div class="col-md-8 text-center">

                    <div class="mb-5 element-animate fadeInUp element-animated" style=" margin-top: 20%;">
                        <img src="{!! asset('favicon.ico') !!}" style="width:80px;height:80px;">
                        <h1>ANNEWATT</h1>
                        <h1>Know more about your rider.</h1>
                        <p>Discover more about the rider through his activites details .</p>
                    </div>

                    <form class="form-inline element-animate fadeInUp element-animated" id="search-form">
                        <input type="text" class="form-control form-control-block search-input" id="rideridbody"
                            placeholder="Enter Rider ID" autocomplete="off">
                        <button type="button" class="btn btn-primary view-riderbody">Search</button>
                    </form>
                     <div  class="loader"></div>

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
                  <p>Founded in 1990 by Edo state Government, Annewatt has come a long way from its beginnings in
                      Auchi.  We now serve customers all over the townand are thrilled that we're able
                      to turn our passion into online rider directory.
                    We hope you enjoy the service that this online rider directory will offer you as much as
                     we enjoy offering them to you.
                     If you have any questions or comments,
                     please don't hesitate to contact us through the contant us page or any of our excos.
                    Thanks,</p>
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
                <p>Get in touch  with out executive for more details about Annewatt </p>
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6 wow fadeInUp">
                    <div class="member">
                        <img src="img/team-1.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Walter White</h4>
                                <span>Chairman</span>
                                <div class="social">
                                    <a href="tel: 08153553555"><i class="fa fa-mobile"></i> 08153553555</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="member">
                        <img src="img/team-2.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Sarah Jhonson</h4>
                                <span>Vice Chairman</span>
                                <div class="social">
                                    <div class="social">
                                        <a href="tel: 08153553555"><i class="fa fa-mobile"></i> 08153553555</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="member">
                        <img src="img/team-3.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>William Anderson</h4>
                                <span>Teasurer</span>
                                <div class="social">
                                    <a href="tel: 08153553555"><i class="fa fa-mobile"></i> 08153553555</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="member">
                        <img src="img/team-4.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Amanda Jepson</h4>
                                <span>General Secretary</span>
                                <div class="social">
                                    <a href=""><i class="fa fa-mobile"></i> 08153553555</a>
                                </div>
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
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7918.9363712925715!2d6.264679761578603!3d7.071589936186962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10467d12bfa68fd1%3A0xf8ecd9829a3da969!2sEtsako-West%20Local%20Government%20Council!5e0!3m2!1sen!2sng!4v1577470961774!5m2!1sen!2sng" width="600" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
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
                        {{-- <div id="sendmessage">Your message has been sent. Thank you!</div> --}}
                        <div id="errormessage"></div>
                        <form action="" method="post" role="form" class="contactForm">
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
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
                            <img id="profilepic" class="rounded mt-2" alt="profile Image"
                                src="{!! asset('img/user.png') !!}" width="150" height="150" />
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
    var SITEURL = '{{URL::to('')}}';
 $(document).ready( function () {
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
        }, 800, function(){

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
        });
        } // End if
    });


   /* When click edit user */
    $('body').on('click', '.view-riderbody', function () {
      var _id = $('#rideridbody').val();
      $("#rideridbody").attr("placeholder", "Enter Rider ID...").val("").focus().blur();
      if(_id==''){
        console.log('null');
        alert("Please enter Rider ID");
          return;
      }
     $('.loader').show();
      console.log(_id);
      $.ajax({
             type:"GET",
             url:"/index/"+_id+'/details',
             success : function(results) {
             var t = JSON.parse(results)
             console.log(t ['riderData']);
             console.log(t ['ticketData']);
              $('.loader').hide();
             if((t ['riderData'].length == 0) && (t['ticketData'].length == 0) ){
                console.log('no Data');
                alert("Rider not found");
                return;
              }
              if(t ['riderData'].length > 0){
                $('#riderdetails-modal').modal('show');
                $('#riderID').html('Rider Identification Number: '+ _id);
                $('#ridername').html(t ['riderData'][0].surname +" "+ t ['riderData'][0].middlename +" "+ t ['riderData'][0].firstname);
                 $('#status').html(t ['riderData'][0].status);
                 $('#lga').html(t ['riderData'][0].lga);
                 $('#address').html(t ['riderData'][0].address);
                 $('#phoneno').html(t ['riderData'][0].phonenumber);
                 $('#riderunit').html(t ['riderData'][0].unitparkname);
                 $('#chairmanno').html(t ['riderData'][0].chairmanphoneno);
                 $('#chairman').html(t ['riderData'][0].chairmanname);
                 $('#vehicle').html(t ['riderData'][0].registrationnum);
                $('#profilepic').attr("src",SITEURL+"/annewatt/storage/app/public/"+""+t ['riderData'][0].profilepic);
              }

              if(t ['ticketData'].length > 0){
                $('#activeDate').html('Last Active Date: '+ t['ticketData'][0].collectiondate);
              }else{
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

   $('body').on('click', '.view-rider', function () {

      var _id = $('#rideridheader').val();
      $("#rideridheader").attr("placeholder", "Enter Rider ID...").val("").focus().blur();
      if(_id==''){
        console.log('null');
        alert("Please Enter Rider ID");
         return;
      }
      console.log(_id);
       $('.loader').show();
      $.ajax({
             type:"GET",
             url:"/index/"+_id+'/details',
             success : function(results) {
                console.log(results);
                var t = JSON.parse(results)
                console.log(t ['riderData']);
                console.log(t ['ticketData']);
                 $('.loader').hide();
             if((t ['riderData'].length == 0) && (t['ticketData'].length == 0) ){
                 console.log('no Data');
                alert("Rider not found");
                return;
              }
              if(t ['riderData'].length > 0){
                $('#riderdetails-modal').modal('show');
                $('#riderID').html('Rider Identification Number: '+ _id);
                $('#ridername').html(t ['riderData'][0].surname +" "+ t ['riderData'][0].middlename +" "+ t ['riderData'][0].firstname);
                 $('#status').html(t ['riderData'][0].status);
                 $('#lga').html(t ['riderData'][0].lga);
                 $('#address').html(t ['riderData'][0].address);
                 $('#phoneno').html(t ['riderData'][0].phonenumber);
                 $('#riderunit').html(t ['riderData'][0].unitparkname);
                 $('#chairmanno').html(t ['riderData'][0].chairmanphoneno);
                 $('#chairman').html(t ['riderData'][0].chairmanname);
                 $('#vehicle').html(t ['riderData'][0].registrationnum);
                 $('#profilepic').attr("src",SITEURL+"/annewatt/storage/app/public/"+""+t ['riderData'][0].profilepic);

              }

              if(t ['ticketData'].length > 0){
                $('#activeDate').html('Last Active Date: '+ t['ticketData'][0].collectiondate);
              }else{
                $('#activeDate').html('Last Active Date: Nill');
              }
             }
        });

   });
});

</script>

@endsection
