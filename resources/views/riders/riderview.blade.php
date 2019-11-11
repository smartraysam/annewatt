@extends('layouts.admin')

@section('content')
<div id="content">

    <!-- Topbar -->
    @include('theme.nav')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Last Active Date
                                </div>
                                @forelse ($ticketData as $tData)
                                @if ($loop->first)
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="lastactive">
                                    {{$tData->collectiondate}}
                                </div>
                                @endif
                                @empty
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="lastactive">
                                    Nill</div>
                                @endforelse
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">

            </div>
            <div class="col-xl-3 col-md-6 mb-4">


            </div>
            <!-- Pending Requests Card Example -->

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Tickets Paid
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="lastactive">
                                    {{$ticketCount}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form>
            {{ csrf_field() }}
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Rider Details</h6>
                </a>
                @foreach($riderData as $rider)
                @if ($loop->first)
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body justify-content-center">

                        <div class="row">
                            <div style="text-align: left" class="justify-content-left col">
                                <br>
                                <br>
                                <br>
                                <h4>Rider Identification Number: {{$rider->riderid}}</h4>
                            </div>
                            <div style="text-align: right" class="justify-content-right col mr-5">
                                @if(isset($rider->profilepic))
                                <img id="profilepic" class="rounded mt-2 my-2" alt="profile Image"
                                    src="/storage/{{$rider->profilepic}}" width="150" height="150" />
                                @else
                                <img id="profilepic" class="rounded mt-2" alt="profile Image"
                                    src="{!! asset('img/user.png') !!}" width="150" height="150" />
                                @endif
                            </div>

                        </div>
                        <table class="table">
                            <tr>
                                <td>Rider Name:</td>
                                <td style="text-transform: capitalize;"><strong>{{$rider->surname}}
                                        {{$rider->middlename}}
                                        {{$rider->firstname}}</strong></td>
                            </tr>
                            <tr>
                                <td>Nick Name:</td>
                                <td style="text-transform: capitalize;"><strong>{{$rider->nickname}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Rider Status:</td>
                                <td style="text-transform: capitalize;"><strong>{{$rider->status}}</strong>
                                </td>
                            </tr>
                            @if($rider->status == 'part')
                            <tr>
                                <td>Part-Time Details:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>
                                        <div style=" word-wrap: break-word; width: 250px;"> {{$rider->parttime_details}}
                                        </div>
                                    </strong>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td>Gender:</td>
                                <td style="text-transform: capitalize;"><strong>{{$rider->gender}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Martial Status:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$rider->martialstatus}}</strong></td>
                            </tr>
                            <tr>
                                <td>Date of Birth:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$rider->dob}}</strong></td>
                            </tr>
                            <tr>
                                <td>Nationality:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$rider->nationality}}</strong></td>
                            </tr>
                            <tr>
                                <td>State of Origin:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$rider->stateoforigin}}</strong></td>
                            </tr>
                            <tr>
                                <td>Local Government Area:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$rider->lga}}</strong></td>
                            </tr>
                            <tr>
                                <td>Place of Birth:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$rider->placeofbirth}}</strong></td>
                            </tr>
                            <tr>
                                <td>Bank Verification Number:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$rider->bvn}}</strong></td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$rider->phonenumber}}</strong></td>
                            </tr>
                            <tr>
                                <td>Contact Address:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>
                                        <div style=" word-wrap: break-word; width: 250px;">{{$rider->address}}</div>
                                    </strong></td>
                            </tr>
                            <tr>
                                <td>House No./Name:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$rider->housenumname}}</strong></td>
                            </tr>
                            <tr>
                                <td>Street Name:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$rider->streetname}}</strong></td>
                            </tr>
                            <tr>
                                <td>Village/Town:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$rider->villagetown}}</strong></td>
                            </tr>
                        </table>

                    </div>
                </div>
                @endif
                @endforeach
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Bike Details</h6>
                </a>
                <!-- Card Content - Collapse -->
                @foreach($riderData as $bike)
                @if ($loop->first)
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Bike Brand:</td>
                                <td style="text-transform: capitalize;"><strong>{{$bike->bikebrand}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Engine Number:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$bike->enginenumber}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Chassis Number:</td>
                                <td style="text-transform: capitalize;"><strong>{{$bike->chasisno}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Registration No.:</td>
                                <td style="text-transform: uppercase;">
                                    <strong>{{$bike->registrationnum}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Purchase Receipt No.:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$bike->receiptnumber}}</strong></td>
                            </tr>
                            <tr>
                                <td>Date of
                                    Purchase:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$bike->dateofpurchase}}</strong></td>
                            </tr>
                            <tr>
                                <td>Witness Name:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$bike->witnessname}}</strong></td>
                            </tr>
                            <tr>
                                <td>Witness Address:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>
                                        <div style=" word-wrap: break-word; width: 250px;">{{$bike->witnessaddress}}
                                        </div>
                                    </strong></td>

                            </tr>

                            <tr>
                                <td>WitnessPhone Number:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$bike->witnessphonenum}}</strong></td>
                            </tr>

                        </table>
                    </div>
                </div>
                @endif
                @endforeach
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Next of Kin Details</h6>
                </a>
                <!-- Card Content - Collapse -->
                @foreach($nextkinData as $nxt)
                @if ($loop->first)
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Title:</td>
                                <td style="text-transform: capitalize;"><strong>{{$nxt->title}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Full Name:</td>
                                <td style="text-transform: capitalize;"><strong>{{$nxt->surname}} {{$nxt->firstname}}
                                        {{$nxt->middlename}}</strong></td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td style="text-transform: capitalize;"><strong>{{$nxt->gender}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Relationship:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$nxt->relationship}}</strong></td>
                            </tr>
                            <tr>
                                <td>Bank Verification Number:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$nxt->bvn}}</strong></td>
                            </tr>

                            <tr>
                                <td>State of Origin:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$nxt->stateoforigin}}</strong></td>
                            </tr>
                            <tr>
                                <td>Local Government Area:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$nxt->lga}}</strong></td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$nxt->kinphonenumber}}</strong></td>
                            </tr>
                            <tr>
                                <td>Contact Address:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>
                                        <div style=" word-wrap: break-word; width: 250px;">{{$nxt->address}}</div>
                                    </strong></td>

                            </tr>
                            <tr>
                                <td>House No./Name:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$nxt->housenumname}}</strong></td>
                            </tr>
                            <tr>
                                <td>Street Name:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$nxt->streetname}}</strong></td>
                            </tr>
                            <tr>
                                <td>Village/Town:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$nxt->villagetown}}</strong></td>
                            </tr>


                        </table>
                    </div>
                </div>
                @endif
                @endforeach
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Other Details</h6>
                </a>
                <!-- Card Content - Collapse -->
                @foreach($riderData as $other)
                @if ($loop->first)
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Unit Park Name:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$other->unitparkname}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Chairman Name:</td>
                                <td style="text-transform: capitalize;"><strong>{{$other->chairmanname}}
                                    </strong></td>
                            </tr>
                            <tr>
                                <td>Chairman Phone No.:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$other->chairmanphoneno}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Rider Identification Number:</td>
                                <td style="text-transform: capitalize;">
                                    <strong>{{$other->riderid}}</strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="form-group row h-100 justify-content-center align-items-center">
                <div class="float-left mx-5">
                    <a href="{{ route('home') }}" class="btn btn-primary"> Back </a>
                </div>

            </div>
        </form>
    </div>
</div>


@endsection