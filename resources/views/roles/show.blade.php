@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Role', 'page' => ['name'=> 'Role Management', 'url'=>'roles.index']])
    <div class="row mt-4 mx-4">
        <div class="col-12 col-lg-8 m-auto">
            <div class="card mb-8">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h5>Show Role</h5>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm ms-auto"><i class="fas fa-user-edit me-1" aria-hidden="true"></i> Update</a>
                        <a href="{{ route('roles.index') }}" class="btn btn-dark btn-sm ms-3"><i class="fas fa-arrow-left me-1" aria-hidden="true"></i> Quay lại</a>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark me-2">Name:</strong> {{ $role->name }}</li>
                        <li class="list-group-item border-0 ps-0 text-sm">
                            <strong class="text-dark me-2">Permissions:</strong>
                            @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                    <label class="label label-success">{{ $v->name }},</label>
                                @endforeach
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection