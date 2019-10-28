@extends('layouts.admin')

@section('content')
<div id="content">

    <!-- Topbar -->
    @include('theme.nav')
    <!-- Begin Page Content -->
    <p></p>
    <div class="container-fluid">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Registered Riders</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Status</th>
                                    <th>LGA</th>
                                    <th>Vehicle Reg. No.</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Status</th>
                                    <th>LGA</th>
                                    <th>Vehicle Reg. No.</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
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
  $('#dataTable').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: SITEURL + "/rider",
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
    $('body').on('click', '.view-rider', function () {
      var _id = $(this).data('id');
      $.ajax({
             type:"GET",
             url:"/rider/"+_id+'/show',
             success : function(results) {
            //   console.log(results);
            //     $('#ticket-modal').modal('show');
            //     $('#tranID').html('Transaction ID:'+ results[0].transID);
            //     $('#collectorname').html(results[0].collectorname);
            //     $('#vehicleno').html(results[0].vehicleno);
            //     $('#transID').html(results[0].transID);
            //     $('#amount').html(results[0].amount);
            //     $('#collectionlga').html(results[0].collectionlga);
            //     $('#collectiondate').html(results[0].collectiondate);
            //     $('#payername').html(results[0].payername);
            //     $('#payerID').html(results[0].payerID);
            //     $('#payerphone').html(results[0].payerphone);
            //     $('#payerlga').html(results[0].payerlga);
             }
        });

   });
});

</script>


@endsection