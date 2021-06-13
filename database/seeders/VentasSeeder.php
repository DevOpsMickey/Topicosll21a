<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ventas;

class VentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ventas = Ventas::Factory(792)->create();
    }
}
