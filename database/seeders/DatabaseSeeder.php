<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->firstOrCreate(
            ['email' => 'admin@lala.test'],
            ['name' => 'Administrador LALA', 'password' => Hash::make('password'), 'email_verified_at' => now()],
        );

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            ProductInnovationSeeder::class,
            InventoryMovementSeeder::class,
            PromotionSeeder::class,
        ]);
    }
}
