@extends('layouts.admin')

@section('content')

<div id="content">
    <form id="productForm" name="productForm" class="form-horizontal">
        {{ csrf_field() }}
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Ticket Entry Review</h6>
                <br>
                <div id="tranID" style="text-align: center;"> Transaction ID>:</div>
            </a>
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
<script type="text/javascript">
    var SITEURL = '{{URL::to('')}}';
    $(document).ready( function () {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var _id = $(this).data('id');
        $.ajax({
            type:"GET",
            url:'/tickets/'+_id+'/printpreview',
            context: document.body,
            success : function(results) {
                console.log(results);
                $('#ticket-modal').modal('show');
                $('#tranID').html('Transaction ID:'+ results[0].transID);
                $('#collectorname').html(results[0].collectorname);
                $('#vehicleno').html(results[0].vehicleno);
                $('#transID').html(results[0].transID);
                $('#amount').html(results[0].amount);
                $('#collectionlga').html(results[0].collectionlga);
                $('#collectiondate').html(results[0].collectiondate);
                $('#payername').html(results[0].payername);
                $('#payerID').html(results[0].payerID);
                $('#payerphone').html(results[0].payerphone);
                $('#payerlga').html(results[0].payerlga);
            }
        });
    });
</script>
@endsection