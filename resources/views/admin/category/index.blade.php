@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Categorias
                        <a href="{{ url('add-category') }}" class="btn btn-primary float-right">
                            <i class="bi bi-folder-plus"></i>
                            Adicionar Categoria
                        </a>
                    </h4>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th scope="col" class="col-sm-1">Id</th>
                                <th scope="col" class="col-sm-3">Nome</th>
                                <th scope="col" class="col-sm-3">Descrição</th>
                                <th scope="col" class="col-sm-3">Imagem</th>
                                <th scope="col" class="col-sm-2">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                                <tr>
                                    <td scope="row">{{ $item->id }}</td>
                                    <td class="text-overview">{{ $item->name }}</td>
                                    <td class="overflow-hidden text-truncate text-nowrap" style="width: 40px;"><p class="text-overview">{{ $item->description }}</p></td>
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
        </div>
    </div>

    
@endsection
