@extends('layouts.admin')
@section('title', 'Others')
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
    <p>{{ \Session::get('nextkin') }}</p>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card-header">Other Information</div>
        <form method="POST" action="{{ route('postOther') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
                <div class="col-sm justify-content-center">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="riderid" class="col-md-4 col-form-label text-md-right">Rider Identification Number</label>
                            <div class="col-md-7">
                                <input id="riderid" type="text"
                                    class="form-control @error('bikebrand') is-invalid @enderror" name="riderid"
                                    value="{{session('other.riderid') }}" required autocomplete="riderid" autofocus  style="text-transform: capitalize;">
                                @error('riderid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="unitparkname" class="col-md-4 col-form-label text-md-right">Unit Park Name</label>

                            <div class="col-md-7">
                                <input id="unitparkname" type="text" class="form-control @error('unitparkname') is-invalid @enderror"
                                    name="unitparkname" value="{{session('nextkin.unitparkname') }}" required autocomplete="unitparkname"  style="text-transform: capitalize;">

                                @error('unitparkname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="chairmanname" class="col-md-4 col-form-label text-md-right">Chairman Name</label>

                            <div class="col-md-7">
                                <input id="chairmanname" type="text" class="form-control @error('chairmanname') is-invalid @enderror"
                                    name="chairmanname" value="{{session('nextkin.chairmanname') }}" required autocomplete="chairmanname"  style="text-transform: capitalize;">

                                @error('chairmanname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="chairmanphoneno" class="col-md-4 col-form-label text-md-right">Chairman's Phone Number</label>

                            <div class="col-md-7">
                                <input id="chairmanphoneno" type="phonenumber" class="form-control @error('chairmanphoneno') is-invalid @enderror"
                                    name="chairmanphoneno" value="{{session('nextkin.chairmanphoneno') }}" required autocomplete="chairmanphoneno">

                                @error('chairmanphoneno')
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
                        <a href="{{ route('backother') }}" class="btn btn-primary"> Back </a>
                    </div>
                    <div class="float-right mx-5">
                        <button type="submit" class="btn btn-primary">
                            Preview
                        </button>
                    </div>
                </div>
            </div>


        </form>
    </div>
</div>


@endsection
