<?php

namespace Database\Seeders;

use App\Enums\RoleName;
use App\Models\City;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createAdminUser();
        $this->createVendorUser();
    }

    public function createAdminUser()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ])->roles()->sync(Role::where('name', RoleName::ADMIN->value)->first());
    }

    public function createVendorUser()
    {
        $vendor = User::create([
            'name' => 'Restaurant owner',
            'email' => 'vendor@admin.com',
            'password' => bcrypt('password'),
        ]);

        $vendor->roles()->sync(Role::where('name', RoleName::VENDOR->value)->first());

        $cityId = City::where('name', 'Vilnius')->value('id');

        if (! $cityId) {
            // Si la ciudad no existe, puedes crearla aquí o lanzar una excepción
            $city = City::create(['name' => 'Vilnius']);
            $cityId = $city->id;
        }

        $vendor->restaurant()->create([
            'city_id' => $cityId,
            'name' => 'Restaurant 001',
            'address' => 'Address SJV14',
        ]);
    }
}
