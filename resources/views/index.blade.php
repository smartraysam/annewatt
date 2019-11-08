@extends('layouts.appIndex')

@section('content')
<div id="content">

    <section class="site-hero overlay" style="background-image: url(img/okada.jpg);">
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

                </div>
            </div>
        </div>
    </section>

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
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
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
      console.log(_id);
      $.ajax({
             type:"GET",
             url:"/index/"+_id+'/details',
             success : function(results) {
             var t = JSON.parse(results)
             console.log(t ['riderData']);
             console.log(t ['ticketData']);
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
                 $('#profilepic').attr("src",SITEURL+"/storage/"+""+t ['riderData'][0].profilepic);
                 console.log(SITEURL+"/storage/"+""+t ['riderData'][0].profilepic);
              }
                
              if(t ['ticketData'].length > 0){
                $('#activeDate').html('Last Active Date: '+ t['ticketData'][0].collectiondate);
              }else{
                $('#activeDate').html('Last Active Date: Nill');
              }
             }
        });

   });

   $('body').on('click', '.view-rider', function () {
      var _id = $('#rideridheader').val();
      $("#rideridheader").attr("placeholder", "Enter Rider ID...").val("").focus().blur();
      if(_id==''){
        console.log('null');
        alert("Please Enter Rider ID");
          return;
      }
      console.log(_id);
      $.ajax({
             type:"GET",
             url:"/index/"+_id+'/details',
             success : function(results) {
                console.log(results);
                var t = JSON.parse(results)
                console.log(t ['riderData']);
                console.log(t ['ticketData']);
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
                 $('#profilepic').attr("src",SITEURL+"/storage/"+""+t ['riderData'][0].profilepic);
                 console.log(SITEURL+"/storage/"+""+t ['riderData'][0].profilepic);
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