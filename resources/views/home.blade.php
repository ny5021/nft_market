@extends('layouts.app')

@push('styles')
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="d-flex">
        <a href="#">
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
