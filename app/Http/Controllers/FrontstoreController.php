<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Request;
use App\Product;
use App\Bid;
use App\User;
use Auth;

class FrontstoreController extends Controller
{

    /**
     * Show the storefront.
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */

    public function FrontStore(){
           
        return view('frontstore');
        
    }

    /**
     * Show the bidPage.
     * Display the product to bid.
     *
     * @return \Illuminate\Http\Response
     */
    public function bidPage() {
        return view('bid');
    }

    public function storeBid(){
        $user = Auth::user();
        $bids = new Bid();
        $bids->user_id = $user->id;
        $bids->email = Request::input('email');
        $bids->amount = Request::input('amount');
        
        $bids->save();

        $notification = array(
            'message' => 'Bid successfully placed!', 
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
