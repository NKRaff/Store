@extends('layouts.admin')

@section('title')
    Store - Pedidos
@endsection

@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                            <h4>Visualização de Pedido</h4>
                            <a href="{{ url('orders') }}" class="btn btn-danger  justify-content-end float-end">Voltar</a>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h6>DETALHES DO ENVIO</h6>
                                <hr>
                                <label for="">Nome</label>
                                <div class="border p-1">{{ $orders->fname }}</div>
                                <label for="">Sobrenome</label>
                                <div class="border p-1">{{ $orders->lname }}</div>
                                <label for="">Email</label>
                                <div class="border p-1">{{ $orders->email }}</div>
                                <label for="">Telefone</label>
                                <div class="border p-1">{{ $orders->phone }}</div>
                                <label for="">Endereço de Envio</label>
                                <div class="border p-1">
                                    {{ $orders->address }}, <br>
                                    {{ $orders->city }} - 
                                    {{ $orders->state }}
                                </div>
                                <label for="">Cep</label>
                                <div class="border p-1">{{ $orders->cep }}</div>
                            </div>
                            <div class="col-md-6">
                                <h6>DETALHES DO PEDIDO</h6>
                                <hr>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Quantidade</th>
                                            <th>Valor</th>
                                            <th>Imagem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders->orderitems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" width="65px" alt="Imagem do Produto">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h5 class="px-2">TOTAL: <span class="float-end">R$ {{ $orders->total_price }}</span></h5>

                                <div class="mt-4 px-2">
                                    <label for="">Status do Pedido</label>
                                    <form method="POST" action="{{ url('updade-order/'.$orders->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="order_status">
                                            <option value="Pendente" {{ $orders->status == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                                            <option value="Completo" {{ $orders->status == 'Completo' ? 'selected' : '' }}>Completo</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary mt-3 float-end">Atualizar Status</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>

@endsection