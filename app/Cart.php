<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2016/12/12
 * Time: 20:10
 */

namespace App;

use DB;


class Cart
{
    public function inCart($id, $num)
    {
        $items = session('cart',[]);

        $item = DB::table('pokemon')->where('pokemon_id',$id)->get()->first();

        $flag = 1;

        if(!empty($items)) {
            foreach ($items as $i) {
                if ($i->pokemon_id === $item->pokemon_id) {
                    $flag = 0;
                    break;
                }
            }
        }

        $items[] = $item;
        $items[count($items)-1]->pokemon_num = $num;

        if($flag === 1){
            session(['cart'=>$items]);
        }

        return true;

    }

    public function deleteCart()
    {
        session(['cart'=>null]);

        return true;
    }
}