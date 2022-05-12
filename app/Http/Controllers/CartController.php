<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cartAdd(Request $request)
    {
        $product = Product::findOrFail($request->id);
        
        $session_id = Session::getId();
        
        \Cart::session($session_id)->add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity ?? 1,
            'attributes' => [
            'image' => $product->image,
        ],
        ]);
        $cart = \Cart::getContent();
        
        return redirect()->back();
    }
    public function cartCheck(Request $request)
    {   
        $session_id = Session::getId();

        \Cart::session($session_id);

        $cart = \Cart::getContent();

        $sum = \Cart::getTotal('price');

        $user = auth()->user();

        $message = session('message', ''); 

        $orders = Order::where(['user_id' => $user->id ?? $session_id])->orderBy('id','desc')->get();
 
        $orders->transform(function($order){
            $order->cart_data = $order->getCartDataAttribute($order->cart_data);
            return $order;
        });

        return view('shop.cart',[
            'cart' => $cart,
            'user' => $user,
            'sum' => $sum,
        ])->with(['message' => $message, 'orders' => $orders]);
    }
    public function buy(Request $request)
    {   
        $data = $request->validate([
            'phone' => ['required','integer'],
        ]);
        
        $session_id = Session::getId();

        \Cart::session($session_id);

        $cart =  \Cart::getContent();

        $sum = \Cart::getTotal('price');

        if(auth()->check()){
            $user = auth()->user()->id;
        }
        $orders = new Order;

        $data = Order::create([
            'cart_data' => $orders->setCartDataAttribute($cart),
            'user_id' => $user ?? $session_id,
            'total_sum' => $sum,
            'phone' => $data['phone'],
        ]);

        $message = 'Произошла ошибка';

        if($data){
            \Cart::clear();
            $message = 'Заказ успешно зарегистрирован';
        }

        Session::flash('message',$message);

        return back();
    }
    public function removeProductCart(Request $request)
    {
        $product = Product::findOrFail($request->id);

        $session_id = Session::getId();

        \Cart::session($session_id)->remove($product->id);
        
        return redirect()->back();
    }
}
