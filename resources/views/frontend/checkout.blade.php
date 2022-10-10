@extends('layouts.front')

@section('title')
    Store - Checkout
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{ url('place-order') }}" method="POST">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Informações Pessoais</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Nome</label>
                                    <input type="text" class="form-control" placeholder="Digite seu Nome">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Sobrenome</label>
                                    <input type="text" class="form-control" placeholder="Digite seu Sobrenome">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" placeholder="Digite seu Email">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Telefone</label>
                                    <input type="text" class="form-control" placeholder="Digite seu Numero de Telefone">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Endereço</label>
                                    <input type="text" class="form-control" placeholder="Digite seu endereço">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Cidade</label>
                                    <input type="text" class="form-control" placeholder="Digite sua Cidade">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Estado</label>
                                    <input type="text" class="form-control" placeholder="Digite seu Estado">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Cep</label>
                                    <input type="text" class="form-control" placeholder="Digite seu Cep">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Produtos</h6>
                            <hr>
                            <table class="table table-striped">
                                <thead>
                                    <th class="col-md-6">Nome</th>
                                    <th class="col-md-3">Quantidade</th>
                                    <th class="col-md-3">Preço</th>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->prod_qty }}</td>
                                            <td>R$ {{ $item->products->price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <button type="submit" class="btn btn-primary w-100">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection