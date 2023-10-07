@extends('layouts.admin')
@section('title', 'Rider Entry')
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
            <div class="card-header">Rider Information</div>
            <form method="POST" action="{{ route('postRider') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="text" hidden value="{{ session('rider.id') }}" name="id">
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-sm">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="firstname" class="col-md-4 col-form-label text-md-right">First Name</label>
                                    <div class="col-md-7">
                                        <input id="firstname" type="text"
                                            class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                            value="{{ session('rider.firstname') }}" required autocomplete="firstname"
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
                                            value="{{ session('rider.middlename') }}" required autocomplete="name" autofocus
                                            style="text-transform: capitalize;">

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
                                            value="{{ session('rider.surname') }}" required autocomplete="name" autofocus
                                            style="text-transform: capitalize;">

                                        @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nickname" class="col-md-4 col-form-label text-md-right">Nick Name</label>
                                    <div class="col-md-7">
                                        <input id="nickname" type="text"
                                            class="form-control @error('nickname') is-invalid @enderror" name="nickname"
                                            value="{{ session('rider.nickname') }}" required autocomplete="nickname"
                                            autofocus style="text-transform: capitalize;">

                                        @error('nickname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <!-- <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label> -->
                                    {{ Form::label('status', 'Rider Status', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                                    <div class="radio col-form-label ml-2">
                                        {{ Form::radio('status', 'active', isset($rider->status) && $rider->status == 'active' ? 'checked' : 'true', ['id' => 'active']) }}
                                        {{ Form::label('label', 'Active') }}
                                        <!-- <label><input type="radio" name="gender" value="male" checked>Male</label> -->
                                    </div>
                                    <div class="radio col-form-label ml-5">
                                        {{ Form::radio('status', 'part', isset($rider->status) && $rider->status == 'part' ? 'checked' : '', ['id' => 'part']) }}
                                        {{ Form::label('label', 'Part-Time') }}

                                        <!-- <label><input type="radio" name="gender" value="female">Female</label> -->
                                    </div>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row parttime" id="parttime">
                                    <label for="parttime_details" class="col-md-4 col-form-label text-md-right">Part-Time
                                        Details:</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control  @error('parttime_details') is-invalid @enderror" name="parttime_details"
                                            value={{ session('rider.parttime_details') }} required autocomplete="parttime_details" rows="2"
                                            id="parttime_details" required autocomplete="parttime_details" style="text-transform: capitalize;">
                                        </textarea>

                                        @error('parttime_details')
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
                                    {{ Form::label('martialstatus', 'Marital Status', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                                    <div class="col-md-7">
                                        {{ Form::select('martialstatus', ['Married' => 'Married', 'Single' => 'Single', 'Divorce' => 'Divorce', 'Widower' => 'Widower'], 'Married', ['class' => 'form-control']) }}
                                    </div>
                                    @error('martialstatus')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="dob" class="col-md-4 col-form-label text-md-right">Date of
                                        Birth</label>
                                    <div class='input-group date col-md-7' id='dob'>
                                        <input type="date" id="dob"
                                            class="form-control @error('dob') is-invalid @enderror" name="dob"
                                            value="{{ session('rider.dob') }}">

                                    </div>
                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group row">
                                    <label for="profilepic" class="col-md-4 col-form-label text-md-right">Profile
                                        Image</label>
                                    <div class="col-md-7">
                                        <div class="form-group custom-file">
                                            <input type="file" id="profile" class="form-control-file"
                                                id="profilepic" aria-describedby="fileHelp" name="profilepic"
                                                accept=".png, .jpg, .jpeg">
                                        </div>
                                        @if (session()->has('rider.profilepic'))
                                            <img id="profilepic" class="rounded mt-2" alt="profile Image"
                                                src="/storage/{{ session('rider.profilepic') }}" width="150"
                                                height="150" />
                                        @else
                                            <img id="profilepic" class="rounded mt-2" alt="profile Image"
                                                src="{!! asset('img/user.png') !!}" width="150" height="150" />
                                        @endif
                                    </div>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nationality"
                                        class="col-md-4 col-form-label text-md-right">Nationality</label>
                                    <div class="col-md-7">
                                        <select id="country" class="selectpicker countrypicker form-control"
                                            data-live-search="true" data-default="NG" name="nationality">
                                        </select>
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
                                                    {{ $state->name == session('rider.stateoforigin') ? 'selected' : '' }}>
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
                                                    {{ $lga->name == session('rider.lga') ? 'selected' : '' }}>
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
                                    <label for="placebirth" class="col-md-4 col-form-label text-md-right">Place of
                                        Birth</label>
                                    <div class="col-md-7">
                                        <input id="placeofbirth" type="text"
                                            class="form-control @error('placeofbirth') is-invalid @enderror"
                                            name="placeofbirth" value="{{ session('rider.placeofbirth') }}" required
                                            autocomplete="placeofbirth" autofocus style="text-transform: capitalize;">
                                        @error('Place of birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bvn" class="col-md-4 col-form-label text-md-right">BVN</label>

                                    <div class="col-md-7">
                                        <input id="bvn" type="text"
                                            class="form-control @error('bvn') is-invalid @enderror" name="bvn"
                                            value="{{ session('rider.bvn') }}" required autocomplete="bvn">

                                        @error('BVN')
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
                                            class="form-control @error('phonenumber') is-invalid @enderror"
                                            name="phonenumber" value="{{ session('rider.phonenumber') }}">
                                        @error('phonenumber')
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
                                            name="housenumname" value="{{ session('rider.housenumname') }}" required
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
                                            name="streetname" value="{{ session('rider.streetname') }}" required
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
                                            name="villagetown" value="{{ session('rider.villagetown') }}" required
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
                                            value="{{ session('rider.address') }}" required autocomplete="address" rows="5" id="address" required
                                            autocomplete="address" style="text-transform: capitalize;"> {{ session('rider.address') }} 
                                    </textarea>

                                        @error('Address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mx-5 mb-2">
                        <button type="submit" class="btn btn-primary">
                            Next
                        </button>
                    </div>

                </div>
            </form>
        </div>
        <!-- /.container-fluid -->

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("div.parttime").hide();
            $("textarea#parttime_details").val('Full Time');
            $('#part').click(function() {
                console.log('show part');
                $("div.parttime").show();
            });
            $('#active').click(function() {
                $("div.parttime").hide();
            });
        });
    </script>
    <!-- End of Main Content -->

    <!-- Footer -->

@endsection
