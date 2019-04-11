<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = 8;
        $categories = Category::all();

        if(request()->category){
            //$products = Category::where('slug', request()->category)->first()->products;
            $products = Product::with('categories')->whereHas('categories', function($query){
                $query->where('slug', request()->category);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        }else{
            $products = Product::where('featured', true);
            $categoryName = 'Featured';
        }

        if(request()->sort == 'low_high'){
            $products = $products->orderBy('price')->paginate($paginate);
        }elseif(request()->sort == 'high_low'){
            $products = $products->orderBy('price', 'desc')->paginate($paginate);
        }else{
            $products = $products->paginate($paginate);
        }   

        
        return view('shop')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName     
            ]);
    }
 
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', '=', $slug)->firstOrFail();
        $maybeYouAlsoLike = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();

       return view('product')->with([
            'product' => $product,
            'maybeYouAlsoLike' => $maybeYouAlsoLike
           ]);
    }

   
}
