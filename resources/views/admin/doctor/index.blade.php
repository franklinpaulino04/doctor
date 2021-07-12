@extends('admin.layouts.master');

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Doctors</h5>
                    <span>list of all doctors</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Doctors</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Index</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="row">
                <div class="col-md-10">
                    <div class="card-header"><h3>Doctors</h3></div>
                </div>
                <div class="col-md-2" style="margin-top: 24px; text-align: right; margin-left: -24px;">
                    <a href="{{ URL::to('doctor/create') }}" class="btn btn-primary">Add Doctor</a>
                </div>
            </div>
            <div class="card-body">
                <table id="dt-doctors" class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th class="nosort">Avatar</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone number</th>
                        <th class="nosort">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($users) > 0)
                        @foreach($users AS $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td><img src="{{ asset('images/users/'.$user->image) }}" class="table-user-thumb" alt=""></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>
                                <div class="table-actions">
                                    <a href="javascript:void(0);" class="modal_trigger" data-url="{{ URL::to('doctor/'.$user->id) }}" data-toggle="modal" data-target="#user-show"><i class="ik ik-eye"></i></a>
                                    <a href="{{ URL::to('doctor/'.$user->id) }}/edit"><i class="ik ik-edit-2"></i></a>
                                    <a href="javascript:void(0);" class="trigger_delete" data-url="{{ URL::to('doctor/destroy/'.$user->id) }}"><i class="ik ik-trash-2"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">not data</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
