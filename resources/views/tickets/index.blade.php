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
                                </tr>
                            </tfoot>
                            <tbody>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>

@endsection