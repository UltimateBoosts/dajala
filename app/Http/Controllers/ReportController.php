<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\User;

class ReportController extends Controller
{
    //
    public function sells()
    {
        $products = Product::with('purchaseDetail.purchase')->get();
        $users = User::with('purchases')->with('products')->get();

        $reportProduct = collect();
        foreach ($products as $key => $product) {
            $newProduct = array(
                "label" => $product->name
            );
            $total = 0;
            foreach ($product->purchaseDetail as $key => $purchaseDetail) {
                if ($purchaseDetail->purchase) {
                    $total += $purchaseDetail->total;
                }
            }

            $newProduct["y"] = $total;
            $reportProduct[] = $newProduct;
        }
        $reportClient = collect();
        $reportSupplier = collect();

        foreach ($users as $key => $user) {
            if ($user->purchases->count() > 0) {

                $newClient = array(
                    "label" => $user->email
                );
                $total = 0;
                foreach ($user->purchases as $key => $purchase) {
                    $total += $purchase->total;
                }
                $newClient["y"] = $total;
                $reportClient[] = $newClient;
            }

            if ($user->products->count() > 0) {
                $newSupplier = array(
                    "label" => $user->email
                );
                $total = 0;
                foreach ($user->products as $key => $product) {
                    if ($product->purchaseDetail->count() > 0) {
                        foreach ($product->purchaseDetail as $item => $purchaseDetail) {
                            if ($purchaseDetail->purchase) {
                                $total += $purchaseDetail->total;
                            }
                        }
                    }
                }
                $newSupplier["y"] = $total;
                $reportSupplier[] = $newSupplier;
            }
        }
        $reports = [];
        $reports["products"] = $reportProduct;
        $reports["client"] = $reportClient;
        $reports["supplier"] = $reportSupplier;
        return $this->showAll(collect($reports));
    }
}
