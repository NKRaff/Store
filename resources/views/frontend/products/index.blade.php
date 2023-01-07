@extends('layouts.front')

@section('title')
    {{ $categ->name }}
@endsection

@section('content')
<!--
    <div class="py-3 mb-4 shadow-sm bg-primary text-white">
        <div class="container">
            <h6 class="mb-0">Categoria / {{ $categ->name }}</h6>
        </div>
    </div>
-->

    <div class="py-5">
        <div class="container">
        <h2 class="mb-4">{{ $categ->name }}</h2>
        <div class="products">
                
                @foreach($products as $prod)
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/uploads/products/'.$prod->image); }}" alt="">
                        </div>
                        <div class="infos">
                            <div class="title">
                                <h5>{{ $prod->name }}</h5>
                            </div>
                            <div class="description">
                                <p>{{ $prod->description }}</p>
                            </div>
                            <div class="price-review">
                                <strong>R$ {{ $prod->price }}</strong>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                    <i class="bi bi-star"></i>
                                    <p>3.6</p>
                                </div>
                            </div>
                            <div class="product-btn">
                                <a href="{{ url('category/'.$prod->category->name.'/'.$prod->name) }}" class="more">Mais Detalhes</a>
                                <a href="#" class="cart"><i class="bi bi-cart"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection