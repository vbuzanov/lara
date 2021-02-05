<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\Review;
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

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)->paginate(12);
        return view('store.category', compact('category', 'products'));

    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $reviews = Review::where('product_id', $product->id)->orderBy('created_at', 'DESC')->paginate(12);
        
        return view('store.product', compact('product', 'reviews'));
    }

}
