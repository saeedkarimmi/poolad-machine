@extends('cms::theme-inspinia.layouts.master')

@section('page-title'){{ trans('test') }}@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form class="inline" method="post" data-type="ajax-form"  action="{{ route('panel.roles.update' , $role->id) }}">
                    @csrf
                    @method('patch')
                    <div class="alert alert-warning hidden"></div>
                    <div class="form-group inline wow fadeInUp faster" data-wow-delay="0s">
                        <label for="name">{{ trans('role.form.name') }}</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ $role->name }}" disabled>
                    </div>
                    <div class="form-group inline">
                        <div class="form-group inline checkbox-group-list">
                            <div class="checkbox-list">
                                @foreach($permissions as $id => $permission)
                                    <div class="custom-checkbox nice">
                                        <label for="permissions{{ $id }}">{{ trans('permission.' . $permission) }}</label>
                                        <input type="checkbox" name="permissions[]" id="permissions{{ $id }}" value="{{ $id }}" {{ in_array($id , $rolePermissions) ? 'checked' :'' }} />
                                        <label for="permissions{{ $id }}"></label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="text-center wow fadeIn faster" data-wow-delay="0.1s">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('panel.roles.index') }}" class="btn btn-purple svg-wrapper purple">
                            {{ trans('role.form.back') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
