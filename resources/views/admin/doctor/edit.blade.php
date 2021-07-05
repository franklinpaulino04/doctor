@extends('admin.layouts.master');

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Doctors</h5>
                        <span>edit doctor</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ URL::to('doctor') }}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header"><h3>Edit doctor / {{ $user->name }}</h3></div>
                <div class="card-body">
                    <form action="{{ route('doctor.update', $user->id) }}" method="post" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label for="">Full name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="doctor name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" placeholder="doctor email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label for="">Password</label>
                                <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" placeholder="doctor password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">Gender</label>
                                <select name="gender_id" class="form-control @error('gender_id') is-invalid @enderror">
                                    @foreach($genders as $gender)
                                        <option value="{{ $gender->id }}" {{ ($gender->id == $user->gender_id )? 'selected' : '' }}> {{ $gender->name }} </option>
                                    @endforeach
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label for="">Education</label>
                                <input type="text" name="education" value="{{ $user->education }}" class="form-control @error('education') is-invalid @enderror" placeholder="doctor education">
                                @error('education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">Address</label>
                                <input type="text" name="address" value="{{ $user->address }}" class="form-control @error('address') is-invalid @enderror" placeholder="doctor address">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label for="">Specialist</label>
                                <input type="text" name="department" value="{{ $user->department }}" class="form-control @error('department') is-invalid @enderror" placeholder="doctor department">
                                @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">Phone number</label>
                                <input type="text" name="phone_number" value="{{ $user->phone_number }}" class="form-control @error('phone_number') is-invalid @enderror" placeholder="doctor phone number">
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">Rules</label>
                                <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                    <option value="0"> please select role </option>
                                    @foreach($rules as $role)
                                        <option value="{{ $role->id }}" {{ ($role->id == $user->role_id )? 'selected' : '' }}> {{ $role->name }} </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="4" name="description">
                                {{ $user->description }}
                            </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ URL::to('doctor') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
