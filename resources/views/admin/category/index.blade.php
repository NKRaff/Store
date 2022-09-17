@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="">
                <h4>Categorias</h4>
            </div>
            <div class="">
                <a class="nav-link" id="add" href="{{ url('add-category') }}">
                    <i class="bi bi-folder-plus"></i>
                    Adicionar Categoria
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td scope="row">{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td class="overflow-hidden text-truncate text-nowrap">{{ $item->description }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/category/'.$item->image) }}" alt="Image" class="cate-image">
                            </td>
                            <td>
                                <a href="{{ url('edit-category/'.$item->id) }}" class="btn btn-primary" id="btn"><i class="fa-solid fa-pen"></i></a>
                                <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
