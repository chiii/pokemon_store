<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TopController extends Controller
{
    public function index()
    {
       $arys = DB::table('pokemon')->get();

        return view('top', compact('arys'));
    }
}
