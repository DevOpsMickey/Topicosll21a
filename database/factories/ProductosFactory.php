<?php

namespace Database\Factories;

use App\Models\Productos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Proveedor;

class ProductosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Productos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        
        return [
            'nombreProducto' => $this->faker->randomElement(
                ['Shampoo', 'Suavitel', 'Tostadas', 'Maiz', 'Guitarra', 'Baterias', 'Resortera',
                'Tijeras', 'Hojas blancas', 'Mesa', 'Silla de madera', 'Jarra', 'Resitol', 'Colores', 'Bolsa'
                , 'Lonche' , 'Takis', 'Mesa de crafteo', 'USB-C', 'USB NORMAL', 'Funda de Iphone 7', 'Funda de Iphone 6',
                'Funda de Iphone 8', 'Funda de Iphone 9', 'Airpods', 'Monitor', 'Cubo Rubik']),
            'precio' => $this->faker->randomElement(
                [49.23, 233.41 , 321.12 , 343.53 , 35.3 , 342.5  ,84.9, 42.45, 44.1, 55.3, 23.5, 34.4
                , 123.52, 83.1 ]),
            'idProveedor' => Proveedor::all()->random()->id
        ];
    }


}
