@extends('layouts.admin')
@section('title', 'Ticket Entry')
@section('content')
<div id="content">
    <!-- Topbar -->
    @include('theme.nav')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert  alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card-header">Submit New Ticket</div>
        <form method="POST" action="{{ route('createTicket') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
                <div class="col-sm justify-content-center">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="collectionlga" class="col-md-4 col-form-label text-md-right">Collection LGA</label>
                            <div class="col-md-7">
                                <select name="collectionlga" id="collectionlga" class="form-control" required>
                                    <option value="" selected='selected'>- Select -</option>
                                    <option value="Akoko-Edo">Akoko-Edo</option>
                                    <option value='Egor'>Egor</option>
                                    <option value='Esan Central'>Esan Central</option>
                                    <option value='Esan North-East'>Esan North-East</option>
                                    <option value='Esan South-East'>Esan South-East</option>
                                    <option value='Esan West'>Esan West</option>
                                    <option value='Etsako Central'>Etsako Central</option>
                                    <option value='Etsako East'>Etsako East</option>
                                    <option value='Etsako West'>Etsako West</option>
                                    <option value='Igueben'>Igueben</option>
                                    <option value='Ikpoba Okha'>Ikpoba Okha</option>
                                    <option value='Orhionmwon'>Orhionmwon</option>
                                    <option value='Oredo'>Oredo</option>
                                    <option value='Ovia North-East'>Ovia North-East</option>
                                    <option value='Ovia South-West'>Ovia South-West</option>
                                    <option value='Owan East'>Owan East</option>
                                    <option value='Owan West'>Owan West</option>
                                    <option value='Uhunmwonde'>Uhunmwonde</option>
                                </select>
                            </div>
                            @error('collectionlga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="collectorname" class="col-md-4 col-form-label text-md-right">Collector
                                Name</label>
                            <div class="col-md-7">
                                <input id="collectorname" type="text"
                                    class="form-control @error('collectorname') is-invalid @enderror"
                                    name="collectorname" value="{{session('ticket.collectorname')}}" required
                                    autocomplete="collectorname" style="text-transform: capitalize;">

                                @error('collectorname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="collectiondate" class="col-md-4 col-form-label text-md-right">Collection
                                Date</label>
                            <div class='input-group date col-md-7' id='collectiondate'>
                                <input type="date" id="collectiondate"
                                    class="form-control @error('collectiondate') is-invalid @enderror"
                                    name="collectiondate" value="{{session('ticket.collectiondate')}}">
                            </div>
                            @error('collectiondate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">Amount (₦):</label>
                            <div class="col-md-7">
                                <input id="amount" type="text"
                                    class="form-control @error('amount') is-invalid @enderror" name="amount"
                                    value="{{session('ticket.amount')}}" required autocomplete="amount" autofocus>
                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="transID" class="col-md-4 col-form-label text-md-right">Transaction ID</label>

                            <div class="col-md-7">
                                <input id="transID" type="text"
                                    class="form-control @error('transID') is-invalid @enderror" name="transID"
                                    value="{{session('ticket.transID')}}" required autocomplete="transID">

                                @error('transID')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vehicleno" class="col-md-4 col-form-label text-md-right">Vehicle Reg.
                                Number</label>

                            <div class="col-md-7">
                                <input id="vehicleno" type="text"
                                    class="form-control @error('vehicleno') is-invalid @enderror" name="vehicleno"
                                    value="{{session('ticket.vehicleno')}}" required autocomplete="vehicleno"
                                    style="text-transform: uppercase;">

                                @error('vehicleno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payerlga" class="col-md-4 col-form-label text-md-right">Payer's LGA</label>
                            <div class="col-md-7">
                                <select name="payerlga" id="payerlga" class="form-control" required>
                                    <option value="" selected='selected'>- Select -</option>
                                    <option value="Akoko-Edo">Akoko-Edo</option>
                                    <option value='Egor'>Egor</option>
                                    <option value='Esan Central'>Esan Central</option>
                                    <option value='Esan North-East'>Esan North-East</option>
                                    <option value='Esan South-East'>Esan South-East</option>
                                    <option value='Esan West'>Esan West</option>
                                    <option value='Etsako Central'>Etsako Central</option>
                                    <option value='Etsako East'>Etsako East</option>
                                    <option value='Etsako West'>Etsako West</option>
                                    <option value='Igueben'>Igueben</option>
                                    <option value='Ikpoba Okha'>Ikpoba Okha</option>
                                    <option value='Orhionmwon'>Orhionmwon</option>
                                    <option value='Oredo'>Oredo</option>
                                    <option value='Ovia North-East'>Ovia North-East</option>
                                    <option value='Ovia South-West'>Ovia South-West</option>
                                    <option value='Owan East'>Owan East</option>
                                    <option value='Owan West'>Owan West</option>
                                    <option value='Uhunmwonde'>Uhunmwonde</option>
                                </select>
                            </div>
                            @error('payerlga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="payername" class="col-md-4 col-form-label text-md-right">Payer's Name</label>
                            <div class="col-md-7">
                                <input id="payername" type="text"
                                    class="form-control @error('payername') is-invalid @enderror" name="payername"
                                    value="{{session('ticket.payername')}}" required autocomplete="payername" autofocus
                                    style="text-transform: capitalize;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payerID" class="col-md-4 col-form-label text-md-right">Payer's ID</label>
                            <div class="col-md-7">
                                <input id="payerID" type="text"
                                    class="form-control @error('payerID') is-invalid @enderror" name="payerID"
                                    value="{{session('ticket.payerID')}}" required autocomplete="payerID" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payerphone" class="col-md-4 col-form-label text-md-right">Payer's Phone
                                No.</label>

                            <div class="col-md-7">
                                <input id="payerphone" type="phonenumber"
                                    class="form-control @error('payerphone') is-invalid @enderror" name="payerphone"
                                    value="{{session('ticket.payerphone')}}" required autocomplete="payerphone">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="float-right mx-5">
                        <button type="submit" class="btn btn-primary">
                            Next
                        </button>
                    </div>
                </div>
            </div>


        </form>
    </div>
</div>


@endsection
