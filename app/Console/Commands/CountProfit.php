<?php

namespace App\Console\Commands;

use App\Pack;
use App\User;
use App\Order;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;

class CountProfit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count:profit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It is going to count the profit in a period of time';

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
        $orders = Order::all();
        foreach($orders as $order) {            
            $percentage = ($order->price * 0.05) / 30;
            $sumPerMinute = $percentage/1440;
            $order->profit += $sumPerMinute;
            $order->save();
        }
    }
}
