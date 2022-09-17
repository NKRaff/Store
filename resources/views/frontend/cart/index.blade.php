@extends('layouts.front')

@section('title')
    Carrinho
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="">
                <h4>Produtos</h4>
            </div>
        </div>

        @forelse ($pedidos as $pedido)
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Qtd</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Desconto</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_pedido = 0;
                        @endphp
                        @foreach ($pedido->pedido_produtos as $pedido_produto)
                            <tr >
                                <td>
                                    <img src="{{ asset('assets/uploads/products/'.$pedido_produto->produto->image) }}" alt="Image" class="cate-image" width="150px" height="100px">
                                </td>
                                <td>
                                    <a href=""><i class="bi bi-dash"></i></a>
                                    <span>{{ $pedido_produto->qtd }}</span>
                                    <a href=""><i class="bi bi-plus"></i></a>
                                </td>
                                <td>{{ $pedido_produto->produto->name }}</td>
                                <td>R$ {{ number_format($pedido_produto->produto->price, 2, ',', '.' )}}</td>
                                <td>R$ {{ number_format($pedido_produto->desconto, 2, ',', '.' )}}</td>
                                @php
                                    $total_produto = $pedido_produto->valores - $pedido_produto->descontos;
                                    $total_pedido += $total_produto;
                                @endphp
                                <td>R$ {{ number_format($total_produto, 2, ',', '.' )}}</td>
                                <td>
                                    <a href="#" class="btn btn-danger md"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <strong>Total do pedido: </strong>
                <span>R$ {{number_format($total_pedido, 2, ',', '.')}}</span>
            </div>
        @empty
            <h5>Não há nenhum produto no carrinho</h5>
        @endforelse
    </div>
@endsection