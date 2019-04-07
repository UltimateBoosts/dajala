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
            $productQ = Product::where("id", $product["id"])->get()->first();
            if ($productQ->quantity <= 0) {
                $errors[] = $product;
            } else {

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
    public function cancel($invoice)
    {
        $purchase = Purchase::where("invoice", $invoice)->get()->first();
        if ($purchase) {
            $purchase->status = "Canceled";
            foreach ($purchase->purchaseDetail as $key => $detail) {
                # code...
                $productQ = Product::where("id", $detail->product_id)->get()->first();
                $productQ->increment("quantity", $detail->quantity);
                $productQ->save();
            }
            $purchase->delete();
            return $this->showMessage("Purchase canceled sucessfully");
        } else {
            return $this->errorResponse("Puchase doesn't exist", 404);
        }
    }
}
