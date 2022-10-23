@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Registro de Usuarios</h4>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td scope="row">{{ $item->id }}</td>
                            <td>{{ $item->name.' '.$item->lname }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <a href="{{ url('view-user/'.$item->id) }}" class="btn btn-primary" id="btn">
                                    Ver Perfil
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
