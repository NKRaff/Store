@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Editar Produto</h4>
        </div>
        <div class="card-body">

            <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    
                    <div class="col-md-10 mb-3">
                        <select class="form-select">
                            <option value="">{{ $products->category->name }}</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <a class="nav-link" id="add" href="{{ url('add-category') }}">
                            <i class="bi bi-folder-plus"></i>
                            Adicionar Categoria
                        </a>
                    </div>
                
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Nome</label>
                        <input type="text" class="form-control" value="{{ $products->name }}" name="name">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Descrição</label>
                        <textarea name="description" rows="3" class="form-control">{{ $products->description }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Preço</label>
                        <input type="number" class="form-control" value="{{ $products->price }}" name="price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantidade</label>
                        <input type="number" class="form-control" value="{{ $products->qty }}" name="qty">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Visível</label>
                        <input type="checkbox" {{ $products->status == 'Y' ? 'checked':'' }} name="status" >

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Popular</label>
                        <input type="checkbox" {{ $products->trending == 'Y' ? 'checked':'' }} name="trending">
                    </div>

                    @if($products->image)
                        <img id="edit-img" src="{{ asset('assets/uploads/products/'.$products->image) }}" alt="">
                    @endif
                    <div class="col-md-12">
                        <label for="">Imagem</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                    
            </form>

        </div>
    </div>
@endsection
