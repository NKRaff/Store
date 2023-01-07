<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        $category = Category::where('status', 'Y')->get();
        return view('frontend.orders.index', compact('orders', 'category'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        $category = Category::where('status', 'Y')->get();
        return view('frontend.orders.view', compact('orders', 'category'));
    }
}
