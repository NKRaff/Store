<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    //LIST CATEGORY
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    //ADD CATEGORY
    public function add()
    {
        return view('admin.category.add');
    }

    public function insert(Request $request)
    {
        $category = new Category();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? 'Y':'N';
        $category->save();
        return redirect('/categories')->with('status', "Categoria Adicionada com Sucesso");
        
    }

    //UPDATE CATEGORY
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? 'Y':'N';
        $category->update();
        return redirect('categories')->with('status', "Categoria Atualizada com Sucesso");
        
    }

    //DELETE CATEGORY
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->image)
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('categories')->with('status', "Categoria Deletada com Sucesso");
    }

}
