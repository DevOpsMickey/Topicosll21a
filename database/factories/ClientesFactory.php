<?php

namespace Database\Factories;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clientes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cliente = $this->faker;
        return [
            'name' => $cliente->name,
            'email' => $cliente->unique()->safeEmail,
            'email_verified_at' => now(),
            'phone_number' => $cliente->phoneNumber,
            'remember_token' => Str::random(10),
            'pais' => 'Estados Unidos',
            'estado' => $cliente->state,
            'ciudad' => $cliente->city,
            'direccion' => $cliente->streetAddress
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
