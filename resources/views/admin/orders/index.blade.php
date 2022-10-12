@extends('layouts.admin')

@section('title')
    Pedidos
@endsection

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                        <h4>
                            Novos Pedidos
                            <a href="{{ 'order-history' }}" class="btn btn-warning float-right">Historico de Pedidos</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Data do Pedido</th>
                                    <th>Número de Rastreamento</th>
                                    <th>Preço Total</th>
                                    <th>Status</th>
                                    <th>Acão</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)
                                    <tr>
                                        <td>{{ date('d/m/y', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>R$ {{ $item->total_price }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-primary">Mais Detalhes</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>

@endsection
