<?php

namespace App\Console\Commands;

use App\Events\OrderCreatedEvent;
use App\Models\Order;
use App\Models\User;
use Illuminate\Console\Command;

class CreateOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membuat data order';

    public function handle()
    {
        $data = [
            'user_id' => 1,
            'product_name' => 'Springbed',
            'quantity' => '2',
            'total_price' => 6000000,
        ];

        $order = Order::create($data);

        event(new OrderCreatedEvent($order));
    }
}
