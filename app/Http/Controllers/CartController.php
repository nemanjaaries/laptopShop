<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::instance('cart');
        $cartContent = $cart->content();
        $cartSubtotal = $cart->subtotal();
        $cartTax = $cart->tax();
        $cartTotal = $cart->total();
        $saveForLater = Cart::instance('saveForLater')->content();

        $maybeYouAlsoLike = Product::mightAlsoLike()->get();
        return view('cart')->with([
            'cartContent' => $cartContent,
            'cartSubtotal' => $cartSubtotal,
            'cartTax' => $cartTax,
            'cartTotal' => $cartTotal,
            'saveForLater' => $saveForLater,
            'maybeYouAlsoLike' => $maybeYouAlsoLike        
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicate = Cart::instance('cart')->search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if($duplicate->isNotEmpty()){
            return redirect()->route('cart.index')->with('success', 'Proizvod postoji u korpi');
        }

    
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');

        Cart::instance('cart')->add($id, $name, 1, $price)
            ->associate('App\Product');
        
        return redirect()->route('cart.index')->with('success', 'Proizvod je ubacen u korpu');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),[
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if($validation->fails()){
            session()->flash('ses_errors', collect(['Quantity must be between 1 and 5']));
            return response()->json(['success' => false], 400);
        }

        Cart::instance('cart')->update($id, $request->quantity);
        session()->flash('success', 'Quantity was updated successfully');

        return response()->json(['success' => true ]);
    }


    /**
     * Switch item from Shopping cart to Save for later.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($id)
    {    
        $cart = Cart::instance('cart')->get($id);
        Cart::instance('cart')->remove($id);

        $duplicate = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if($duplicate->isNotEmpty()){
            return redirect()->route('cart.index')->with('success', 'Proizvod postoji u listi sacuvanih proizvoda');
        }

        Cart::instance('saveForLater')->add($cart->id, $cart->name, 1, $cart->price)
            ->associate('App\Product');

        return redirect()->route('cart.index')->with('success', 'Proizvod je sacuvan za kasnije');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('cart')->remove($id);
        return redirect()->route('cart.index')->with('success', 'Proizvod je uklonjen iz korpe');
    }
}
