@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Thông tin người đùng', 'page' => ['name'=> 'Danh sách người dùng', 'url'=>'users.index']])
    <div class="row mt-4 mx-4">
        <div class="col-12 col-lg-8 m-auto">
            <div class="card mb-8">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h5>Thông tin người dùng</h5>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm ms-auto"><i class="fas fa-user-edit me-1" aria-hidden="true"></i> Update</a>
                        <a href="{{ route('users.index') }}" class="btn btn-dark btn-sm ms-3"><i class="fas fa-arrow-left me-1" aria-hidden="true"></i> Quay lại</a>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark me-2">Name:</strong> {{ $user->username }}</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark me-2">Email:</strong> {{ $user->email }}</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark me-2">Firstname:</strong> {{ $user->firstname }}</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark me-2">Lastname:</strong> {{ $user->lastname }}</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark me-2">Address:</strong> {{ $user->address }}</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark me-2">Country:</strong> {{ $user->country }}</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark me-2">City:</strong> {{ $user->city }}</li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark me-2">About:</strong> {{ $user->about }}</li>
                        <li class="list-group-item border-0 ps-0 text-sm">
                            <strong class="text-dark me-2">Roles:</strong>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge bg-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection