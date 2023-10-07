@extends('layouts.admin')
@section('title', 'Next_of_Kin')
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
            <div class="card-header">Next of Kin Information</div>
            <form method="POST" action="{{ route('postNextkin') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="text" hidden value="{{ session('nextkin.id') }}" name="id">
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-sm">
                            <div class="card-body">

                                <div class="form-group row">
                                    <!-- <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label> -->
                                    {{ Form::label('title', 'Title', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                                    <div class="col-md-7">
                                        {{ Form::select('title', ['Mr' => 'Mr', 'Ms' => 'Mrs', 'Mi' => 'Miss'], 'Mr', ['class' => 'form-control']) }}
                                    </div>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="firstname" class="col-md-4 col-form-label text-md-right">First Name</label>
                                    <div class="col-md-7">
                                        <input id="firstname" type="text"
                                            class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                            value="{{ session('nextkin.firstname') }}" required autocomplete="firstname"
                                            autofocus style="text-transform: capitalize;">

                                        @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="middlename" class="col-md-4 col-form-label text-md-right">Middle
                                        Name</label>
                                    <div class="col-md-7">
                                        <input id="middlename" type="text"
                                            class="form-control @error('middlename') is-invalid @enderror" name="middlename"
                                            value="{{ session('nextkin.middlename') }}" required autocomplete="name"
                                            autofocus style="text-transform: capitalize;">

                                        @error('middlename')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>
                                    <div class="col-md-7">
                                        <input id="surname" type="text"
                                            class="form-control @error('surname') is-invalid @enderror" name="surname"
                                            value="{{ session('nextkin.surname') }}" required autocomplete="name" autofocus
                                            style="text-transform: capitalize;">

                                        @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <!-- <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label> -->
                                    {{ Form::label('gender', 'Gender', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                                    <div class="radio col-form-label ml-2">

                                        {{ Form::radio('gender', 'male', isset($rider->gender) && $rider->gender == 'male' ? 'checked' : 'true', ['id' => 'male']) }}
                                        {{ Form::label('radio', 'Male') }}
                                        <!-- <label><input type="radio" name="gender" value="male" checked>Male</label> -->
                                    </div>
                                    <div class="radio col-form-label ml-5">

                                        {{ Form::radio('gender', 'female', isset($rider->gender) && $rider->gender == 'female' ? 'checked' : '', ['id' => 'female']) }}
                                        {{ Form::label('radio', 'Female') }}
                                        <!-- <label><input type="radio" name="gender" value="female">Female</label> -->
                                    </div>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <!-- <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label> -->
                                    {{ Form::label('relationship', 'Relationship', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                                    <div class="col-md-7">
                                        {{ Form::select('relationship', ['Husband' => 'Husband', 'Wife' => 'Wife', 'Son' => 'Son', 'Daughter' => 'Daughter', 'Brother' => 'Brother', 'Sister' => 'Sister'], 'Son', ['class' => 'form-control']) }}
                                    </div>
                                    @error('relationship')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="bvn" class="col-md-4 col-form-label text-md-right">BVN</label>

                                    <div class="col-md-7">
                                        <input id="bvn" type="text"
                                            class="form-control @error('bvn') is-invalid @enderror" name="bvn"
                                            value="{{ session('nextkin.bvn') }}" required autocomplete="bvn">

                                        @error('BVN')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="state" class="col-md-4 col-form-label text-md-right">State of
                                        Origin</label>
                                    <div class="col-md-7">
                                        <select name="stateoforigin" id="state" class="form-control">
                                            <option value="" selected="selected">- Select -</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->name }}"
                                                    {{ $state->name == session('nextkin.stateoforigin') ? 'selected' : '' }}>
                                                    {{ $state->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="localorigin" class="col-md-4 col-form-label text-md-right">LGA of
                                        Origin</label>
                                    <div class="col-md-7">
                                        <select name="lga" id="lga" class="form-control" required>
                                            <option value="">Choose LGA</option>
                                            @foreach ($lgas as $lga)
                                                <option value="{{ $lga->name }}"
                                                    {{ $lga->name == session('nextkin.lga') ? 'selected' : '' }}>
                                                    {{ $lga->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('lga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="kinphonenumber" class="col-md-4 col-form-label text-md-right">Contact
                                        Number</label>

                                    <div class="col-md-7">
                                        <input id="kinphonenumber" type="phonenumber"
                                            class="form-control @error('kinphonenumber') is-invalid @enderror"
                                            name="kinphonenumber" value="{{ session('nextkin.kinphonenumber') }}">
                                        @error('kinphonenumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="housenumname" class="col-md-4 col-form-label text-md-right">House
                                        No./Name</label>
                                    <div class="col-md-7">
                                        <input id="housenumname" type="text"
                                            class="form-control @error('housenumname') is-invalid @enderror"
                                            name="housenumname" value="{{ session('nextkin.housenumname') }}" required
                                            autocomplete="housenumname" autofocus style="text-transform: capitalize;">

                                        @error('housenumname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="streetname" class="col-md-4 col-form-label text-md-right">Street
                                        Name</label>
                                    <div class="col-md-7">
                                        <input id="streetname" type="text"
                                            class="form-control @error('streetname') is-invalid @enderror"
                                            name="streetname" value="{{ session('nextkin.streetname') }}" required
                                            autocomplete="streetname" autofocus style="text-transform: capitalize;">

                                        @error('streetname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="villagetown"
                                        class="col-md-4 col-form-label text-md-right">Village/Town</label>
                                    <div class="col-md-7">
                                        <input id="villagetown" type="text"
                                            class="form-control @error('villagetown') is-invalid @enderror"
                                            name="villagetown" value="{{ session('nextkin.villagetown') }}" required
                                            autocomplete="villagetown" autofocus style="text-transform: capitalize;">

                                        @error('villagetown')
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
                                            value="{{ session('nextkin.address') }}" required autocomplete="address" rows="5" id="address"
                                            autocomplete="address" style="text-transform: capitalize;"> {{ session('nextkin.address') }}
                                        </textarea>

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="float-left mx-5">
                            <a href="{{ route('backnext') }}" class="btn btn-primary"> Back </a>
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
