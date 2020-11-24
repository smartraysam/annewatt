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
                    <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email Address</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email Address</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Status</th>
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
          url: SITEURL + "/inbox",
          type: 'GET',
         },
         columns: [

                    { data: 'name', name: 'messages.name' ,

                    },
                    { data: 'email', name: 'messages.email' ,

                    },

                    {
                        data: 'subject',
                        name: 'messages.subject',

                    },


                    { data: 'message', name: 'messages.message',

                    },
                    { data: 'read_status',
                        name: 'messages.read_status'
                    },

                    {data: 'action', name: 'action'},
               ],
        order: [[5, 'asc']]
      });

   /* When click edit user */
    $('body').on('click', '.view-msg', function () {
      var _id = $(this).data('id');
      window.location.href = '/inbox/'+_id+'/read';
   });
   $('body').on('click', '.delete-msg', function () {
      var _id = $(this).data('id');
        if(confirm("Are you sure you want to Delete this data?"))
        {
                $.ajax({
                    type:"POST",
                    url:"/inbox/"+_id+'/delete',
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
