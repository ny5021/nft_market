@extends('layouts.app')

@push('styles')
    <link href="{{ asset('assets/css/nft_detail.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="container">
    <div class="col-md-4">
    <img class="nft-image" src="..." alt="Image">
    </div>
    <div class="col-md-8">
        <p>Title</p>
        <p>Description</p>
    </div>
</div>
@endsection