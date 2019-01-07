<?php

namespace App\Http\Controllers;

use CoinGate\CoinGate;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Pack;
use App\Order;
use App\User;
use \DB;
use Auth;

class PackController extends Controller
{
    public function getIndex() {
        $packs = Pack::all();

        return view('user.packs', ['packs' => $packs]);   
    }

    public function checkout(Order $order) {
        //Coingate API Service 
        $pack_name = request()->input('pack_name');
        $pack_price = request()->input('pack_price');

        \CoinGate\CoinGate::config(array(
            'environment'               => 'live', // sandbox OR live
            'auth_token'                => env('COINGATE_AUTH'),
            'curlopt_ssl_verifypeer'    => TRUE // default is false
        ));
        
        $post_params = array(
            'order_id'          => '001',
            'price_amount'      => $pack_price,
            'price_currency'    => 'USD',
            'receive_currency'  => 'USD',
            'callback_url'      => 'http://bitlaia.com/callback',
            'cancel_url'        => 'http://bitlaia.com/user/portal',
            'success_url'       => 'http://bitlaia.com/user/portal',
            'title'             => $pack_name,
        );

        $payment = \CoinGate\Merchant\Order::create($post_params);

        if ($payment) { 
            $url_payment = $payment->payment_url;
            $payment_id = $payment->id;
            $order->order_id = $payment_id;
            $order->client = Auth::user()->name;
            $order->user_id = Auth::user()->id;
            $order->price = $payment->price_amount;
            $order->save();
        } else {
            #Order Is Not Valid
        }
        

        return redirect()->away($url_payment);
        
    }

    public function callback(Request $request) {    
        $order = Order::find($request->input('order_id'));
        if ($request->input('status') == 'paid') {
            if ($request->input('price') >= $order->total_price) {
            $status = 'paid';
            }
        }
        else {
            $status = $request->input('status');
        }
        if (!is_null($status)) {
            $order->update(['status' => $status]);
        }
    }
}

