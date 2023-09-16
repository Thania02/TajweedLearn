<div class="modal-header">
    <h4 class="modal-title">Add User</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data" onsubmit="return cekdata()">
        @csrf
        <div class="form-group">
            <label for="exampleInputNama">Name</label>
            <input type="text" class="form-control" id="exampleInputNama" name="name" placeholder="Input Name" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail" name="email" placeholder="Input Email" required>
        </div>
        <div class="form-group">
            <label for="exampleInputUsername">Username</label>
            <input type="text" class="form-control" id="exampleInputUsername" name="username" placeholder="Input Username" required>
        </div>
        <div class="form-group">
            <label for="exampleInputlevel">level</label>
            <select class="custom-select rounded-0" id="exampleInputlevel" name="level" required>
                <option value="">--- Choose level ---</option>
                <option value="student">student</option>
                <option value="admin">admin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <div class="input-group mb-3">
                <input type="password" id="inputPassword" name="password" minlength="8" class="form-control" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text" onclick="toggle('inputPassword')">
                        <span class="fas fa-lock" id="lock"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="RetypePassword">Confirm Password</label>
            <div class="input-group mb-3">
                <input type="password" id="RetypePassword" class="form-control" minlength="8" name="password_confirmation" placeholder="Confirm password">
                <div class="input-group-append">
                    <div class="input-group-text" onclick="toggle1('RetypePassword')">
                        <span class="fas fa-lock" id="lock1"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>