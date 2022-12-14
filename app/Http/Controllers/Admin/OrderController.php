<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 'Pendente')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $category = Category::where('status', 'Y')->get();
        $orders = Order::where('id', $id)->first();
        return view('admin.orders.view', compact('orders', 'category'));
    }

    public function updadeOrder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status', "Status do Pedido Atualizado");
    }

    public function orderHistory()
    {
        $orders = Order::where('status', 'Completo')->get();
        $category = Category::where('status', 'Y')->get();
        return view('admin.orders.history', compact('orders', 'category'));
    }
}
