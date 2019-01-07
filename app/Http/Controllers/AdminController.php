<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\OrderPast;
use Auth;
use \DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        $users = DB::table('users')->where('type', 'default')->get();
        $totalValue = 0;
        $activeUsers = 0;
        $ordersRetire = DB::table('order_pasts')->where('status', 'retire')->get();
        $ordersRetired = DB::table('order_pasts')->where('status', 'retired')->get();
        
        $activeOrders = DB::table('orders')->where('status', 'paid')->get();
        foreach($activeOrders as $activeOrder){
            $activeUsers = DB::table('users')->where('id', $activeOrder->user_id)->get();
            $activeUsers = $activeUsers->count();
            $totalValue += $activeOrder->price;
        }
        $numberActiveOrders = $activeOrders->count();

        return view('admin.dashboard', 
            [
                'users' => $users,
                'activeUsers' => $activeUsers, 
                'activeOrders' => $activeOrders, 
                'numberActiveOrders' => $numberActiveOrders, 
                'totalValue' => $totalValue,
                'ordersRetire' => $ordersRetire,
                'ordersRetired' => $ordersRetired
            ]
        );
    }

    public function retiredOrder(Request $request)
    {
        $order_id = $request['orderId'];
        $order = DB::table('order_pasts')->where('id', $order_id);
        $order->update(['status' => 'retired']);
    }
}
