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
                                    <th>Full Name</th>
                                    <th>Status</th>
                                    <th>LGA</th>
                                    <th>Vehicle Reg. No.</th>
                                    <th>Contact Number</th>
                                    <th>Rider ID</th>
                                    <th>Unit Park Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Status</th>
                                    <th>LGA</th>
                                    <th>Vehicle Reg. No.</th>
                                    <th>Contact Number</th>
                                    <th>Rider ID</th>
                                    <th>Unit Park Name</th>
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
          url: SITEURL + "/riders",
          type: 'GET',
         },
         columns: [

                    { data: 'ridername', name: 'bike_details.ridername' ,
                        createdCell: function (td, cellData, rowData, row, col)
                        {
                            $(td).css('text-transform', 'capitalize');
                        }
                    },
                    { data: 'status', name: 'riders.status' ,
                        createdCell: function (td, cellData, rowData, row, col)
                        {
                            $(td).css('text-transform', 'capitalize');
                        } },
                    {
                        data: 'lga',
                        name: 'riders.lga',
                        createdCell: function (td, cellData, rowData, row, col)
                        {
                            $(td).css('text-transform', 'capitalize');
                        }
                    },

                    { data: 'registrationnum', name: 'bike_details.registrationnum',  createdCell: function (td, cellData, rowData, row, col)
                        {
                            $(td).css('text-transform', 'uppercase');
                        }
                    },
                    { data: 'phonenumber',
                        name: 'riders.phonenumber'
                    },
                    { data: 'riderid', name: 'other_details.riderid' },
                    { data: 'unitparkname', name: 'other_details.unitparkname' ,
                        createdCell: function (td, cellData, rowData, row, col)
                        {
                            $(td).css('text-transform', 'capitalize');
                        }
                    },
                    {data: 'action', name: 'action', orderable: false},
               ],
        order: [[3, 'desc']]
      });

   /* When click edit user */
    $('body').on('click', '.view-rider', function () {
      var _id = $(this).data('id');
      window.location.href = '/riders/'+_id+'/details';
   });
   $('body').on('click', '.delete-rider', function () {
      var _id = $(this).data('id');
        if(confirm("Are you sure you want to Delete this data?"))
        {
                $.ajax({
                    type:"POST",
                    url:"/riders/"+_id+'/delete',
                    success:function(data)
                    {
                        console.log(data);
                        alert(data);
                        $('#dataTable').DataTable().ajax.reload();
                    }
                })
        }
        else
        {
            return false;
        }
   });
});

</script>


@endsection
