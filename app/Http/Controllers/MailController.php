<?php

namespace App\Http\Controllers;
use Mail;
use Session;
Use App\OrderPast;
Use App\User;
Use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MailController extends Controller
{   
    public function retire(Request $request, OrderPast $order_past) {
        $currentDate = Carbon::now();
        Mail::send('emails.contact', $request->all(), function($message) use ($currentDate) {
            $message->from(request('email'));
            $message->subject('Notificación de retiro de inversión');
            $message->to(request('email'));
        });

        $order_id = request('order_id');
        $order_table = DB::table('orders')->where('id', $order_id)->get();
        $order_price = request('order_price');
        $order_past->order_id = $order_id;
        $order_past->user_id = request('user_id');
        $order_past->price = $order_price;
        $order_past->client = request('order_client');
        $order_past->profit = request('order_profit');
        $order_past->status = 'retire';
        $order_past->save();

        DB::table('orders')->where('id', $order_id)->delete();

        return redirect()->route('welcome.index');
    }
}
