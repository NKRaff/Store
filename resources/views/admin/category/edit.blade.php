@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Editar Categoria</h4>
        </div>
        <div class="card-body">

            <form action="{{ url('updade-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Nome</label>
                        <input type="text" value="{{ $category->name }}" class="form-control" name="name">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Descrição</label>
                        <textarea rows="3" class="form-control" name="description">{{ $category->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Visível</label>
                        <input type="checkbox" {{ $category->status == "Y" ? 'checked':''}} name="status">
                    </div>
                    @if($category->image)
                        <img id="edit-img" src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="Category image">
                    @endif
                    <div class="col-md-12">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
            </form>

        </div>
    </div>
@endsection
