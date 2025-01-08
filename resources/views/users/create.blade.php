@extends('layouts.admin')
@section('additional-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create user</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="#" method="post" class="form-horizontal">
                <div class="card-body">
                    <!-- Login -->
                    <div class="form-group row">
                        <label for="login" class="col-sm-2 col-form-label">Login</label>
                        <div class="col-sm-10">
                            <input type="text" name="login" class="form-control" id="login" placeholder="Enter login here...">
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email here...">
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password here...">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('users.index') }}" class="btn btn-default float-right">Cancel</a>
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
