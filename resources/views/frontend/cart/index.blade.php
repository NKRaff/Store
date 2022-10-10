@extends('layouts.front')

@section('title')
    Store - Carrinho
@endsection

@section('content')
    <div class="container my-5">
        <div class="card shadow product_data">
            <div class="card-body">
                @php
                    $total = 0;
                @endphp
                @foreach($cartItens as $item)
                
                    <div class="row product_data">
                        <div class="col-md-2">
                            <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" alt="Imagem" width="100px">
                        </div>
                        <div class="col-md-3">
                            <h6>{{ $item->products->name }}</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>R$ {{ $item->products->price }}</h6>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                            @if($item->products->qty > $item->prod_qty)
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 130px;">
                                    <button class="input-group-text changeQuantity decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$item->prod_qty}}">
                                    <button class="input-group-text changeQuantity increment-btn">+</button>
                                </div>
                                @php
                                    $total += $item->products->price * $item->prod_qty;
                                @endphp
                            @else
                                <h6>Fora de Estoque</h6>
                            @endif
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger delete-cart-item"><i class="fa-solid fa-trash-can"></i> Remover</button>
                        </div>
                    </div>
                    
                @endforeach
            </div>
            <div class="card-footer">
                <h6>Total: R$ {{ $total }}
                    <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Continuar com a Compra</a>
                </h6>
            </div>
        </div>
    </div>
@endsection