@extends('layouts.admin')

@section('content')
<div id="content">
    <!-- Topbar -->
    @include('theme.nav')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tickets Entries</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Trans. ID.</th>
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
                                    <th>Trans. ID.</th>
                                    <th>Collector Name</th>
                                    <th>Collection LGA</th>
                                    <th>Payer LGA</th>
                                    <th>Vehicle Reg. No.</th>
                                    <th>Amount (₦)</th>
                                    <th>Collection Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            {{-- <tbody>
                                @foreach ($tickets as $ticket)
                                <tr>
                                    <td style="text-transform: capitalize;">{{ $ticket->transID }}</td>
                            <td style="text-transform: capitalize;">{{ $ticket->collectorname }}</td>
                            <td>{{ $ticket->collectionlga }}</td>
                            <td style="text-transform: capitalize;">{{ $ticket->payerlga }}</td>
                            <td style="text-transform: uppercase;">{{ $ticket->vehicleno }}</td>
                            <td>{{ $ticket->amount }}</td>
                            <td>{{ $ticket->collectiondate }}</td>
                            </tr>
                            @endforeach
                            </tbody> --}}
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
                  //  $('#title-error').hide();
        //  $('#product_code-error').hide();
        //  $('#description-error').hide();
        //  $('#productCrudModal').html("Edit Product");
        //   $('#btn-save').val("edit-product");
        //   $('#ajax-product-modal').modal('show');
        //   $('#product_id').val(data.id);
        //   $('#title').val(data.title);
        //   $('#product_code').val(data.product_code);
        //   $('#description').val(data.description);
             }
        });

   });
});

</script>

@endsection
