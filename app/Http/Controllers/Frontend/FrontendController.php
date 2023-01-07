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
        $featured_products = Product::where('trending', 'Y')->take(8)->get();
        $newproducts = Product::where('status', 'Y')->take(8)->get();
        //$trending_category = Category::where('popular', '1')->take(8)->get();
        $category = Category::where('status', 'Y')->get();

        return view('frontend.index', compact('featured_products', 'category', 'newproducts'));
    }

    public function verify(){
        $featured_products = Product::where('trending', 'Y')->take(8)->get();
        $category = Category::where('status', 'Y')->get();
        return view('auth.verify', compact($category))->with('status', "Confirme seu Email Primeiro");
    }

    public function home()
    {
        $featured_products = Product::where('trending', 'Y')->take(8)->get();
        $category = Category::where('status', 'Y')->get();
        
        return view('frontend.home', compact('featured_products', 'category'));
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
            $categ = Category::where('name', $name)->first();
            $products = Product::where('cate_id', $categ->id)->where('status', 'Y')->get();
            $category = Category::where('status', 'Y')->get();
            return view('frontend.products.index', compact('categ', 'products', 'category'));
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
                $category = Category::where('status', 'Y')->get();
                $products = Product::where('name', $prod_name)->first();
                return view('frontend.products.view', compact('category', 'products'));
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

    public function product()
    {
        $product = Product::where('status', 'Y')->get();
        $category = Category::where('status', 'Y')->get();
        return view('frontend.product', compact('product', 'category'));
    }

    public function productListAjax()
    {
        $products = Product::select('name')->where('status', 'Y')->get();
        $data = [];

        foreach($products as $item){
            $data[] = $item['name'];
        }

        return $data;
    }

    public function searchProduct(Request $request)
    {
        $searched_product = $request->product_name;
        if($searched_product != "")
        {
            $product = Product::where("name","LIKE","%$searched_product%")->first();
            if($product)
            {
                return redirect('category/'.$product->category->name."/".$product->name);
            }else {
                return redirect()->back()->with("status", "Nenhum Produto Encontrado!");
            }
        }else {
            return redirect()->back();
        }
    }
}
