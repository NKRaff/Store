<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UpdateProfileRequest;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', 'Y')->take(15)->get();
        //$trending_category = Category::where('popular', '1')->take(8)->get();
        $category = Category::where('status', 'Y')->get();
        return view('frontend.index', compact('featured_products', 'category'));
    }

    public function profile()
    {
        return view('frontend.profile.index');
    }

    public function editprofile()
    {
        return view('frontend.profile.edit')->with('user', auth()->user());
    }

    public function updateprofile(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        /*$user->update([
            'name' -> $request->name,
            'email' -> $request->email
        ]);*/
        return redirect('/')->with('status', "Atualizado com Sucesso"); 
    }

    public function category()
    {
        $category = Category::where('status', 'Y')->get();
        return view('frontend.category', compact('category'));
    }

    public function viewcategory($name)
    {
        if(Category::where('name', $name)->exists())
        {
            $category = Category::where('name', $name)->first();
            $products = Product::where('cate_id', $category->id)->where('status', 'Y')->get();
            return view('frontend.products.index', compact('category', 'products'));
        } 
        else
        {
            return redirect('/')->with('status', "URL não existe");
        }
        
    }

    public function productview($cate_name, $prod_name)
    {
        if(Category::where('name', $cate_name)->exists())
        {
            if(Product::where('name', $prod_name)->exists())
            {
                $products = Product::where('name', $prod_name)->first();
                return view('frontend.products.view', compact('products'));
            }
            else
            {
                return redirect('/')->with('status', "O link está quebrado");
            }
        }
        else
        {
            return redirect('/')->with('status', "A categoria não foi encontrada");
        }

    }
}
