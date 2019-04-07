<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Product;
use App\Models\User;

class PurchaseController extends Controller
{
    //
    public function buy(Request $request)
    {
        $this->validate($request, [
            'client_email' => 'required|email',
            'client_name' => 'required|string',
            'products' => 'required|array',
            'total' => 'required|numeric',
        ]);
        $purchase = new Purchase;
        $purchase->total =  $request->input('total');
        $purchase->status =  "in process";
        $user = User::where("email", $request->input('client_email'))->get()->first();
        if (!$user) {
            $user = new User;
            $user->email = $request->input('client_email');
            $user->name = $request->input('client_name');
            $user->rol = 1;
            $user->save();
        }
        $purchase->user_id =  $user->id;
        $purchase->invoice =  \str_random(8);
        $purchase->save();
        $products = $request->input('products');
        $errors = [];
        foreach ($products as $key => $product) {
            $productQ = Product::find($product["id"])->get()->first();
            if ($productQ->quantity <= 0) { 
                $errors[] = $product;
            }else{
                
                $productQ->decrement("quantity", $product["quantity"]);
                $productQ->save();
                $purchaseDetail = new PurchaseDetail;
                $purchaseDetail->purchase_id = $purchase->id;
                $purchaseDetail->product_id = $product["id"];
                $purchaseDetail->price = $product["price"];
                $purchaseDetail->quantity = $product["quantity"];
                $purchaseDetail->total = $product["total"];
                $purchaseDetail->save();
            }

        }
        $purchase->purchaseDetail;

        return $this->showOne($purchase);
    }
    public function cancel(Request $request, $invoice)
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
}
