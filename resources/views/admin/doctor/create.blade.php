@extends('admin.layouts.master');

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Doctors</h5>
                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h3>Add doctor</h3>
                </div>
                <div class="card-body">
                    <form action="" class="forms-sample">
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label for="">Full name</label>
                                <input type="text" name="full_name" class="form-control" placeholder="doctor name">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="doctor email">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="doctor password">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Gender</label>
                                <select name="gender" class="form-control">
                                    <option value=""> please select gender </option>
                                    <option value="male"> Male </option>
                                    <option value="female"> Female </option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label for="">Education</label>
                                <input type="text" name="education" class="form-control" placeholder="doctor education">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="doctor address">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label for="">Specialist</label>
                                <input type="text" name="department" class="form-control" placeholder="doctor department">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Phone number</label>
                                <input type="text" name="phone_number" class="form-control" placeholder="doctor phone number">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label>Image</label>
                                <input type="file" name="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">description</label>
                            <textarea class="form-control" id="description" rows="4" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
