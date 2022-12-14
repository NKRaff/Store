@extends('layouts.front')

@section('title')
    Categorias
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Todas as castegorias</h2>
                    <div class="row">
                        @foreach($categ as $cate)
                            <div class="col-md-3 mb-3">
                                <a href="{{ url('view-category/'.$cate->name) }}">
                                    <div class="card">
                                        <img src="{{ asset('assets/uploads/category/'.$cate->image); }}" alt="Imagem da categoria" style="width: 150px; height: 150px; margin: auto;">
                                        <div class="card-body">
                                            <h5>{{ $cate->name }}</h5>                                      
                                            <p>{{ $cate->description }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
