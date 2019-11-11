@extends('layouts.admin')

@section('content')
<div id="content">

    <!-- Topbar -->
    @include('theme.nav')
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif
    <!-- End of Topbar -->
    @if (\Session::has('rider'))
    {{ \Session::forget('rider')}}
    {{ \Session::forget('bike')}}
    {{ \Session::forget('nextkin')}}
    {{ \Session::forget('other')}}
    @endif
   
    @if (\Session::has('ticket'))
    {{ \Session::forget('ticket')}}
    @endif
   
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="{{ route('createRider') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"> @csrf</i> Add New Rider</a>
            <a href="{{ route('createTicket') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"> @csrf</i> New Ticket Entry</a>
            <a href="javascript:void(0)"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm reportmodal"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ticket Entry
                                    (Today)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$todayTicket}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Income
                                    (Today)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">₦ {{$sumIncome}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Riders
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalRider}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Active Riders
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$todayTicket}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3 ">
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="m-0 font-weight-bold text-primary">Top Active Riders</h6>
                        </div>
                        {{-- <div class="col-md-4 float-right" style="position:relative;">
                            <a href="#" class="m-0 font-weight-bold text-primary" style="position:absolute; right:0px;">
                                Export Top Rider to Excel </a>
                        </div> --}}
                    </div>
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
                                    <th>Tickets count</th>
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
                                    <th>Tickets Count</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="report-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ticketCrudModal"></h4>
                </div>
                <div class="modal-body row">
                    {{Form::label('type', 'Select Report', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                    <div class="col-md-7">
                        {{Form::select('report',['Select Report' => 'Select Report','Active Rider' => 'Active Rider Report', 'Tickets Report' => 'Tickets Report'], 'Select Report', ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="modal-footer" id="printdoc">
                    <div class="float-left">
                        <a data-dismiss="modal" class="btn btn-primary print" id="print" style="color: white;"> OK </a>
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

    $('#dataTable').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: SITEURL + "/admin",
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
                        } 
                    },
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
                    { data: 'ticket_count',
                      name: 'ticket_count'
                    },
                    {data: 'action', name: 'action', orderable: false},
               ],
        order: [[7, 'desc']]
      });

   /* When click edit user */
    $('body').on('click', '.reportmodal', function () {
        $('#report-modal').modal('show');
   });


   $('body').on('click', '.view-rider', function () {
    var _id = $(this).data('id');
      window.location.href = '/riders/'+_id+'/details'
   });
});

    </script>

    <!-- End of Main Content -->

    <!-- Footer -->

    @endsection