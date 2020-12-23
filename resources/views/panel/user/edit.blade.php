@extends('cms::theme-inspinia.layouts.master')

@section('page-title'){{ trans('general.page-titles.users.edit') }}@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-lg-12">

                {{-- change informations --}}
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-8">
                                <h2>تغییر اطلاعات</h2>
                                <div class="hr-line-dashed"></div>
                                <form class="" method="post" data-type="ajax-form"
                                      action="{{ route('panel.users.update' , $user->id) }}">
                                    @csrf
                                    @method('patch')
                                    <div class="alert alert-warning d-none"></div>
                                    <div class="form-group">
                                        <label for="name">{{ trans('validation.attributes.name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="{{ $user->name }}"
                                               data-persian
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">{{ trans('validation.attributes.last_name') }}</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                               value="{{ $user->last_name }}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ trans('validation.attributes.email') }}</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                               data-english
                                               data-filter="[^a-zA-Z0-9@\._-]"
                                               value="{{ $user->email }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="roles">{{ trans('validation.attributes.roles') }}</label>
                                        <select class="form-control select2" id="roles" name="roles[]" multiple>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{in_array($role->id , $user->getRoleIds()) ? 'selected' : '' }} >{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="active">{{ trans('validation.attributes.status') }}</label>
                                        <div class="i-checks "><label> <input type="radio" {{ $user->active ? "checked":""}} value="1" name="status"> <i></i> {{ trans('validation.attributes.active') }} </label></div>
                                        <div class="i-checks "><label> <input type="radio" {{ $user->active ? "":"checked"}} value="0" name="status"> <i></i> {{ trans('validation.attributes.inactive') }} </label></div>
                                    </div>
                                    <div class="text-center wow fadeIn faster" data-wow-delay="0.1s">
                                        <button type="submit" class="btn btn-primary">{{ trans('role.form.submit') }}</button>
                                        <a href="{{ route('panel.users.index') }}"
                                           class="btn btn-purple svg-wrapper purple">
                                            {{ trans('general.form.back') }}
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- change password --}}
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-8">
                                <h2>تغییر رمز عبور</h2>
                                <div class="hr-line-dashed"></div>
                                <form class="" method="post" data-type="ajax-form"
                                      action="{{ route('panel.users.change_password' , $user->id) }}">
                                    @csrf
                                    <div class="alert alert-warning d-none"></div>

                                    <div class="form-group">
                                        <label for="last_password">{{ trans('validation.attributes.last_password') }}</label>
                                        <input type="password" class="form-control" id="last_password" name="last_password" {{--required--}}>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">{{ trans('validation.attributes.new_password') }}</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password" {{--required--}}>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password_confirmation">{{ trans('validation.attributes.new_password_confirmation') }}</label>
                                        <input type="password" class="form-control" id="new_password_confirmation"
                                               name="new_password_confirmation" {{--required--}}>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">{{ trans('role.form.submit-change') }}</button>
                                        <a href="{{ route('panel.users.index') }}"
                                           class="btn btn-purple svg-wrapper purple">
                                            {{ trans('general.form.back') }}
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
