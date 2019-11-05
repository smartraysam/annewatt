@extends('layouts.appIndex')

@section('content')
<div id="content">

    <section class="site-hero overlay" data-stellar-background-ratio="0.5"
        style="background-image: url(img/okada.jpg);">
        <div class="container">
            <div class="row align-items-center site-hero-inner justify-content-center">
                <div class="col-md-8 text-center">

                    <div class="mb-5 element-animate fadeInUp element-animated">
                        <img src="{!! asset('favicon.ico') !!}" style="width:80px;height:80px;">
                        <h1>ANNEWATT</h1>
                        <h1>Know more about your rider.</h1>
                        <p>Discover more about the rider through his activites details .</p>
                    </div>

                    <form class="form-inline element-animate fadeInUp element-animated" id="search-form">
                        <label for="s" class="sr-only">Location</label>
                        <input type="text" class="form-control form-control-block search-input" id="autocomplete"
                            placeholder="Enter Rider ID" autocomplete="off">
                        <button type="submit" class="btn btn-primary">Search</button>
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
                    <form id="riderdetailsform" name="riderdetailsform" class="form-horizontal ticketform">
                        {{ csrf_field() }}

                        <div class="card shadow mb-4">
                            <!-- Card Header - Accordion -->
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Ticket Entry Review</h6>
                                <br>
                                <div id="tranID" style="text-align: center"> Transaction ID>:</div>
                            </div>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample">
                                <div class="card-body justify-content-center">
                                    <table class="table">
                                        <tr>
                                            <td>Collector Name:</td>
                                            <td style="text-transform: capitalize;" id="collectorname">
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
                    <div class="float-left">
                        <a data-dismiss="modal" class="btn btn-primary print" id="print" style="color: white;"> Print
                        </a>
                    </div>
                    <div class="float-right">
                        <a data-dismiss="modal" class="btn btn-primary" style="color: white;"> Close </a>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>

@endsection