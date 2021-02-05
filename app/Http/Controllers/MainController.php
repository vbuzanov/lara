<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\Review;

class MainController extends Controller
{
    public function index()
    {
        $title = 'Welcome';
        $subtitle = '<em>to store</em>';
        $products = Product::with('category')->get();
        // dd($products[0]);
        // $categories = Category::all();
        //dump($products);
        //dd($categories);
        return view( 'main.index', compact('title', 'products', 'subtitle') );
    }

    public function contacts()
    {
        return view('main.contacts');
    }
    
    public function getContacts(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'message' => 'required|min:3',
        ]);

        //dd( $request->all() );
        // отправляем письмо
        //return redirect('/contacts')->with('success', 'Thank!');
        // return view('main.contacts');
        return back()->with('success', 'Thank!');
    }

    public function news()
    {
        $title = 'News';
        $news = News::paginate(10);
        
        // dd($news);
    
        return view( 'main.news', compact('title', 'news') );
    }

    public function reviews()
    {
        $reviews = Review::orderBy('created_at', 'DESC')->paginate(5);
        return view( 'main.reviews', compact('reviews') );
    }

    public function getReviews(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'review' => 'required|min:5',
        ]);

        $review = new Review();
        $review->name = $request->name;
        $review->product_id = $request->product_id;
        $review->review = $request->review;
        $review->save();

        return back()->with('success', 'Thanks for your review!');
    }

    public function newsnext($slug)
    {
        $newsnext = News::where('slug', $slug)->firstOrFail();
        return view('main.newsnext', compact('newsnext'));
    }
}



