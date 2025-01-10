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
                                <td class="js-info">{!! $filiation->info !!}</td>
                                <td>
                                    @if ($filiation->map)
                                    <button class="btn btn-link p-0 mt-1" data-toggle="modal" data-target="#mapModal{{ $filiation->id }}">Launch map view</button>
                                    @else
                                    <span>No map provided</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.filiation.edit', $filiation->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('admin.filiation.destroy', $filiation->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this filiation?')">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Photo Modal -->
                            <div class="modal fade" id="photoModal{{ $filiation->id }}" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel{{ $filiation->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="photoModalLabel{{ $filiation->id }}">Photo of {{ $filiation->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('storage/' . $filiation->photo_url) }}" alt="Photo" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Map Modal -->
                            <div class="modal fade" id="mapModal{{ $filiation->id }}" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel{{ $filiation->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="mapModalLabel{{ $filiation->id }}">Our address on the map:</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                @if ($filiation->map)
                                                <iframe src="{{ $filiation->map }}" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                @else
                                                <h3 class="text-center">Map not available for this filiation.</h3>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script src="{{ asset('js/scripts.js') }}"></script>
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
