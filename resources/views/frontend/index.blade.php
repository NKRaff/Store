@extends('layouts.front')

@section('title')
    Bem Vindo ao eCommerce
@endsection

@section('content')
    
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Produtos em Destaque</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($featured_products as $prod)
                        <div class="item">
                            <div class="card pb-3">
                                <a href="{{ url('category/'.$prod->category->name.'/'.$prod->name) }}">
                                    <img src="{{ asset('assets/uploads/products/'.$prod->image); }}" alt="Imagem do produto" style="width: 300px; height: 200px; margin: auto;">
                                    <div class="card-body">
                                        <h5>{{ $prod->name }}</h5>
                                        <span class="float-start">R$ {{ $prod->price }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Categorias em Destaque</h2>
                <div class="owl-carousel category-carousel owl-theme">
                    @foreach($category as $scategory)
                        <div class="item">
                            <a href="{{ url('view-category/'.$scategory->name) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/'.$scategory->image); }}" alt="Imagem do produto" style="max-width: 100px; max-height: 100px; margin: auto;">
                                    <div class="card-body">
                                        <h5>{{ $scategory->name }}</h5>
                                        <p>
                                            {{ $scategory->description }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
    $('.category-carousel').owlCarousel({
        loop:false,
        margin:10,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
</script>
@endsection