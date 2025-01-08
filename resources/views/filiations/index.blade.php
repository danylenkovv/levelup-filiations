@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a href="#" data-toggle="modal" data-target="#mapModal" class="text-decoration-none text-dark">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-2">
                        <img src="https://via.placeholder.com/150" alt="Картинка" class="img-fluid h-100 w-100">
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <h3>Filiation name</h3>
                            <p class="card-text">Address, phones</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel">Our address on the map:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d20309.075323923767!2d30.4721233!3d50.4851493!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cde96c5f81af%3A0x112259d9019b4231!2z0JrQuNGA0LjQu9C70L7QstGB0LrQsNGPINGG0LXRgNC60L7QstGM!5e0!3m2!1sru!2sua!4v1736324016054!5m2!1sru!2sua" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
