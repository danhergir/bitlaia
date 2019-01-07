<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\OrderPast;
use App\Http\Requests;
use Auth;
use \DB;

class UserController extends Controller
{
    public function userAccount(User $user) {
        $orders = Order::all();
        foreach($orders as $order) {
            try {
                $payment = \CoinGate\Merchant\Order::find($order->order_id, array(), array(
                    'environment' => 'live', // sandbox OR live
                    'auth_token' => env('COINGATE_AUTH')));
            
                if ($payment->status == 'new' || $payment->status != 'paid') {
                    DB::table('orders')->where('order_id', $order->order_id)->delete();
                }
                else {
                    DB::table('orders')->where('order_id', $order->order_id)->update(['status' => 'paid']);
                }
            } catch (Exception $e) {
              echo $e->getMessage(); // BadCredentials Not found App by Access-Key
            }
        }  

        $currentDate = Carbon::now();
        $retire = false;
        $user = Auth::user();
        $orders = DB::table('orders')->where('user_id', Auth::user()->id)->get();
        $totalValue = 0;
        foreach($orders as $order) {
            $retireDate = Carbon::parse($order->created_at)->addDays(30);
            if($currentDate >= $retireDate) {
                $retire = true;
            }
            $totalValue += $order->price;
        }

        $orders_past = OrderPast::all();

        return view('user.account', ['totalValue' => $totalValue, 'user' => $user, 'retire' => $retire, 'orders_past' => $orders_past]);
    }
}
