<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolAdmin = Role::create(['name' => 'Admin']);
        $rolProveedor = Role::create(['name' => 'Proveedor']);
        $rolCliente = Role::create(['name' => 'Cliente']);
        $rolMortal = Role::create(['name' => 'Mortal']);
        
        
        
        Permission::create(['name' => 'indexUser'])->assignRole($rolAdmin);
        Permission::create(['name' => 'usuarios.edit'])->syncRoles([$rolAdmin, $rolProveedor]);
        Permission::create(['name' => 'usuarios.show'])->syncRoles([$rolAdmin,  $rolProveedor, $rolCliente, $rolMortal]);
        Permission::create(['name' => 'usuarios.update'])->syncRoles([$rolAdmin, $rolProveedor]);
        Permission::create(['name' => 'usuarios.destroy'])->assignRole($rolAdmin);
        Permission::create(['name' => 'usuarios.store'])->assignRole($rolAdmin);
        Permission::create(['name' => 'usuarios.create'])->syncRoles([$rolAdmin, $rolMortal]);
            
        Permission::create(['name' => 'indexCliente'])->assignRole($rolAdmin);
        Permission::create(['name' => 'cliente.edit'])->syncRoles([$rolAdmin, $rolCliente]);
        Permission::create(['name' => 'cliente.show'])->syncRoles([$rolAdmin,  $rolProveedor, $rolCliente, $rolMortal]);
        Permission::create(['name' => 'cliente.update'])->syncRoles([$rolAdmin, $rolCliente]);
        Permission::create(['name' => 'cliente.destroy'])->assignRole($rolAdmin);
        Permission::create(['name' => 'cliente.store'])->assignRole($rolAdmin);
        Permission::create(['name' => 'cliente.create'])->syncRoles([$rolAdmin, $rolCliente]);

        Permission::create(['name' => 'indexProveedor'])->assignRole($rolAdmin);
        Permission::create(['name' => 'porveedor.edit'])->syncRoles([$rolAdmin, $rolProveedor]);
        Permission::create(['name' => 'porveedor.show'])->syncRoles([$rolAdmin,  $rolProveedor, $rolCliente, $rolMortal]);
        Permission::create(['name' => 'porveedor.update'])->syncRoles([$rolAdmin, $rolProveedor]);
        Permission::create(['name' => 'porveedor.destroy'])->assignRole($rolAdmin);
        Permission::create(['name' => 'porveedor.store'])->assignRole($rolAdmin);
        Permission::create(['name' => 'porveedor.create'])->syncRoles([$rolAdmin, $rolProveedor]);

        Permission::create(['name' => 'indexProductos'])->assignRole($rolAdmin);
        Permission::create(['name' => 'productos.edit'])->syncRoles([$rolAdmin, $rolProveedor]);
        Permission::create(['name' => 'productos.show'])->syncRoles([$rolAdmin,  $rolProveedor, $rolCliente, $rolMortal]);
        Permission::create(['name' => 'productos.update'])->syncRoles([$rolAdmin, $rolProveedor]);
        Permission::create(['name' => 'productos.destroy'])->assignRole($rolAdmin);
        Permission::create(['name' => 'productos.store'])->assignRole($rolAdmin);
        Permission::create(['name' => 'productos.create'])->syncRoles([$rolAdmin, $rolProveedor]);

        Permission::create(['name' => 'indexVentas'])->assignRole($rolAdmin);
        Permission::create(['name' => 'ventas.edit'])->assignRole($rolAdmin);
        Permission::create(['name' => 'ventas.show'])->assignRole($rolAdmin);
        Permission::create(['name' => 'ventas.update'])->assignRole($rolAdmin);
        Permission::create(['name' => 'ventas.destroy'])->assignRole($rolAdmin);
        Permission::create(['name' => 'ventas.store'])->assignRole($rolAdmin);
        Permission::create(['name' => 'ventas.create'])->assignRole($rolAdmin);
    }
}
