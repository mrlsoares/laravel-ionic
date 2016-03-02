<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Entrega\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Entrega\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word

    ];
});
$factory->define(Entrega\Models\Categoria::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->word
    ];
});

$factory->define(Entrega\Models\Produto::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->word,
        'descricao'=>$faker->sentence,
        'preco'=>$faker->numberBetween(10,50)
    ];
});
$factory->define(Entrega\Models\Client::class, function (Faker\Generator $faker) {
    return [
        'phone' => $faker->phoneNumber,
        'endereco'=>$faker->address,
        'cidade'=>$faker->city,
        'uf'=>$faker->state,
        'cep'=>$faker->postcode,
    ];
});


$factory->define(Entrega\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description'=>$faker->sentence,
        'price'=>$faker->numberBetween(10,50)
    ];
});
$factory->define(Entrega\Models\Order::class, function (Faker\Generator $faker) {
    return [
        'client_id'=>rand(1,10),
        'status'=>0,
        'total'=>rand(50,100)
    ];
});
$factory->define(Entrega\Models\OrderItem::class, function (Faker\Generator $faker) {
    return [

    ];
});
$factory->define(Entrega\Models\Cupom::class, function (Faker\Generator $faker) {
    return [
        'code'=>mt_rand(100,1000),
        'value'=>mt_rand(50,100),

    ];
});
$factory->define(Entrega\Models\OAuthClients::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'name' => $faker->name,
        'secret' => bcrypt(str_random(10)),
    ];
});