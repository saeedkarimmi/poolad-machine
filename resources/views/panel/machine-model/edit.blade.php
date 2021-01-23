@extends('cms::theme-inspinia.layouts.master')

@section('page-title'){{ trans('general.page-titles.machine-model.edit') }}@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-8">
                                <form method="post" data-type="ajax-form" action="{{ route('panel.machine_models.update' , $machineModel->id) }}">
                                    @csrf
                                    @method('patch')
                                    <div class="alert alert-warning d-none"></div>
                                    <div class="form-group">
                                        <label for="machine_type_id">{{ trans('validation.attributes.machine_type_id') }}</label>
                                        <select name="machine_type_id" class="form-control m-b" id="machine_type_id">
                                            @foreach($types as $type)
                                                <option value="{{ $type->id }}" {{ $machineModel->machine_type_id == $type->id ? 'selected' : ''}}>{{ $type->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="machine_drive_id">{{ trans('validation.attributes.machine_drive_id') }}</label>
                                        <select name="machine_drive_id" class="form-control m-b" id="machine_drive_id">
                                            @foreach($drives as $drive)
                                                <option value="{{ $drive->id }}" {{ $machineModel->machine_drive_id == $drive->id ? 'selected' : ''}}>{{ $drive->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="machine_weight_id">{{ trans('validation.attributes.machine_weight_id') }}</label>
                                        <select name="machine_weight_id" class="form-control m-b" id="machine_weight_id">
                                            @foreach($weights as $weight)
                                                <option value="{{ $weight->id }}" {{ $machineModel->machine_weight_id == $weight->id ? 'selected' : ''}}>{{ $weight->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="machine_series_id">{{ trans('validation.attributes.machine_series_id') }}</label>
                                        <select name="machine_series_id" class="form-control m-b" id="machine_series_id">
                                            @foreach($series as $s)
                                                <option value="{{ $s->id }}" {{ $machineModel->machine_series_id == $s->id ? 'selected' : ''}}>{{ $s->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="text-center wow fadeIn faster" data-wow-delay="0.1s">
                                        <button type="submit" class="btn btn-primary">{{ trans('general.form.submit') }}</button>
                                        <a href="{{ route('panel.machine_models.index') }}"
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
