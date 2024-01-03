@extends('layouts.admin')
@section('title', 'Compose')
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
        <!-- Begin Page Content -->
        <p></p>
        <div class="container-fluid">
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Compose message</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sendmsg') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-lg-6" style="margin: 0 auto">
                                <div class="form-group">
                                    <label for="group" class="">Select Group Type</label>
                                    <select name="group" id="group" class="form-control">
                                        <option value="" selected="selected">- Select -</option>
                                        <option value="general">General</option>
                                        <option value="individual">Individual</option>
                                    </select>

                                </div>
                                <div class="form-group" id="phonegroup">
                                    <label for="phone" class="">Enter phone number</label>
                                    <div>
                                        <input id="phone" name="phone" type="tel" class="form-control" value="""
                                                                    autocomplete=" phone" autofocus pattern="[0-9]{11}"
                                            placeholder="07064536752">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" name="message" value="" required rows="10" id="message"
                                        required></textarea>

                                </div>
                                <button type="submit" id="butsend" class="btn btn-primary">
                                    Send
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#phonegroup").hide();
            $("#butsend").prop("disabled", true);

            $("#group").change(function() {
                var id = $("#group")
                    .find(":selected")
                    .val();
                if (id == "individual") {
                    $("#phonegroup").show();
                    $("#phone").prop('required', true);

                } else {
                    $("#phonegroup").hide();
                    $("#phone").prop('required', false);
                }
            });
            $("#message").on('change keyup paste', function() {
                if ($.trim($('#message').val()).length < 1) {
                    $("#butsend").prop("disabled", true);
                } else {
                    $("#butsend").prop("disabled", false);
                }
            });

        });

    </script>


@endsection
