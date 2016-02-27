<?php


use Entrega\Models\OAuthClients;


use Illuminate\Database\Seeder;

class OAuthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     /*   factory(OAuthClient::class)->create(
            [
                'id' => 'appid01',
                'secret' => 'secret',
                'name' =>'Minha App Mobile'
            ]
        );*/
        factory(OAuthClients::class)->create([
            'id' => 'appid01',
            'secret' => 'secret',
            'name' =>'Minha App Mobile'
        ]);



    }
}
