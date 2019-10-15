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

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card-header">Bike Information</div>
        <form method="POST" action="{{ route('postBike') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
                <div class="col-sm justify-content-center">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">First Name</label>
                            <div class="col-md-7">
                                <input id="firstname" type="text"
                                    class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                    value="{{old('firstname') }}" required autocomplete="firstname" autofocus>
                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bvn" class="col-md-4 col-form-label text-md-right">BVN</label>

                            <div class="col-md-7">
                                <input id="bvn" type="text" class="form-control @error('bvn') is-invalid @enderror"
                                    name="bvn" value="{{ old('bvn') }}" required autocomplete="bvn">

                                @error('BVN')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bvn" class="col-md-4 col-form-label text-md-right">BVN</label>

                            <div class="col-md-7">
                                <input id="bvn" type="text" class="form-control @error('bvn') is-invalid @enderror"
                                    name="bvn" value="{{ old('bvn') }}" required autocomplete="bvn">

                                @error('BVN')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bvn" class="col-md-4 col-form-label text-md-right">BVN</label>

                            <div class="col-md-7">
                                <input id="bvn" type="text" class="form-control @error('bvn') is-invalid @enderror"
                                    name="bvn" value="{{ old('bvn') }}" required autocomplete="bvn">

                                @error('BVN')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bvn" class="col-md-4 col-form-label text-md-right">BVN</label>

                            <div class="col-md-7">
                                <input id="bvn" type="text" class="form-control @error('bvn') is-invalid @enderror"
                                    name="bvn" value="{{ old('bvn') }}" required autocomplete="bvn">

                                @error('BVN')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">Date of
                                Birth</label>
                            <div class='input-group date col-md-7' id='dob'>
                                <input type="date" id="dob" class="form-control @error('dob') is-invalid @enderror"
                                    name="dob" value="{{old('dob') }}">

                            </div>
                            @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>
                            <div class="col-md-7">
                                <input id="surname" type="text"
                                    class="form-control @error('surname') is-invalid @enderror" name="surname"
                                    value="{{old('surname') }}" required autocomplete="name" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Contact
                                Address:</label>
                            <div class="col-md-7">
                                <textarea class="form-control  @error('address') is-invalid @enderror" name="address"
                                    value={{ old('address') }} required autocomplete="address" rows="5" id="address"
                                    required autocomplete="address">
                                </textarea>

                                @error('Address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phonenumber" class="col-md-4 col-form-label text-md-right">Contact
                                Number</label>

                            <div class="col-md-7">
                                <input id="phonenumber" type="phonenumber"
                                    class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber"
                                    value="{{ old('phonenumber') }}">
                                @error('phonenumber')
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