@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h4>
                            Detalhes do Usuario
                            <a href="{{ url('users') }}" class="btn btn-warning float-right">Voltar</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">  
                                <label for="">Função</label>
                                <div class="p-2 border">{{ $users->role_as }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Nome</label>
                                <div class="p-2 border">{{ $users->name }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Sobrenome</label>
                                <div class="p-2 border">{{ $users->lname }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Email</label>
                                <div class="p-2 border">{{ $users->email }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Telefone</label>
                                <div class="p-2 border">{{ $users->phone }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Endereço</label>
                                <div class="p-2 border">{{ $users->address }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Cidade</label>
                                <div class="p-2 border">{{ $users->city }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Estado</label>
                                <div class="p-2 border">{{ $users->state }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Cep</label>
                                <div class="p-2 border">{{ $users->cep }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
@endsection
 