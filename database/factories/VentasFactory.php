<?php

namespace Database\Factories;

use App\Models\Ventas;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Clientes;
use App\Models\Productos;

class VentasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ventas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        $cliente = Clientes::all()->random();
        $producto = Productos::all()->random();

        $cantidad = rand(1,100);

        $total = $cantidad * ($producto->precio);
        return [
            'idCliente' => $cliente->id,
            'idProducto' => $producto->id,
            'cantidad' => rand(10,100),
            'total' => $total,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */

}
