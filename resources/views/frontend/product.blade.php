@extends('layouts.front')

@section('title')
    Categorias
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Todas os Produtos</h2>
                    <div class="row">
                        @foreach($product as $prod)
                            <div class="col-md-3 mb-3">
                                <a href="{{ url('category/'.$category->name.'/'.$prod->name) }}">
                                    <div class="card">
                                        <img src="{{ asset('assets/uploads/products/'.$prod->image); }}" alt="Imagem do produto">
                                        <div class="card-body">
                                            <h5>{{ $prod->name }}</h5>
                                            <span class="float-start">R${{ $prod->price }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
