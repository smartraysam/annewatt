@extends('layouts.admin')

@section('content')
<div id="content">
    <!-- Topbar -->
    @include('theme.nav')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3 ">
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="m-0 font-weight-bold text-primary">Tickets Entries</h6>
                        </div>
                        <div class="col-md-4 float-right" style="position:relative;">
                            <a href="{{route('exportTicket')}}" class="m-0 font-weight-bold text-primary" style="position:absolute; right:0px;">
                                Export Ticket Entries to Excel </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Transaction ID.</th>
                                    <th>Collector Name</th>
                                    <th>Collection LGA</th>
                                    <th>Payer LGA</th>
                                    <th>Vehicle Reg. No.</th>
                                    <th>Amount (₦)</th>
                                    <th>Collection Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Transaction ID.</th>
                                    <th>Collector Name</th>
                                    <th>Collection LGA</th>
                                    <th>Payer LGA</th>
                                    <th>Vehicle Reg. No.</th>
                                    <th>Amount (₦)</th>
                                    <th>Collection Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ticket-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ticketCrudModal"></h4>
            </div>
            <div class="modal-body">
                <form id="ticketform" name="ticketform" class="form-horizontal ticketform">
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
                    <a data-dismiss="modal" class="btn btn-primary print" id="print" style="color: white;"> Print </a>
                </div>
                <div class="float-right">
                    <a data-dismiss="modal" class="btn btn-primary" style="color: white;"> Close </a>
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
     $(function() {
        $("#printdoc").find('.print').on('click', function() {
            $(".ticketform").printThis();
        });
    });

  $('#dataTable').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: SITEURL + "/tickets",
          type: 'GET',
         },
         columns: [
                  {data: 'transID', name: 'transID'},
                  {
                      data: 'collectorname',
                      name: 'collectorname',
                      createdCell: function (td, cellData, rowData, row, col)
                      {
                        $(td).css('text-transform', 'capitalize');
                      }
                  },
                  { data: 'collectionlga', name: 'collectionlga' },
                  { data: 'payerlga', name: 'payerlga' },
                  { data: 'vehicleno',
                    name: 'vehicleno',
                    createdCell: function (td, cellData, rowData, row, col)
                      {
                        $(td).css('text-transform', 'uppercase');
                      }
                   },
                  { data: 'amount', name: 'amount' },
                  { data: 'collectiondate', name: 'collectiondate' },
                  {data: 'action', name: 'action', orderable: false},
               ],
        order: [[0, 'desc']]
      });

   /* When click edit user */
    $('body').on('click', '.view-ticket', function () {
      var _id = $(this).data('id');
      $.ajax({
             type:"GET",
             url:"/tickets/"+_id+'/show',
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
});

</script>

@endsection