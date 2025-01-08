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
            <form action="#" method="post" class="form-horizontal">
                <div class="card-body">
                    <!-- Brand -->
                    <div class="form-group row">
                        <label for="brand" class="col-sm-2 col-form-label">Brand</label>
                        <div class="col-sm-10">
                            <input type="text" name="brand" class="form-control" id="brand" placeholder="Enter brand here...">
                        </div>
                    </div>
                    <!-- Logo -->
                    <div class="form-group row">
                        <label for="exampleInputFile" class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="logo_url" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose photo for logo</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Site Name -->
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Site Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="site_name" class="form-control" id="name" placeholder="Enter site name here...">
                        </div>
                    </div>
                    <!-- Site Description -->
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Site description</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" rows="3" id="description" placeholder="Enter some description..."></textarea>
                        </div>
                    </div>
                    <!-- Footer -->
                    <div class="form-group row">
                        <label for="footer" class="col-sm-2 col-form-label">Footer</label>
                        <div class="col-sm-10">
                            <input type="text" name="footer" class="form-control" id="footer" placeholder="Enter some footer text here...">
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
@section('scripts')
<script src="{{asset('adminlte/plugins/js/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
@endsection
