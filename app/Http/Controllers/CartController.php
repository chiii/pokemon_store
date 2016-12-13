<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class CartController extends Controller
{

    private $cart = null;

    public function __construct()
    {
        $this->cart = new Cart();
    }

    public function post(Request $request)
    {
        $id = $request->pokemon_id;

        $num = $request->number;

        $this->cart->inCart($id, $num);

        return redirect('/');
    }

    public function delete()
    {
        $this->cart->deleteCart();

        return redirect('/');
    }


}
