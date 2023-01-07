@extends('layouts.front')

@section('title', $products->name)
    

@section('content')

    <div class="py-4 mb-4 shadow-sm bg-primary text-white" style="background-color: #00bcd4 !important;">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('category') }}" class="text-white">Categoria /</a>
                <a href="{{ url('view-category/'.$products->category->name) }}" class="text-white">{{ $products->category->name }} /</a>
                <a class="text-white">{{ $products->name }}</a>
            </h6>
        </div>
    </div>

    <div class="container mt-3">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/products/'.$products->image) }}" class="w-100" alt="Imagem do produto" style="width: 300px; height: 200px; margin: auto;">
                    </div>
                    <div class="col-md-8">
                        <h2 class="row mb-0">
                            <div class="col-md-10">
                            {{ $products->name }}
                            </div>
                            <div class="col-md-2">
                            @if($products->trending == 'Y')
                                <label class="float-end badge bg-danger tranding_tag">Popular</label>
                            @endif
                            </div>
                        </h2>

                        <hr>
                        <div class="row">
                            <label class="me-3 mx-1 fs-6">R$ {{ $products->price }}</label>
                        </div>    
                    <!--
                        <p class="mt-3">
                            {!! $products->small_description !!}
                        </p>
                    -->
                        <hr>

                        @if($products->qty > 0)
                            <label class="badge bg-success">Em estoque</label>
                        @else
                            <label class="badge bg-danger">Fora de Estoque</label>
                        @endif

                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label for="Quantity">Quantidade</label>
                                <div class="input-group mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="product_qty" id="product_qty" value="1" class="form-control qty-input text-center">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <br/>
                                @if($products->qty > 0)
                                    <button class="btn btn-success me-3 float-start addToCartBtn">Adicionar ao Carrinho <i class="fa fa-shopping-cart"></i></button>
                                @endif
                                <!--<button href="{{ url('add-cart/') }}" type="button" class="btn btn-success me-3 float-start">Adicionar ao Carrinho <i class="fa fa-shopping-cart"></i></button>-->
                                <!-- <button type="button" class="btn btn-primary me-3 float-end">Adicionar a lista de desejos</button> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h3 class="mx-3">Descrição</h3>
                    <p class="mt-3 mx-2">
                        {!! $products->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection


