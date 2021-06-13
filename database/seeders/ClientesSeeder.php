<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clientes;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cliente = Clientes::Factory(136)->create();
    }
}
