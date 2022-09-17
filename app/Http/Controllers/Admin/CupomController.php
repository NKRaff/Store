<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cupom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CupomController extends Controller
{
    public function index()
    {
        $cupom = Cupom::all();
        return view('admin.cupom.index', compact('cupom'));
    }

    public function add()
    {
        return view('admin.cupom.add');
    }

    public function insert(Request $request)
    {
        $cupom = new Cupom();
        $cupom->nome = $request->input('nome');
        $cupom->localizador = $request->input('localizador');
        $cupom->desconto = $request->input('desconto');
        $cupom->modo_desconto = $request->input('modo_desconto');
        $cupom->limite = $request->input('limite');
        $cupom->modo_limite = $request->input('modo_limite');
        $cupom->validade = $request->input('validade');
        $cupom->ativo = $request->input('ativo') == TRUE ? 'S':'N';
        $cupom->save();
        return redirect('cupons')->with('status', "Cupom Adicionado com Sucesso");
    }

    public function edit($id)
    {
        $cupom = Cupom::find($id);
        return view('admin.cupom.edit', compact('cupom'));
    }

    public function update(Request $request, $id)
    {
        $cupom = Cupom::find($id);
        $cupom->nome = $request->input('nome');
        $cupom->localizador = $request->input('localizador');
        $cupom->desconto = $request->input('desconto');
        $cupom->modo_desconto = $request->input('modo_desconto');
        $cupom->limite = $request->input('limite');
        $cupom->modo_limite = $request->input('modo_limite');
        $cupom->validade = $request->input('validade');
        $cupom->ativo = $request->input('ativo') == TRUE ? 'S':'N';
        $cupom->update();
        return redirect('cupons')->with('status', "Cupom Atualizado com Sucesso");
    }

    public function destroy($id)
    {
        $cupom = Cupom::find($id);
        $path = 'assets/uploads/products/'.$cupom->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $cupom->delete();
        return redirect('cupons')->with('status', "Cupom Deletado com Sucesso");
    }
}
