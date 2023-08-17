@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Role Management'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-with-icon text-white">
                        <span class="alert-icon"><i class="fa fa-check"></i></span>
                        <span data-notify="icon" class="tim-icons icon-trophy"></span>
                        <span>{{ $message }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h6>Roles</h6>
                            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm ms-auto">Thêm mới</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="280px">Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-sm font-weight-bold mb-0">{{ ++$i }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $role->name }}</p>
                                            </td>
                                            <td class="text-sm align-middle text-center">
                                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-link mb-1 px-0" data-bs-toggle="tooltip" data-bs-original-title="Preview">
                                                    <i class="fas fa-eye text-secondary" aria-hidden="true"></i>
                                                </a>

                                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-link mb-1 px-0 mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                    <i class="fas fa-user-edit text-secondary" aria-hidden="true"></i>
                                                </a>

                                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!} 
                                                    {!! Form::button(
                                                        "<i class='fas fa-trash text-secondary' aria-hidden='true'></i>", 
                                                        [
                                                            'type' => 'submit', 
                                                            'class' => 'btn btn-link mb-1 mx-0 px-0', 
                                                            'data-bs-toggle' => 'tooltip',
                                                            'data-bs-original-title'=>'Delete' 
                                                        ]
                                                    )!!} 
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        {{ $roles->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection