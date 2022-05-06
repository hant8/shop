<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class TestController extends Controller
{
    
    public function home()
    {   
        $products = Product::inRandomOrder()->get();
        if(auth()->check()){
            $user = auth()->user();
            return view( "shop.home",['user' => $user, 'products' => $products]);
        }
        return view("shop.home",['products' => $products]);
    }
    public function products()
    {   
        $products = Product::all();
        if(auth()->check()){
            $user = auth()->user();
            return view( "shop.products",['user'=>$user, 'products' => $products]);
        }
        return view("shop.products",['products' => $products]);
    }
    public function users()
    {   
        $clients = User::all();
        if(auth()->check()){
            $user = auth()->user();
            return view( "shop.users",['user'=>$user, 'clients'=>$clients]);
        }
        return view("shop.users",['clients' => $clients]);
    }
    public function show($id)
    {   
        $product = Product::findOrFail($id);
        if(auth()->check()){
            $user = auth()->user();

            return view( "shop.show",['user'=>$user, 'product'=>$product]);
        }else{
            return view( "shop.show",['product'=>$product]);
        }
    }
    public function catalog()
    {   
        $categories = Category::all();
      
        if(auth()->check()){
            $user = auth()->user();
            return view( "shop.catalog",['user'=>$user, 'categories' => $categories]);
        }
        return view("shop.catalog",['categories' => $categories]);
    }
    public function showCategory($id)
    {   
        
        $category = Category::findOrFail($id);
      
        if(auth()->check()){
            $user = auth()->user();
            return view( "shop.category",['user'=>$user, 'category' => $category]);
        }
        return view("shop.category",['category' => $category]);
    }
    public function filter(Request $request)
    {   
        if(!empty($request->input('min')) and !empty($request->input('max')))
        {   
            $products = Product::where([
            ['price','>', $request->input('min') ],
            ['price','<', $request->input('max')]
        ])->get();
        }elseif(!empty($request->input('min'))){
            $products = Product::where([
                ['price','>', $request->input('min') ]
            ])->get();
        }elseif(!empty($request->input('max'))){
            $products = Product::where([
                ['price','<', $request->input('max') ]
            ])->get();
        }
    
        if(auth()->check()){
            $user = auth()->user();
            return view( "shop.products",['user'=>$user, 'products' => $products]);
        }
        return view("shop.products",['products' => $products]);
    }
    
}
