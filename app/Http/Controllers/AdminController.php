<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;


class AdminController extends Controller
{
    public function delete($id)
    {
        User::destroy($id);
        return redirect()->route('users');
    }
    public function deleteProduct($id)
    {
        Product::destroy($id);
        return redirect()->route('products');
    }
    public function edit($id)
    {   
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $user = auth()->user();
        return view('shop.admin.edit',[
            'product' => $product,
            'user'=>$user,
            'categories'=>$categories,
        ]);
    }
    public function create()
    {
        $categories = Category::all();
        $user = auth()->user();

        return view('shop.admin.edit',['user'=>$user, 'categories'=>$categories,]);
    }
    public function update(Request $request, $id)
    {   
        $data = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'amount' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]); 
        $product = Product::findOrFail($id);

        $product->update([
            'name' => $data['name'],
            'code' => $data['code'],
            'amount' => $data['amount'],
            'price' => $data['price'],
            'description' => $data['description'],
            'image' => '',
            'category_id' => $request->category_id,
        ]);
       
        return redirect()->route('products');
    }
    public function store(Request $request)
    {   
        $data = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'amount' => 'required',
            'price' => 'required',
            'description' => 'required',
            
        ]);

        Product::create([
                'name' => $data['name'],
                'code' => $data['code'],
                'amount' => $data['amount'],
                'price' => $data['price'],
                'description' => $data['description'],
                'image' => '',
                'category_id' => $request->category_id,
        ]);
        return redirect()->route('products');    
    
    }

}
