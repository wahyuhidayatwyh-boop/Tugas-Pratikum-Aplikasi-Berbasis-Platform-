<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user admin Wowo
        User::factory()->create([
            'name'     => 'Wowo',
            'email'    => 'wowo@toko.com',
            'password' => bcrypt('password'),
        ]);

        // Buat 15 produk dummy menggunakan factory
        Product::factory(15)->create();
    }
}
