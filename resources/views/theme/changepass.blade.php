<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="changePassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="{{ route('change.password') }}" enctype="multipart/form-data">
                <div class="modal-body col-lg">
                    @csrf
                    <div class="form-group" id="">
                        <label for="name">New Passwowrd:</label>
                        <div>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" required>
                        
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="float-left">
                        <button type="submit" class="btn btn-primary" style="color: white;">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
