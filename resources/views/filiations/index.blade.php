@extends('layouts.app')
@section('content')
<div class="row">
    @if($filiations->isEmpty())
    <div class="col-12 text-center mt-5">
        <h1 class="display-4 text-muted">No filiations created yet</h1>
    </div>
    @else
    @foreach($filiations as $filiation)
    <div class="col-lg-12 mb-4">
        <a href="#" data-toggle="modal" data-target="#mapModal-{{ $filiation->id }}" class="text-decoration-none text-dark">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-2">
                        <img src="{{ asset('storage/' . $filiation->photo_url) }}" alt="Картинка" class="img-fluid h-100 w-100">
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <h3>{{ $filiation->name }}</h3>
                            <p class="card-text">
                            <div class="formatted-content">
                                {!! $filiation->info !!}
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="mapModal-{{ $filiation->id }}" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel-{{ $filiation->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mapModalLabel-{{ $filiation->id }}">Our address on the map:</h5>
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
    @endif
</div>
@endsection
