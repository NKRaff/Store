@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Editar Categoria</h4>
        </div>
        <div class="card-body">

        <form action="{{ url('updade-cupons/'.$cupom->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Nome</label>
                        <input type="text" class="form-control" name="nome" value="{{ $cupom->nome }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Localizador</label>
                        <input type="text" class="form-control" name="localizador" value="{{ $cupom->localizador }}">
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="">Desconto</label>
                        <input type="number" class="form-control" name="desconto" value="{{ $cupom->desconto }}">
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="">Modo de Desconto</label>
                        <select name="modo_desconto" class="form-control" id="">
                            @if($cupom->modo_desconto=='porc')
                                <option value="porc">Porcentagem no valor do produto</option>
                                <option value="valor">Valor fixo</option>
                            @else
                                <option value="valor">Valor fixo</option>
                                <option value="porc">Porcentagem no valor do produto</option>
                            @endif
                        </select>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="">Limite de Desconto</label>
                        <input type="number" class="form-control" name="limite" value="{{ $cupom->limite }}">
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="">Modo de Limite</label>
                        <select name="modo_limite" class="form-control" id="">
                            @if($cupom->modo_desconto=='qtd')
                                <option value="qtd">Quantidade de desconto</option>
                                <option value="valor">Valor de desconto</option>
                            @else
                                <option value="valor">Valor de desconto</option>
                                <option value="qtd">Quantidade de desconto</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Data de Vencimento</label>
                        <input type="text" class="form-control" name="validade" value="{{ $cupom->validade }}">
                    </div>
                    <div class="col-md-8 mb-3">
                        <input type="checkbox" name="ativo" {{ $cupom->ativo == 'S' ? 'checked':'' }}>
                        <label for="">Ativo</label>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">atualizar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
