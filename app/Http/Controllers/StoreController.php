<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function sale()
    {
        $title = 'Sale';
        //$products = Product::where('recommended', '=', 1)->where('price', '<', 200)->orWhere('category_id', '=', 35)->orderBy('name')->limit(5)->get();
        // $products = Product::where('recommended', '=', 1)->simplePaginate(3);
        $products = Product::where('recommended', '=', 1)->paginate(3);
        // dd($products);

        return view( 'store.sale', compact('title', 'products') );
    }
}
