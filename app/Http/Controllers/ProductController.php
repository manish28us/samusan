<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
		$products = DB::table('products')->get();;
		return view('product', ['products' => $products]);
    }
	
	public function product($id)
    {
		$products = DB::table('products')->where('id', $id)->get();
		return view('detail', ['products' => $products]);
    }
}
