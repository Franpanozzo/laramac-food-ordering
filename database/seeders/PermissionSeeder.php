<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $actions = [
            'viewAny',
            'view',
            'create',
            'update',
            'delete',
        ];

        $resources = [
            'user',
            'restaurant',
            'category',
            'product',
            'order',
        ];

        collect($resources)
            ->crossJoin($actions)
            ->map(fn ($set) => implode('.', $set))
            ->each(fn ($permission) => Permission::create(['name' => $permission]));

        Permission::create(['name' => 'cart.add']);
    }
}
