<?php

use Entrega\Models\Categoria;
use Entrega\Models\Produto;
use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Categoria::truncate();
        factory(Categoria::class,10)->create()->each(function($c){
            for($i=0;$i<=10;$i++)
            {
                $c->produtos()->save(factory(Produto::class)->make());
            }
        });;
    }
}
