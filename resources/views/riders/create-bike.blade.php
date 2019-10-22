@extends('layouts.admin')

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
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div><br />
    @endif
    <!-- End of Topbar -->
    {{-- <p>{{ \Session::get('rider') }}</p> --}}
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card-header">Bike Information</div>
        <form method="POST" action="{{ route('postBike') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
                <div class="col-sm justify-content-center">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="bikebrand" class="col-md-4 col-form-label text-md-right">Bike Brand</label>
                            <div class="col-md-7">
                                <input id="bikebrand" type="text"
                                    class="form-control @error('bikebrand') is-invalid @enderror" name="bikebrand"
                                    value="{{old('bikebrand') }}" required autocomplete="bikebrand" autofocus>
                                @error('bikebrand')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="enginenumber" class="col-md-4 col-form-label text-md-right">Engine Number</label>

                            <div class="col-md-7">
                                <input id="enginenumber" type="text" class="form-control @error('enginenumber') is-invalid @enderror"
                                    name="enginenumber" value="{{ old('enginenumber') }}" required autocomplete="enginenumber">

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
                                <input id="chasisno" type="text" class="form-control @error('chasisno') is-invalid @enderror"
                                    name="chasisno" value="{{ old('chasisno') }}" required autocomplete="chasisno">

                                @error('chasisno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="registrationnum" class="col-md-4 col-form-label text-md-right">Registration No.</label>

                            <div class="col-md-7">
                                <input id="registrationnum" type="text" class="form-control @error('registrationnum') is-invalid @enderror"
                                    name="registrationnum" value="{{ old('registrationnum') }}" required autocomplete="registrationnum">

                                @error('registrationnum')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="receiptnumber" class="col-md-4 col-form-label text-md-right">Purchase Receipt No.</label>

                            <div class="col-md-7">
                                <input id="receiptnumber" type="text" class="form-control @error('receiptnumber') is-invalid @enderror"
                                    name="receiptnumber" value="{{ old('receiptnumber') }}" required autocomplete="receiptnumber">

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
                                <input type="date" id="dateofpurchase" class="form-control @error('dateofpurchase') is-invalid @enderror"
                                    name="dateofpurchase" value="{{old('dateofpurchase') }}">

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
                                    value="{{old('witnessname') }}" required autocomplete="witnessname" autofocus>

                                @error('witnessname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="witnessaddress" class="col-md-4 col-form-label text-md-right">Witness Address</label>
                            <div class="col-md-7">
                                <textarea class="form-control  @error('witnessaddress') is-invalid @enderror" name="witnessaddress"
                                    value={{ old('witnessaddress') }} required autocomplete="address" rows="5" id="witnessaddress">
                                </textarea>

                                @error('witnessaddress')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="witnessphonenum" class="col-md-4 col-form-label text-md-right">Witness Phone No.</label>

                            <div class="col-md-7">
                                <input id="witnessphonenum" type="witnessphonenum"
                                    class="form-control @error('witnessphonenum') is-invalid @enderror" name="witnessphonenum"
                                    value="{{ old('witnessphonenum') }}" required autocomplete="phonenumber">
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
