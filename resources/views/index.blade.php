@extends('layouts.appIndex')

@section('content')
<div id="content">

    <section class="site-hero overlay" data-stellar-background-ratio="0.5"
        style="background-image: url(img/okada.jpg);">
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
                        <label for="s" class="sr-only">Location</label>
                        <input type="text" class="form-control form-control-block search-input" id="rideridbody"
                            placeholder="Enter Rider ID" autocomplete="off">
                        <button type="submit" class="btn btn-primary view-riderbody">Search</button>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="riderdetails-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="riderdetails"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div style="text-align: left" class="justify-content-left col">
                            <br>
                            <br>
                            <br>
                            <h4 id="riderID"></h4>
                        </div>
                        <div style="text-align: right" class="justify-content-right col mr-5">
                            <img id="profilepic" class="rounded mt-2" alt="profile Image"
                                src="{!! asset('img/user.png') !!}" width="150" height="150" />
                            {{-- @if(isset($rider->profilepic))
                            <img id="profilepic" class="rounded mt-2 my-2" alt="profile Image"
                                src="/storage/{{$rider->profilepic}}" width="150" height="150" />
                            @else

                            @endif --}}
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
                                            <td>Last Active Date:</td>
                                            <td style="text-transform: capitalize;" id="lastactive">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Collection LGA:</td>
                                            <td style="text-transform: capitalize;" id="collectionlga">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Collection Date:</td>
                                            <td style="text-transform: capitalize;" id="collectiondate">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Amount (₦):</td>
                                            <td style="text-transform: capitalize;" id="amount">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Transaction ID:</td>
                                            <td style="text-transform: capitalize;" id="transID">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Payer Vehicle Number:</td>
                                            <td style="text-transform: uppercase;" id="vehicleno">

                                        </tr>
                                        <tr>
                                            <td>Payer's LGA:</td>
                                            <td style="text-transform: capitalize;" id="payerlga">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Payer's Name:</td>
                                            <td style="text-transform: capitalize;" id="payername">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Payer's ID:</td>
                                            <td style="text-transform: capitalize;" id="payerID"></td>
                                        </tr>
                                        <tr>
                                            <td>Payer's Phone No.:</td>
                                            <td style="text-transform: capitalize;" id="payerphone"></td>
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
      console.log(_id);
      $.ajax({
             type:"GET",
             url:"/index/"+_id+'/details',
             success : function(results) {
              console.log(results);
                 $('#riderdetails-modal').modal('show');
                // $('#tranID').html('Transaction ID:'+ results[0].transID);
                // $('#collectorname').html(results[0].collectorname);
                // $('#vehicleno').html(results[0].vehicleno);
                // $('#transID').html(results[0].transID);
                // $('#amount').html(results[0].amount);
                // $('#collectionlga').html(results[0].collectionlga);
                // $('#collectiondate').html(results[0].collectiondate);
                // $('#payername').html(results[0].payername);
                // $('#payerID').html(results[0].payerID);
                // $('#payerphone').html(results[0].payerphone);
                // $('#payerlga').html(results[0].payerlga);
             }
        });

   });

   $('body').on('click', '.view-rider', function () {
      var _id = $('#rideridheader').val();
      console.log(_id);
      $.ajax({
             type:"GET",
             url:"/index/"+_id+'/details',
             success : function(results) {
              console.log(results);
                 $('#riderdetails-modal').modal('show');
                // $('#tranID').html('Transaction ID:'+ results[0].transID);
                // $('#collectorname').html(results[0].collectorname);
                // $('#vehicleno').html(results[0].vehicleno);
                // $('#transID').html(results[0].transID);
                // $('#amount').html(results[0].amount);
                // $('#collectionlga').html(results[0].collectionlga);
                // $('#collectiondate').html(results[0].collectiondate);
                // $('#payername').html(results[0].payername);
                // $('#payerID').html(results[0].payerID);
                // $('#payerphone').html(results[0].payerphone);
                // $('#payerlga').html(results[0].payerlga);
             }
        });

   });
});

</script>

@endsection
