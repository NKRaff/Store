@extends('layouts.front')

@section('title')
    Produtos
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-4">Todos os Produtos</h2>
                    <div class="products">
                        @foreach($product as $prod)
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
        </div>
    </div>
@endsection
