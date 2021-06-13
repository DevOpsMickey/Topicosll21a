<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Productos;


class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Productos::Factory(180)->create();
    }
}
