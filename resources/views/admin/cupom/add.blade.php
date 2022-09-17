@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Adicionar Cupom</h4>
        </div>
        <div class="card-body">

            <form action="{{ url('insert-cupons') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Nome</label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Localizador</label>
                        <input type="text" class="form-control" name="localizador">
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="">Desconto</label>
                        <input type="number" class="form-control" name="desconto">
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="">Modo de Desconto</label>
                        <select name="modo_desconto" class="form-control" id="">
                            <option value="">Selecione</option>
                            <option value="porc">Porcentagem no valor do produto</option>
                            <option value="valor">Valor fixo</option>
                        </select>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="">Limite de Desconto</label>
                        <input type="number" class="form-control" name="limite">
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="">Modo de Limite</label>
                        <select name="modo_limite" class="form-control" id="">
                            <option value="">Selecione</option>
                            <option value="qtd">Quantidade de desconto</option>
                            <option value="valor">Valor de desconto</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Data de Vencimento</label>
                        <input type="text" class="form-control" name="validade">
                    </div>
                    <div class="col-md-8 mb-3">
                        <input type="checkbox" name="ativo">
                        <label for="">Ativo</label>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
