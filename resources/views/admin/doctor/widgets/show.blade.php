<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="demoModalLabel">Show user / {{ $user->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('images/users/'.$user->image) }}" class="img-fluid rounded" width="150" />
                            <h4 class="card-title mt-10">{{ $user->name }}</h4>
                            <p class="card-subtitle">Front End Developer</p>
                            <div class="row text-center justify-content-md-center">
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-user"></i> <font class="font-medium">254</font></a></div>
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-image"></i> <font class="font-medium">54</font></a></div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <small class="text-muted d-block">Rule </small>
                                <h6 class="badge badget-pill badge-dark">{{ $user->role->name }}</h6>
                                <small class="text-muted d-block">Email address </small>
                                <h6>{{ $user->email }}</h6>
                                <small class="text-muted d-block pt-10">Phone</small>
                                <h6>{{ $user->phone_number }}</h6>
                                <small class="text-muted d-block pt-10">Address</small>
                                <h6>{{ $user->address }}</h6>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted d-block pt-10">Department</small>
                                <h6>{{ $user->department }}</h6>
                                <small class="text-muted d-block pt-10">Education</small>
                                <h6>{{ $user->education }}</h6>
                                <small class="text-muted d-block">Description </small>
                                <h6>{{ $user->email }}</h6>
                            </div>
                        </div>
                        <small class="text-muted d-block pt-30">Social Profile</small>
                        <br/>
                        <button class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></button>
                        <button class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></button>
                        <button class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
