<?php


use Entrega\Models\Order;
use Entrega\Models\OrderItem;
use Entrega\Models\Product;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Category::truncate();
        factory(Order::class,10)->create()->each(function($o){

            for($i=0; $i<=2; $i++)
            {
                $o->items()->save(factory(OrderItem::class)->make([
                    'product_id'=>rand(1,5),
                    'price'=>50,
                    'qtd'=>2
                ]));
            }
        });
    }
}
