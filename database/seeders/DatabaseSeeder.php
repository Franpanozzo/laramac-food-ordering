<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            CitySeeder::class,
            UserSeeder::class,
        ]);

        $this->seedDemoRestaurants();
    }

    public function seedDemoRestaurants(): void
    {
        // Create customers that will place orders
        $customers = User::factory(20)->create()->each(function ($user) {
            $user->roles()->attach(3); // Attach customer role
        });

        // Create restaurants with staff and orders
        User::factory(50)->vendor()->create()->each(function ($vendor) use ($customers) {
            $products = Product::factory(7);
            $categories = Category::factory(5)->has($products);
            $staffMember = User::factory()->staff();

            // Create restaurant with categories and staff
            $restaurant = Restaurant::factory()
                ->has($categories)
                ->has($staffMember, 'staff')
                ->create(['owner_id' => $vendor->id]);

            // Create orders for each status
            collect(['pending', 'preparing', 'ready', 'cancelled'])->each(function ($status) use ($restaurant, $customers) {
                Order::factory(2)
                    ->state([
                        'restaurant_id' => $restaurant->id,
                        'customer_id' => $customers->random()->id,
                        'status' => $status,
                    ])
                    ->has(
                        OrderItem::factory()->count(random_int(1, 5)),
                        'products'
                    )
                    ->create();
            });
        });
    }
}
