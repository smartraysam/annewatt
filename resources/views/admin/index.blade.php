@extends('layouts.admin')
@section('title', 'Dashboard')
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

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#branchmodal"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm "><i
                        class="fas fa-download fa-sm text-white-50"></i> Add New Branch</a>

            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registered Branch
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBranch }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Riders
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalRider }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pending Requests Card Example -->
            </div>

            <!-- Content Row -->
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 ">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="m-0 font-weight-bold text-primary">Overview</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Branch</th>
                                        <th>Phone Number</th>
                                        <th>Email Address</th>
                                        <th>LGA</th>
                                        <th>Registered Riders</th>
                                        {{-- <th style="width: 100px">Actions</th> --}}
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal center fade" id="branchmodal" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"> Enter Branch Details</h4>
                    </div>
                    <form method="POST" action="{{ route('register.branch') }}" enctype="multipart/form-data">
                        <div class="modal-body col-lg">
                            @csrf

                            <div class="form-group" id="phonegroup">
                                <label for="name">Name:</label>
                                <div>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                                
                                </div>
                            </div>
                          
                            <div class="form-group" >
                                <label for="email">Email:</label>
                                <div>
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" required>
                                
                                </div>
                            </div>

                            <div class="form-group" >
                                <label for="phonenumber">Phone Number:</label>
                                <div>
                                    <input type="text" name="phonenumber" value="{{ old('phonenumber') }}" class="form-control" required>
                                
                                </div>
                            </div>
                          
                            <div class="form-group" >
                                <label for="address">Address:</label>
                                <div>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control" required>
                                
                                </div>
                            </div>
                       
                            <div class="form-group" >
                                <label for="lga">Local Government Area</label>
                                <div>
                                    <input type="text" name="lga" value="{{ old('lga') }}" class="form-control" required>
                                
                                </div>
                            </div>
                          
                            <div class="form-group" >
                                <label for="branch">Branch:</label>
                                <div>
                                    <input type="text" name="branch" value="{{ old('branch') }}" class="form-control" required>
                                
                                </div>
                            </div> 
                        </div>
                        <div class="modal-footer">
                            <div class="float-left">
                                <button type="submit" class="btn btn-primary" style="color: white;">
                                    Submit
                                </button>
                            </div>
                            <div class="float-right">
                                <a data-dismiss="modal" class="btn btn-danger" style="color: white;"> Close </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script type="text/javascript">
            var SITEURL = '{{ URL::to('') }}';
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#dataTable').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: SITEURL + "/branch/all",
                        type: 'GET',
                    },
                    columns: [

                        {
                            data: 'name',
                            name: 'name',

                        },

                        {
                            data: 'phonenumber',
                            name: 'phonenumber',

                        },
                        {
                            data: 'email',
                            name: 'email',

                        },
                        {
                            data: 'lga',
                            name: 'lga',

                        },

                        {
                            data: 'riders',
                            name: 'riders'
                        },
                        // {
                        //     data: 'action',
                        //     name: 'action',
                        //     orderable: false
                        // },
                    ],
                    order: [
                        [0, 'desc']
                    ]
                });

                /* When click edit user */
                $('body').on('click', '.reportmodal', function() {
                    $('#report-modal').modal('show');
                });


                $('body').on('click', '.view-rider', function() {
                    var _id = $(this).data('id');
                    window.location.href = '/riders/' + _id + '/details'
                });
            });
        </script>

        <!-- End of Main Content -->

        <!-- Footer -->

    @endsection
