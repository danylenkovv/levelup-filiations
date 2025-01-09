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
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Contact Info</th>
                            <th>Map Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($filiations as $filiation)
                        <tr>
                            <!-- Photo -->
                            <td>
                                <a href="#" data-toggle="modal" data-target="#photoModal{{ $filiation->id }}">
                                    <img src="{{ asset('storage/' . $filiation->photo_url) }}" alt="Photo" class="img-fluid" style="max-width: 100px;">
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="photoModal{{ $filiation->id }}" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel{{ $filiation->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="photoModalLabel{{ $filiation->id }}">{{ $filiation->name }} - Photo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $filiation->photo_url) }}" alt="Photo" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <!-- Name -->
                            <td>{{ $filiation->name }}</td>
                            <!-- Contact Info -->
                            <td>{!! $filiation->info !!}</td>
                            <!-- Map Address -->
                            <td>
                                @if ($filiation->map)
                                <a href="{{ $filiation->map }}" class="text-primary text-truncate d-inline-block" style="max-width: 150px;" target="_blank">
                                    {{ $filiation->map }}
                                </a>
                                @else
                                <span>No map provided</span>
                                @endif
                            </td>
                            <!-- Actions -->
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('admin.filiation.edit', $filiation->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                <!-- Delete Button -->
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
