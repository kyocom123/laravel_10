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
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm ms-auto">Thêm mới</a>
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
                                            <td class="align-middle text-center">
                                                <div class="dropdown">
                                                    <a class="btn btn-link text-secondary mb-0" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="actions_{{bcrypt($role->id)}}">
                                                        <i class="fas fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                                    </a>
    
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="actions_{{bcrypt($role->id)}}">
                                                        <a class="dropdown-item" href="{{ route('roles.show', $role->id) }}"><i class="fas fa-eye me-1"></i> Show</a>
                                                        <a class="dropdown-item" href="{{ route('roles.edit', $role->id) }}"><i class="fas fa-pencil-alt me-1"></i> Edit</a>
                                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!} {!! Form::button("<i class='fas fa-trash-alt me-1'></i> Delete", ['type' => 'submit', 'class' => 'dropdown-item']) !!} {!! Form::close() !!}
                                                    </div>
                                                </div>
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