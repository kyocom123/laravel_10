@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Cập nhật thông tin người đùng', 'page' => ['name'=> 'Danh sách người dùng', 'url'=>'users.index']])
    <div class="row mt-4 mx-4">
        <div class="col-12 col-lg-8 m-auto">
            <div class="card mb-8">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Cập nhật thông tin người đùng</h6>
                        <a href="{{ route('users.index') }}" class="btn btn-dark btn-sm ms-auto"><i class="fas fa-arrow-left me-1" aria-hidden="true"></i>Quay lại</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Username</label>
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ $user->username }}" readonly>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $user->email }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Firstname</label>
                                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" id="firstname" value="{{ $user->firstname }}">
                                            @error('firstname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Lastname</label>
                                            <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" id="lastname" value="{{ $user->lastname }}">
                                            @error('lastname')
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
                                    <label class="form-control-label">Role</label>
                                    <select name="roles[]" id="roles" class="form-control @error('roles') is-invalid @enderror">
                                        @foreach($roles as $key=>$role)
                                            <option value="{{ $key }}" @if($key == $user->role) @selected(true) @endif>{{ $role }}</option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="form-check form-switch ps-0">
                                        <label class="form-control-label mb-0" for="statusSwitchCheck">Trạng thái</label>
                                        <input class="form-check-input ms-0 mt-0 ms-3" type="checkbox" id="statusSwitchCheck" checked="true">
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

@push('js')
    <script>
        if (document.getElementById('roles')) {
            var select = document.getElementById('roles');
            const example = new Choices(select, {
                searchEnabled: false
            });
        }
    </script>
@endpush