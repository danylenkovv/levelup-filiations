@extends('layouts.admin')
@section('additional-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create filiation</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.filiation.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{@csrf_field()}}
                <div class="card-body">
                    <!-- Name -->
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Enter filiation name here...">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Photo -->
                    <div class="form-group row">
                        <label for="exampleInputFile" class="col-sm-2 col-form-label">Photo</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="photo_url" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            @if ($errors->has('photo_url'))
                            <span class="text-danger">{{ $errors->first('photo_url') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Google Map -->
                    <div class="form-group row">
                        <label for="map" class="col-sm-2 col-form-label">Location on Google Map</label>
                        <div class="col-sm-10">
                            <input type="text" name="map" class="form-control" id="map" value="{{ old('map') }}" placeholder="Enter link here...">
                            @if ($errors->has('map'))
                            <span class="text-danger">{{ $errors->first('map') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Address & Contacts -->
                    <div class="form-group row">
                        <label for="info" class="col-sm-2 col-form-label">Address & Contacts</label>
                        <div class="col-sm-10">
                            <textarea name="info" id="info" class="form-control" rows="5" placeholder="Enter address and contacts">{{ old('info') }}</textarea>
                            @if ($errors->has('info'))
                            <span class="text-danger">{{ $errors->first('info') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('admin.filiation.index') }}" class="btn btn-default float-right">Cancel</a>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('adminlte/plugins/js/bs-custom-file-input.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
    $(document).ready(function() {
        $('#info').summernote({
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endsection
