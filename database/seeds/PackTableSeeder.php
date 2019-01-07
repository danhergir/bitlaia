<?php

use Illuminate\Database\Seeder;

class PackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pack = new \App\Pack([
            'title' => '$100 Plan',
            'description' => 'Este es un plan de 100 dólares a tiempo indefinido con una utilidad del 5% mensual',
            'price' => 100
        ]);
        $pack->save();

        $pack = new \App\Pack([
            'title' => '$500 Plan',
            'description' => 'Este es un plan de 500 dólares a tiempo indefinido con una utilidad del 5% mensual',
            'price' => 500
        ]);
        $pack->save();

        $pack = new \App\Pack([
            'title' => '$1000 Plan',
            'description' => 'Este es un plan de 1000 dólares a tiempo indefinido con una utilidad del 5% mensual',
            'price' => 1000
        ]);
        $pack->save();

    }
}
