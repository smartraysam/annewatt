@extends('layouts.admin')

@section('content')
<div id="content">

    <!-- Topbar -->
    @include('theme.nav')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card-header">Rider Information Review</div>
        <form method="POST" action="{{ route('saverider') }}">
            {{ csrf_field() }}
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Rider Details</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body justify-content-center">
                        <div style="text-align: center" class="justify-content-center">
                            @if(isset($rider->profilepic))
                            <img id="profilepic" class="rounded mt-2 my-2" alt="profile Image"
                            src="/app/public/{{session('rider.profilepic')}}" width="150" height="150" />
                            @else
                            <img id="profilepic" class="rounded mt-2" alt="profile Image"
                            src="{!! asset('img/user.png') !!}" width="150" height="150" />
                            @endif

                        </div>
                        <table class="table">
                            <tr>
                                <td>Rider Name:</td>
                                <td style="text-transform: capitalize;"><strong>{{session('rider.surname')}}
                                        {{session('rider.firstname')}} {{session('rider.middlename')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Nick Name:</td>
                                <td style="text-transform: capitalize;"><strong>{{session('rider.nickname')}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Rider Status:</td>
                                <td style="text-transform: capitalize;"><strong>{{session('rider.status')}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td style="text-transform: capitalize;"><strong>{{session('rider.gender')}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Martial Status:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('rider.martialstatus')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Date of Birth:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('rider.dob')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Nationality:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('rider.nationality')}}</strong></td>
                            </tr>
                            <tr>
                                <td>State of Origin:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('rider.stateoforigin')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Local Government Area:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('rider.lga')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Place of Birth:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('rider.placeofbirth')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Bank Verification Number:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('rider.bvn')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('rider.phonenumber')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Contact Address:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('rider.address')}}</strong></td>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Bike Details</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Bike Brand:</td>
                                <td style="text-transform: capitalize;"><strong>{{session('bike.bikebrand')}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Engine Number:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('bike.enginenumber')}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Chassis Number:</td>
                                <td style="text-transform: capitalize;"><strong>{{session('bike.chasisno')}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Registration No.:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('bike.registrationnum')}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Purchase Receipt No.:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('bike.receiptnumber')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Date of
                                    Purchase:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('bike.dateofpurchase')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Witness Name:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('bike.witnessname')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Witness Address:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('bike.witnessaddress')}}</strong></td>
                            </tr>

                            <tr>
                                <td>WitnessPhone Number:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('bike.witnessphonenum')}}</strong></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Next of Kin Details</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Title:</td>
                                <td style="text-transform: capitalize;"><strong>{{session('nextkin.title')}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Full Name:</td>
                                <td style="text-transform: capitalize;"><strong>{{session('nextkin.surname')}}
                                        {{session('nextkin.firstname')}} {{session('nextkin.middlename')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td style="text-transform: capitalize;"><strong>{{session('nextkin.gender')}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Relationship:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('nextkin.relationship')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Bank Verification Number:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('nextkin.bvn')}}</strong></td>
                            </tr>

                            <tr>
                                <td>State of Origin:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('nextkin.stateoforigin')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Local Government Area:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('nextkin.lga')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('nextkin.kinphonenumber')}}</strong></td>
                            </tr>
                            <tr>
                                <td>Contact Address:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('nextkin.address')}}</strong></td>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Other Details</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Unit Park Name:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('other.unitparkname')}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Chairman Name:</td>
                                <td style="text-transform: capitalize;"><strong>{{session('other.chairmanname')}}
                                    </strong></td>
                            </tr>
                            <tr>
                                <td>Chairman Phone No.:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('other.chairmanphoneno')}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Rider Identification Number:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{session('other.riderid')}}</strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="form-group row h-100 justify-content-center align-items-center">
                <div class="float-left mx-5">
                    <a href="{{ route('confirmback') }}" class="btn btn-primary"> Back </a>
                </div>
                <div class="float-none mx-5">
                        <a href="{{ route('cancel') }}" class="btn btn-primary"> Cancel </a>
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
