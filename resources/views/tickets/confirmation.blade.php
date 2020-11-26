@extends('layouts.admin')
@section('title', 'Ticket Confirmation')
@section('content')
<div id="content">

    <!-- Topbar -->
    @include('theme.nav')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card-header"></div>
        <form method="POST" action="{{ route('saveticket') }}">
            {{ csrf_field() }}
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Ticket Entry Review</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body justify-content-center">
                        <table class="table">
                            <tr>
                                <td>Collector Name:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('ticket.collectorname')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Collection LGA:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('ticket.collectionlga')}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Collection Date:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('ticket.collectiondate')}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Amount (₦):</td>
                                <td style="text-transform: capitalize;"><strong>{{session('ticket.amount')}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Transaction ID:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('ticket.transID')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Payer Vehicle Number:</td>
                                <td style="text-transform: uppercase;">
                                    <strong>{{session('ticket.vehicleno')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Payer's LGA:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('ticket.payerlga')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Payer's Name:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('ticket.payername')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Payer's ID:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('ticket.payerID')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Payer's Phone No.:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('ticket.payerphone')}}</strong></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
            <div class="form-group row h-100 justify-content-center align-items-center">
                <div class="float-left mx-5">
                    <a href="{{ route('backticket') }}" class="btn btn-primary"> Back </a>
                </div>
                <div class="float-none mx-5">
                    <a href="{{ route('cancelticket') }}" class="btn btn-primary"> Cancel </a>
                </div>
                <div class="float-right mx-5">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection