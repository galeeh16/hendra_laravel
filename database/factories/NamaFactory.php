<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Nama;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Nama::class, function (Faker $faker) {
    return [
    	'nama' => $faker->name,
    	'nik'  => Str::random(6),
    	'alamat' =>$faker->address,
    ];
});
