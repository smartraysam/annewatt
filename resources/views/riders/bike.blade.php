@extends('layouts.admin')
@section('title', 'Bike Entry')
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

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <div class="alert   alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="card-header">Bike Information</div>
            <form method="POST" action="{{ route('postBike') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="text" hidden value="{{ session('bike.id') }}" name="id">
                <div class="card">
                    <div class="col-sm justify-content-center">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="bikebrand" class="col-md-4 col-form-label text-md-right">Bike Brand</label>
                                <div class="col-md-7">
                                    <input id="bikebrand" type="text"
                                        class="form-control @error('bikebrand') is-invalid @enderror" name="bikebrand"
                                        value="{{ session('bike.bikebrand') }}" required autocomplete="bikebrand" autofocus
                                        style="text-transform: capitalize;">
                                    @error('bikebrand')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="enginenumber" class="col-md-4 col-form-label text-md-right">Engine
                                    Number</label>

                                <div class="col-md-7">
                                    <input id="enginenumber" type="text"
                                        class="form-control @error('enginenumber') is-invalid @enderror" name="enginenumber"
                                        value="{{ session('bike.enginenumber') }}" required autocomplete="enginenumber"
                                        style="text-transform: uppercase;">

                                    @error('enginenumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="chasisno" class="col-md-4 col-form-label text-md-right">Chassis Number</label>

                                <div class="col-md-7">
                                    <input id="chasisno" type="text"
                                        class="form-control @error('chasisno') is-invalid @enderror" name="chasisno"
                                        value="{{ session('bike.chasisno') }}" required autocomplete="chasisno"
                                        style="text-transform: uppercase;">

                                    @error('chasisno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="registrationnum" class="col-md-4 col-form-label text-md-right">Vehicle Reg.
                                    No.</label>

                                <div class="col-md-7">
                                    <input id="registrationnum" type="text"
                                        class="form-control @error('registrationnum') is-invalid @enderror"
                                        name="registrationnum" value="{{ session('bike.registrationnum') }}" required
                                        autocomplete="registrationnum" style="text-transform: uppercase;">

                                    @error('registrationnum')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="receiptnumber" class="col-md-4 col-form-label text-md-right">Purchase Receipt
                                    No.</label>

                                <div class="col-md-7">
                                    <input id="receiptnumber" type="text"
                                        class="form-control @error('receiptnumber') is-invalid @enderror"
                                        name="receiptnumber" value="{{ session('bike.receiptnumber') }}" required
                                        autocomplete="receiptnumber">

                                    @error('receiptnumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dateofpurchase" class="col-md-4 col-form-label text-md-right">Date of
                                    Purchase</label>
                                <div class='input-group date col-md-7' id='dateofpurchase'>
                                    <input type="date" id="dateofpurchase"
                                        class="form-control @error('dateofpurchase') is-invalid @enderror"
                                        name="dateofpurchase" value="{{ session('bike.dateofpurchase') }}">

                                </div>
                                @error('dateofpurchase')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="witnessname" class="col-md-4 col-form-label text-md-right">Witness Name</label>
                                <div class="col-md-7">
                                    <input id="witnessname" type="text"
                                        class="form-control @error('witnessname') is-invalid @enderror" name="witnessname"
                                        value="{{ session('bike.witnessname') }}" required autocomplete="witnessname"
                                        autofocus style="text-transform: capitalize;">

                                    @error('witnessname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="witnessaddress" class="col-md-4 col-form-label text-md-right">Witness
                                    Address</label>
                                <div class="col-md-7">
                                    <textarea class="form-control  @error('witnessaddress') is-invalid @enderror" name="witnessaddress"
                                        value="{{ session('bike.witnessaddress') }}" required autocomplete="address" rows="5" id="witnessaddress"
                                        style="text-transform: capitalize;">{{ session('bike.witnessaddress') }}</textarea>

                                    @error('witnessaddress')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="witnessphonenum" class="col-md-4 col-form-label text-md-right">Witness Phone
                                    No.</label>

                                <div class="col-md-7">
                                    <input id="witnessphonenum" type="witnessphonenum"
                                        class="form-control @error('witnessphonenum') is-invalid @enderror"
                                        name="witnessphonenum" value="{{ session('bike.witnessphonenum') }}" required
                                        autocomplete="phonenumber">
                                    @error('witnessphonenum')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="float-left mx-5">
                            <a href="{{ route('backbike') }}" class="btn btn-primary"> Back </a>
                        </div>
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
