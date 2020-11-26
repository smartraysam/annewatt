@extends('layouts.admin')
@section('title', 'Message')
@section('content')
    <div id="content">
        <!-- Topbar -->
        @include('theme.nav')
        <!-- Begin Page Content -->
        <p></p>
        <div class="container-fluid">
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email Address</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email Address</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-msg" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="msgsubject"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h6 class="text-justify" id="msgbody"></h6>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="float-right">
                                <a data-dismiss="modal" class="btn btn-primary" style="color: white;">Close</a>
                            </div>
                        </div> {{-- Close Modal footer --}}
                    </div>


                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        // var SITEURL = '{{ URL::to('
        // ') }}';
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/inbox",
                    type: 'GET',
                },
                columns: [

                    {
                        data: 'name',
                        name: 'messages.name',

                    },
                    {
                        data: 'email',
                        name: 'messages.email',

                    },

                    {
                        data: 'subject',
                        name: 'messages.subject',

                    },


                    {
                        data: 'message',
                        name: 'messages.message',

                    },
                    {
                        data: 'read_status',
                        name: 'messages.read_status'
                    },

                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
                order: [
                    [5, 'asc']
                ]
            });

            /* When click edit user */
            $('body').on('click', '.view-msg', function() {
                var _id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "/inbox/" + _id + '/read',
                    success: function(data) {
                        var subject = data[0].subject;
                        var body = data[0].message;
                        $('#msgbody').text(body);
                        $('#msgsubject').text(subject);
                        $("#modal-msg").modal("show");
                    }
                })
            });
            $('body').on('click', '.delete-msg', function() {
                var _id = $(this).data('id');
                if (confirm("Are you sure you want to Delete this data?")) {
                    $.ajax({
                        type: "POST",
                        url: "/inbox/" + _id + '/delete',
                        success: function(data) {
                            console.log(data);
                            alert(data);
                            $('#dataTable').DataTable().ajax.reload();
                        }
                    })
                } else {
                    return false;
                }
            });
        });

    </script>


@endsection
