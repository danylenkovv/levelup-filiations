@extends('layouts.admin')
@section('additional-styles')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Filiations</h3>
                <a href="{{ route('admin.filiation.create') }}" class="btn btn-primary ml-auto">Create new filiation</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Contact Info</th>
                                <th>Google Map</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filiations as $filiation)
                            <tr>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#photoModal{{ $filiation->id }}">
                                        <img src="{{ asset('storage/' . $filiation->photo_url) }}" alt="Photo" class="img-fluid" style="max-width: 100px;">
                                    </a>
                                </td>
                                <td>{{ $filiation->name }}</td>
                                <td>{!! $filiation->info !!}</td>
                                <td>
                                    @if ($filiation->map)
                                    <button class="btn btn-link p-0 mt-1" data-toggle="modal" data-target="#mapModal-{{ $filiation->id }}">Launch map view</button>
                                    @else
                                    <span>No map provided</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.filiation.edit', $filiation->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('admin.filiation.destroy', $filiation->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this filiation?')">
                                        {{@csrf_field()}}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('adminlte/plugins/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function() {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection
