<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="loginModal">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control">
                </div>
                <div class="alert alert-danger d-none" role="alert">Incorrect username or password</div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="token" value="{{ csrf_token() }}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button id="loginbutton" type="button" class="btn btn-primary">Login <i class="fa fa-angle-double-right"></i></button>
            </div>
        </div>
    </div>
</div>