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

<div class="container margin_30">
    {{-- <div class="countdown_inner">-20% This offer ends in <div data-countdown="2019/05/15" class="countdown"></div>
    </div> --}}
    <div class="row">
        <div class="col-md-6">
            <div class="all">
                {{-- <img src="{{}}" alt="" srcset=""> --}}
                <div class="slider">
                    <img class="img-fluid lazy" style="width: 60%" src="{{ asset('ecommerce/img/products/product_placeholder_square_medium.jpg') }}" data-src="{{ $nft->image }}" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Category</a></li>
                    <li>Page active</li>
                </ul>
            </div>
            <!-- /page_header -->
            <div class="prod_info">
                <h1>{{ $nft->title }}</h1>
                <span class="rating ">
                    @if($nft->for_sale == 0)
                        <h5 class="text-white bg-danger p-1 rounded"><b>Vendu</b></h5> 
                    @else
                        <h5 class="text-white bg-success p-1 rounded"><b>En vente<b></h5>                         
                    @endif
                </span>
                <p><span><b>Artiste:</b> <span class="text-success">{{ $nft->artiste }}</span></span>
                <br> {{ $nft->description }} </p>
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="price_main"><span class="new_price"> {{$nft->price}} ETH </span></div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        @if(Auth::check() && Auth::user()->portefeuille >= $nft->price)
                            @if($nft->for_sale == 1)
                                <form action="{{ route('nfts.acheter', ['id' => $nft->id]) }}" method="post">
                                    @csrf
                                    <div class="btn_add_to_cart"><button type="submit" class="btn_1">Acheter</button></div>   
                                </form>
                            @else
                                <form action="{{ route('nfts.vendre', ['id' => $nft->id]) }}" method="post">
                                    @csrf
                                    <div class="btn_add_to_cart"><button type="submit" class="btn_1">Vendre</button></div>
                                </form>
                            @endif
                        +@endif
                        {{-- <div class="btn_add_to_cart"><a href="#0" class="btn_1">Acheter</a></div> --}}
                        
                    </div>
                </div>
            </div>
            <!-- /prod_info -->
        </div>
    </div>
    <!-- /row -->
</div>

<!-- COMMON SCRIPTS -->
<script src="{{asset('ecommerce/js/common_scripts.min.js')}}"></script>
<script src="{{asset('ecommerce/js/main.js')}}"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="{{asset('ecommerce/js/carousel-home.min.js')}}"></script>
@endsection