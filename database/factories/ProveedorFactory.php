<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProveedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proveedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $proveedor = $this->faker;
        return [
            
            'name' => $proveedor->name,
            'email' => $proveedor->unique()->safeEmail,
            'email_verified_at' => now(),
            'phone_number' => $proveedor->phoneNumber,
            'remember_token' => Str::random(10),
            'pais' => 'Estados Unidos',
            'estado' => $proveedor->state,
            'ciudad' => $proveedor->city,
            'direccion' => $proveedor->streetAddress
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
