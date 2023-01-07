<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartItems as $item)
        {
            if(!Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists())
            {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }

        $cartItems = Cart::where('user_id', Auth::id())->get();

        $category = Category::where('status', 'Y')->get();
        return view('frontend.checkout', compact('cartItems', 'category'));
    }
   
    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        
        $cpfValidador = self::verificarCPF($request->input('cpf'));
        if($cpfValidador == true){
            $order->cpf = $request->input('cpf');
        }
        else {
            return redirect('checkout')->with('status', "CPF Invalido");
        }

        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');

        //processa a string mantendo apenas números no valor de entrada.
        $tel = $request->input('phone');
        $tel = preg_replace("/[^0-9]/", "", $tel); 
            
        $lenValor = strlen($tel);
        
        //validando a quantidade de caracteres de telefone fixo ou celular.
        if($lenValor != 10 && $lenValor != 11){
            return redirect('checkout')->with('status', "Telefone Invalido");
        }
        //DD e número de telefone não podem começar com zero.
        if($tel[0] == "0" || $tel[2] == "0"){
            return redirect('checkout')->with('status', "Telefone Invalido");
        }
        else {
            $order->phone = $tel;
        } 
        
/*
        if(preg_match("/\(?\d{2}\)?\s?\d{5}\-?\d{4}/", $request->input('phone'))){
            $order->phone = $request->input('phone');
        } 
        else {
            return redirect('checkout')->with('status', "Telefone Invalido");
        }
*/
        
        //$order->phone = $request->input('phone');
        
        
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->cep = $request->input('cep');

        $total = 0;
        $cartItems_Total = Cart::where('user_id', Auth::id())->get();
        foreach($cartItems_Total as $prod)
        {
            $total += $prod->products->price * $prod->prod_qty;
            //$total += $prod->products->price;
        }
        $order->total_price = $total;
        
        $order->tracking_no = 'store'.rand(1111,9999);
        $order->save();
        
        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($cartItems as $item)
        {
            OrderItem::create([
                'order_id'=> $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->price,
            ]);
            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();    
        }

        if(Auth::user()->address == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user->cpf = $request->input('cpf');
            $user->lname = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->cep = $request->input('cep');
            $user->update();
        }

        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);

        return redirect('/')->with('status', "Pedido Realizado com Sucesso");
    }

    public static function verificarCPF($cpf)
    {
        $cpf = preg_replace('/\D/', '', $cpf);
        if(strlen($cpf) == 11){
            $cpfValidacao = substr($cpf,0,9);
            $cpfValidacao .= self::calcularDigitoVerificador($cpfValidacao);
            $cpfValidacao .= self::calcularDigitoVerificador($cpfValidacao);

            if($cpfValidacao == $cpf){
                return $cpfValidador = true;
            } 
            else{
                return $cpfValidador = false;
            }
        }
        else{
            return $cpfValidador = false;
        } 
    }

    public static function calcularDigitoVerificador($base)
    {
        $tamanho = strlen($base);
        $multiplicador = $tamanho + 1;

        $soma = 0;
        for($i = 0; $i < $tamanho; $i++){
            $soma += $base[$i] * $multiplicador;
            $multiplicador--;
        }

        $resto = $soma % 11;

        return $resto > 1 ? 11 - $resto : 0;
    }

    public static function verificarPhone($phone)
    {
        $phone = preg_replace('/[()]-+/', '', $phone);
        echo($phone);
    }
}
