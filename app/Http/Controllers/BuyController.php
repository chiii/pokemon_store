<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\Contacted;

class BuyController extends Controller
{
    public function address()
    {
        if(!Auth::check()){

            return redirect('/login');

        } elseif (!empty(session('cart', []))){

            return view('/address');

        }else{

            return redirect('/');

        }
    }

    public function done(Request $request)
    {
        $id = DB::table('buy_users')->insertGetId(['ken'=>$request->ken,'code'=>$request->code,'address'=>$request->address,'user_id'=>Auth::user()['attributes']['id']]);

        foreach ((array)session('cart') as $item){
            DB::table('sale')->insert(['pokemon_id'=>$item->pokemon_id,'pokemon_num'=>$item->pokemon_num,'buy_user_id'=>$id]);
        }


        Mail::to(Auth::user()['attributes']['email'])->send(new Contacted());

        session(['cart'=>null]);

        return view('end');
    }

}
