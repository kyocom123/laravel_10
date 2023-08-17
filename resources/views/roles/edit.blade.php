@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Role', 'page' => ['name'=> 'Role Management', 'url'=>'roles.index']])
    <div class="row mt-4 mx-4">
        <div class="col-12 col-lg-8 m-auto">
            <div class="card mb-8">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Edit Role</h6>
                        <a href="{{ route('roles.index') }}" class="btn btn-dark btn-sm ms-auto"><i class="fas fa-arrow-left me-1" aria-hidden="true"></i>  Quay lại</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" id="id" value="{{ $role->id }}">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $role->name }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Permission:</strong>
                                    <input type="hidden" class="form-control @error('permission') is-invalid @enderror" name="permission" id="permission">
                                    @error('permission')
                                        <span class="invalid-feedback inline" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <br/>
                                    @foreach($permission as $value)
                                        <div class="form-check">
                                            {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'form-check-input')) }}
                                            <label class="custom-control-label" for="customCheck1">{{ $value->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="form-check form-switch ps-0">
                                        <label class="form-control-label mb-0" for="status">Trạng thái</label>
                                        <input class="form-check-input ms-0 mt-0 ms-3" type="checkbox" name='status' id="status" value="{{ $menu->status }}" @if($role->status) checked @endif>
                                    </div>
                                </div>
                            </div>

                            <div class="button-row d-flex mt-4">
                                <button type="submit" class="btn btn-primary ms-auto mb-0 js-btn-next">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection