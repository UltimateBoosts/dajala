<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    //
    public function index()
    {
        return $this->showAll(Product::with('supplier')->get());
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return $this->showOne($product);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'supplier_email' => 'required|email',
            'supplier_name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'lot' => 'required|string',
            'expired_at' => 'required|date'
        ]);
        $product = Product::where("name", $request->input('name'))->get()->first();
        if (!$product) {
            $user = User::where("email", $request->input('supplier_email'))->get()->first();
            if (!$user) {
                $user = new User;
                $user->email = $request->input('supplier_email');
                $user->name = $request->input('supplier_name');
                $user->rol = 2;
                $user->save();
            }
            $product = new Product;
            $product->name = $request->input('name');
            $product->supplier_id = $user->first()->id;
            $product->price = $request->input('price');
            $product->quantity = $request->input('quantity');
            $product->lot = $request->input('lot');
            $product->expired_at = $request->input('expired_at');
            $product->save();
            return $this->showOne($product);
        } else {
            return $this->showMessage("El producto ya existe");
        }
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'lot' => 'required|string',
            'expired_at' => 'required|date'
        ]);
        $product = Product::findOrFail($id);
        $product->price = $request->input('price');
        $product->quantity =  $request->input('quantity');
        $product->lot = $request->input('lot');
        $product->expired_at = $request->input('expired_at');
        $product->update();
        return $this->showOne($product);
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return $this->showMessage("Product deleted suscessfully");
    }
}
