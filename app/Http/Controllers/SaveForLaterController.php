<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class SaveForLaterController extends Controller
{

    /**
     * Switch item from Save for later to Shopping cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToCart($id)
    {    
        $cart = Cart::instance('saveForLater')->get($id);
        Cart::instance('saveForLater')->remove($id);

        $duplicate = Cart::instance('cart')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if($duplicate->isNotEmpty()){
            return redirect()->route('cart.index')->with('success', 'Proizvod postoji u korpi');
        }

        Cart::instance('cart')->add($cart->id, $cart->name, 1, $cart->price)
            ->associate('App\Product');

        return redirect()->route('cart.index')->with('success', 'Proizvod je vracen u korpu');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('saveForLater')->remove($id);
        return redirect()->route('cart.index')->with('success', 'Proizvod je uklonjen');
    }
}
