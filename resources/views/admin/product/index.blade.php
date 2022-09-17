@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="">
                <h4>Produtos</h4>
            </div>
            <div class="">
                <a class="nav-link" id="add" href="{{ url('add-products') }}">
                    <i class="bi bi-folder-plus"></i>
                    Adicionar Produto
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td scope="row">{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name ?? 'null' }}</td>
                            <td>R$ {{ $item->price }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/products/'.$item->image) }}" alt="Image" class="cate-image">
                            </td>
                            <td>
                                <a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-primary md" id="btn"><i class="fa-solid fa-pen"></i></a>
                                <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-danger md"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
