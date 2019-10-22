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
        <div class="card-header">Next of Kin Information</div>
        <form method="POST" action="{{ route('postNextkin') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
                <div class="row justify-content-center">
                    <div class="col-sm">
                        <div class="card-body">

                            <div class="form-group row">
                                <!-- <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label> -->
                                {{Form::label('title', 'Title', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="col-md-7">
                                    {{Form::select('title', ['Mr' => 'Mr', 'Ms' => 'Mrs', 'Mi' => 'Miss'], 'Mr', ['class' => 'form-control'])}}
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
                                        value="{{old('firstname') }}" required autocomplete="firstname" autofocus>

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
                                        value="{{old('middlename')}}" required autocomplete="name" autofocus>

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
                                        value="{{old('surname') }}" required autocomplete="name" autofocus>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label> -->
                                {{Form::label('gender', 'Gender', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="radio col-form-label ml-2">

                                    {{ Form::radio('gender', 'male' , ((isset($rider->gender) && $rider->gender == 'male') ? "checked" : "true" ), ['id' => 'male']) }}
                                    {{Form::label('radio', 'Male')}}
                                    <!-- <label><input type="radio" name="gender" value="male" checked>Male</label> -->
                                </div>
                                <div class="radio col-form-label ml-5">

                                    {{ Form::radio('gender', 'female' , ((isset($rider->gender) && $rider->gender == 'female') ? "checked" : "" ), ['id' => 'female']) }}
                                    {{Form::label('radio', 'Female')}}
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
                                {{Form::label('relationship', 'Relationship', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="col-md-7">
                                    {{Form::select('relationship', ['So' => 'Son', 'D' => 'Daughter', 'B' => 'Brother', 'S' => 'Sister'], 'So', ['class' => 'form-control'])}}
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
                                <label for="state" class="col-md-4 col-form-label text-md-right">State of
                                    Origin</label>
                                <div class="col-md-7">
                                    <select name="stateoforigin" id="state" class="form-control">
                                        <option value="" selected="selected">- Select -</option>
                                        <option value="Abia">Abia</option>
                                        <option value='Adamawa'>Adamawa</option>
                                        <option value='AkwaIbom'>AkwaIbom</option>
                                        <option value='Anambra'>Anambra</option>
                                        <option value='Bauchi'>Bauchi</option>
                                        <option value='Bayelsa'>Bayelsa</option>
                                        <option value='Benue'>Benue</option>
                                        <option value='Borno'>Borno</option>
                                        <option value='Cross River'>Cross River</option>
                                        <option value='Delta'>Delta</option>
                                        <option value='Ebonyi'>Ebonyi</option>
                                        <option value='Edo'>Edo</option>
                                        <option value='Ekiti'>Ekiti</option>
                                        <option value='Enugu'>Enugu</option>
                                        <option value='Gombe'>Gombe</option>
                                        <option value='Imo'>Imo</option>
                                        <option value='Jigawa'>Jigawa</option>
                                        <option value='Kaduna'>Kaduna</option>
                                        <option value='Kano'>Kano</option>
                                        <option value='Katsina'>Katsina</option>
                                        <option value='Kebbi'>Kebbi</option>
                                        <option value='Kogi'>Kogi</option>
                                        <option value='Kwara'>Kwara</option>
                                        <option value='Lagos'>Lagos</option>
                                        <option value='Nasarawa'>Nasarawa</option>
                                        <option value='Niger'>Niger</option>
                                        <option value='Ogun'>Ogun</option>
                                        <option value='Ondo'>Ondo</option>
                                        <option value='Osun'>Osun</option>
                                        <option value='Oyo'>Oyo</option>
                                        <option value='Plateau'>Plateau</option>
                                        <option value='Rivers'>Rivers</option>
                                        <option value='Sokoto'>Sokoto</option>
                                        <option value='Taraba'>Taraba</option>
                                        <option value='Yobe'>Yobe</option>
                                        <option value='Zamfara'>Zamafara</option>
                                        <option value='Others'>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="localorigin" class="col-md-4 col-form-label text-md-right">LGA of
                                    Origin</label>
                                <div class="col-md-7">
                                    <select name="lga" id="lga" class="form-control" required>
                                        <option value="{{old('lga') }}">{{old('lga') }}</option>
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
                                        name="kinphonenumber" value="{{ old('kinphonenumber') }}">
                                    @error('kinphonenumber')
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
                                    <textarea class="form-control  @error('address') is-invalid @enderror"
                                        name="address" value={{ old('address') }} required autocomplete="address"
                                        rows="5" id="address" required autocomplete="address">
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