@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Adicionar Categoria</h4>
        </div>
        <div class="card-body">

            <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Nome</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Descrição</label>
                        <textarea rows="3" class="form-control" name="description"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Visível</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-12">
                        <label for="">Imagem</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
            </form>

        </div>
    </div>
@endsection
