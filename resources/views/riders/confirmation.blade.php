@extends('layouts.admin')

@section('content')
<div id="content">

    <!-- Topbar -->
    @include('theme.nav')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card-header">Rider Information Review</div>
        <p>{{  \Session::get('rider')}}</p>
        <p>{{  \Session::get('bike')}}</p>
        <p>{{  \Session::get('nextkin')}}</p>
        <p>{{  \Session::get('other')}}</p>
        <form method="POST" action="{{ route('saverider') }}">
            {{ csrf_field() }}


            <div class="form-group ">
                <div class="float-left mx-5">
                    <a href="{{ route('confirmback') }}" class="btn btn-primary"> Back </a>
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