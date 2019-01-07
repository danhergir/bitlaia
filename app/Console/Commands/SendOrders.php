<?php

namespace App\Console\Commands;

use Mail;
use App\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email with the orders of the day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    public function handle()
    {   
        $yesterday = Carbon::yesterday()->format('d-M-Y');
        $orders = Order::where('status', 'paid')->whereDate('created_at', Carbon::yesterday())->get();
        Mail::send('emails.new-orders', ['orders' => $orders, 'yesterday' => $yesterday], function ($mail) use ($orders, $yesterday) {
            $mail->to('bitlaia.com@gmail.com')
                ->from('bitlaia.com@gmail.com')
                ->subject('Nuevas órdenes de hoy');
        });
    }
}
