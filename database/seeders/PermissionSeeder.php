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
            'restore',
            'forceDelete',
        ];

        $resources = [
            'user',
            'restaurant',
        ];

        collect($resources)
            ->crossJoin($actions)
            ->map(fn ($set) => implode('.', $set))
            ->each(fn ($permission) => Permission::create(['name' => $permission]));
    }
}
