@extends('admin.layouts.app')
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/vendors/css/extensions/sweetalert2.min.css") }}">
@endsection
@section('page-style-rtl')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-rtl/plugins/extensions/ext-component-sweet-alerts.css") }}">
@endsection
@section('page-style-ltr')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-ltr/plugins/extensions/ext-component-sweet-alerts.css") }}">
@endsection
@section('title',__(array_key_last($breadcrumbs)))
@section('breadcrumb')
    <x-admin.breadcrumb :breadcrumbs="$breadcrumbs"/>
@endsection
@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Edit User')}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <form class="mt-2" action="{{ route('admin.users.update',$user->id) }}" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-4">
                                        <x-admin.input name="name" :label="__('Full Name')" tabindex="1" :value="$user->name"/>
                                    </div>
                                    <div class="col-md-4">
                                        <x-admin.input name="email" :label="__('Email')" tabindex="2" :value="$user->email"/>
                                    </div>
                                    <div class="col-md-4">
                                        <x-admin.input name="phone" :label="__('Phone Number')" tabindex="3" :value="$user->phone"/>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">{{ __('Status') }}</label>
                                            <select name="status" id="status" class="form-control" tabindex="4">
                                                <option @if($user->status=='Enable') selected @endif value="Enable">{{ __('Enable') }}</option>
                                                <option @if($user->status=='Disable') selected @endif value="Disable">{{ __('Disable') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="role">{{ __('Role') }}</label>
                                            <select name="role" id="role" class="form-control" tabindex="5">
                                                <option @if($user->role=='User') selected @endif value="User">{{ __('User') }}</option>
                                                <option @if($user->role=='Author') selected @endif value="Author">{{ __('Author') }}</option>
                                                <option @if($user->role=='Admin') selected @endif value="Admin">{{ __('Admin') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-{{ $user->image ? '6' : '12' }}">
                                                <x-admin.input name="image" :label="__('Image')" :placeholder="__('Choose Image')" type="file" tabindex="6"/>
                                            </div>
                                            @if($user->image)
                                                <div class="col-md-2">
                                                    <div class="avatar avatar-xl">
                                                        <img src="{{ asset($user->image) }}" alt="avatar">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <a class="btn btn-outline-primary btn-sm waves-effect round" href="{{ route('admin.users.removeImage',$user->id) }}">{{ __('Delete') }}</a>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <x-admin.input name="password" :label="__('Password')" type="password" tabindex="7"/>
                                            </div>
                                            <div class="col-md-4">
                                                <x-admin.input name="password_confirmation" :label="__('Password Confirmation')" type="password" tabindex="8"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                        <input type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1" value="{{__('Update')}}">
                                    </div>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('vendor-script')
    <script src="{{ asset('assets/admin/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset('assets/admin/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>
    @if(Session::has('status'))
        <script>
            $(window).on('load', function () {
                Swal.fire({
                    icon: 'success',
                    title: '{{ Session::get('status') }}',
                    showConfirmButton: false,
                    timer: 3000,
                });
            })
        </script>
    @endif
@endsection

