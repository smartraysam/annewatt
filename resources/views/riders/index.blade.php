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

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Status</th>
                                    <th>LGA</th>
                                    <th>Vehicle Reg. No.</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($riders as $rider)
                                <tr>
                                    {{-- <td style="text-transform: capitalize;">{{ $ticket->transID }}</td>
                                    <td style="text-transform: capitalize;">{{ $ticket->collectorname }}</td>
                                    <td>{{ $ticket->collectionlga }}</td>
                                    <td style="text-transform: capitalize;">{{ $ticket->payerlga }}</td>
                                    <td style="text-transform: uppercase;">{{ $ticket->vehicleno }}</td>
                                    <td>{{ $ticket->amount }}</td>
                                    <td>{{ $ticket->collectiondate }}</td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>

@endsection