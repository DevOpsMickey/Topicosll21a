<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder{

    public function run(){

        User::create([
            'name' => 'Miguel Angel Herrera Quezada',
            'email' => 'MickeyFeick@hotmail.com',
            'password' => bcrypt('Pokemon123')
        ])->assignRole('Admin');
        
        User::create([
            'name' => 'Mariana Raquel Flores Carrillo',
            'email' => 'MarianaBebe@hotmail.com',
            'password' => bcrypt('marianabebe')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Juan jose Cliente',
            'email' => 'cliente@hotmail.com',
            'password' => bcrypt('cliente')
        ])->assignRole('Cliente');

        User::create([
            'name' => 'Juan jose Proveedor',
            'email' => 'Proveedor@hotmail.com',
            'password' => bcrypt('proveedor')
        ])->assignRole('Proveedor');

        $user = User::Factory(90)->create()->each(function ($user) {
            $user->assignRole('Mortal'); 
        });
        
        $user = User::Factory(60)->create()->each(function ($user) {
            $user->assignRole('Proveedor'); 
        });
    }
}