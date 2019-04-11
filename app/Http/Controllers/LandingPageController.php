<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('featured', true)->inRandomOrder()->take(6)->get();
        return view('landing-page')->with('products', $products);
    }

}
