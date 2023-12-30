<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Stripe;

class StripeController extends Controller
{
    public function stripe($id)
    {
		if(!$id){  return redirect()->to('/'); }
		$products = DB::table('products')->where('id', $id)->get();
		return view('stripe', ['products' => $products]);
    }

    public function stripePost(Request $request)
    {		
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->price,
                "currency" => "AUD",
                "source" => $request->stripeToken,
                "description" => "This is test payment",
        ]);
   
        Session::flash('success', 'Payment Successful !');
           
        return back();
    }
}
