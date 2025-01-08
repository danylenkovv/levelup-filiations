@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Change site settings</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('settings.update') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                <div class="card-body">

                    <!-- Logo -->
                    <div class="form-group row">
                        <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-10">
                            <input type="text" name="logo_text" class="form-control {{ $errors->has('logo_text') ? 'is-invalid' : '' }}"
                                id="logo" value="{{ old('logo_text', $settings['logo_text'] ?? '') }}"
                                placeholder="Enter logo here...">
                            @if($errors->has('logo_text'))
                            <span class="invalid-feedback d-block">{{ $errors->first('logo_text') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Site Name -->
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Site Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="site_name" class="form-control {{ $errors->has('site_name') ? 'is-invalid' : '' }}"
                                id="name" value="{{ old('site_name', $settings['site_name'] ?? '') }}"
                                placeholder="Enter site name here...">
                            @if($errors->has('site_name'))
                            <span class="invalid-feedback d-block">{{ $errors->first('site_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Site Description -->
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Site Description</label>
                        <div class="col-sm-10">
                            <textarea name="site_description" class="form-control {{ $errors->has('site_description') ? 'is-invalid' : '' }}"
                                rows="3" id="description" placeholder="Enter some description...">{{ old('site_description', $settings['site_description'] ?? '') }}</textarea>
                            @if($errors->has('site_description'))
                            <span class="invalid-feedback d-block">{{ $errors->first('site_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="form-group row">
                        <label for="footer" class="col-sm-2 col-form-label">Footer</label>
                        <div class="col-sm-10">
                            <input type="text" name="footer_text" class="form-control {{ $errors->has('footer_text') ? 'is-invalid' : '' }}"
                                id="footer" value="{{ old('footer_text', $settings['footer_text'] ?? '') }}"
                                placeholder="Enter some footer text here...">
                            @if($errors->has('footer_text'))
                            <span class="invalid-feedback d-block">{{ $errors->first('footer_text') }}</span>
                            @endif
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('admin') }}" class="btn btn-default float-right">Cancel</a>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
</div>
@endsection
