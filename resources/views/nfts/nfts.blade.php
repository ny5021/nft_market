@extends('layouts.app')

@section('title', 'NFT MARKET')

@section('content')
<!-- BASE CSS -->
<link href="{{asset('ecommerce/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('ecommerce/css/style.css')}}" rel="stylesheet">

<!-- SPECIFIC CSS -->
<link href="{{asset('ecommerce/css/home_1.css')}}" rel="stylesheet">

<!-- YOUR CUSTOM CSS -->
<link href="{{asset('ecommerce/css/custom.css')}}" rel="stylesheet">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" type="image/x-icon" href="{{asset('ecommerce/img/apple-touch-icon-57x57-precomposed.png')}}">
<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset('ecommerce/img/apple-touch-icon-72x72-precomposed.png')}}">
<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{asset('ecommerce/img/apple-touch-icon-114x114-precomposed.png')}}">
<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{asset('ecommerce/img/apple-touch-icon-144x144-precomposed.png')}}">

<!-- GOOGLE WEB FONT -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

<div class="main-container">
    <form action="{{ route('nfts.filter') }}" method="get">
        @csrf
        <button class="btn btn-success" type="submit" name="category_id" value="">All</button>
        @foreach($categories as $category)
            <button class="btn btn-success" type="submit" name="category_id" value="{{ $category->id }}">{{ $category->name }}</button>
        @endforeach
    </form>
</div>
{{-- {{ $categories }} --}}
{{-- ---------------------------- --}}
{{-- {{ $nfts }} --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="container margin_60_35">
            <div class="main_title">
                <h2>Top Selling</h2>
                <span>Products</span>
            </div>
            
            <div class="row small-gutters">
                @foreach($nfts as $nft)
                    <div class="col-6 col-md-4 col-xl-3">
                        <div class="grid_item">
                            <figure>
                                @if($nft->for_sale == 0)
                                    <span class="ribbon off">Vendu</span> 
                                @else
                                    <span class="ribbon hot">En vente</span> 
                                @endif
                                <a href="{{ route('nfts.show', ['id' => $nft->id]) }}">
                                    <img class="img-fluid lazy" style="width: 80%" src="{{ asset('ecommerce/img/products/product_placeholder_square_medium.jpg') }}" data-src="{{ $nft->image }}" alt="">
                                    <!-- Ajoutez l'autre image ici si nécessaire -->
                                </a>
                                {{-- <div data-countdown="2019/05/15" class="countdown"></div> --}}
                            </figure>
                            {{-- <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div> --}}
                            <a href="{{ route('nfts.show', ['id' => $nft->id]) }}">
                                <h3>{{ $nft->title }}</h3>
                            </a>
                            <div class="price_box">
                                <span class=""><b>Artiste:</b> <span class="text-success">{{ $nft->artiste }}</span> </span>
                                {{-- <span class="old_price">$60.00</span> --}}
                            </div>
                            <div class="price_box">
                                <span class="new_price">{{ $nft->price }} ETH</span>
                                {{-- <span class="old_price">$60.00</span> --}}
                            </div>
                            <div class="price_box">
                                <form action="{{ route('nfts.acheter', ['id' => $nft->id]) }}" method="post">
                                    @csrf
                                    @if($nft->for_sale == 1 && Auth::check() && Auth::user()->portefeuille >= $nft->price)
                                        <div class="btn_add_to_cart"><button type="submit" class="btn_1">Acheter</button></div>   
                                    @endif
                                </form>
                            </div>
                            <ul>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                            </ul>
                        </div>
                        <!-- /grid_item -->
                    </div>
                @endforeach
                <!-- /col -->
            </div>
            
            <!-- /row -->
        </div>
    </div>
    
</div>


<!-- COMMON SCRIPTS -->
<script src="{{asset('ecommerce/js/common_scripts.min.js')}}"></script>
<script src="{{asset('ecommerce/js/main.js')}}"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="{{asset('ecommerce/js/carousel-home.min.js')}}"></script>
@endsection