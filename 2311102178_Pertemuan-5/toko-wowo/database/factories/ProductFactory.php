<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = [
            ['name' => 'Beras Premium 5kg',        'desc' => 'Beras pulen berkualitas tinggi, cocok untuk konsumsi sehari-hari.'],
            ['name' => 'Minyak Goreng 2L',          'desc' => 'Minyak goreng sawit murni, bebas kolesterol.'],
            ['name' => 'Gula Pasir 1kg',            'desc' => 'Gula pasir putih bersih pilihan terbaik.'],
            ['name' => 'Tepung Terigu 1kg',         'desc' => 'Tepung serbaguna untuk kue, roti, dan gorengan.'],
            ['name' => 'Kopi Arabika 250g',         'desc' => 'Kopi arabika single origin, aroma khas dan rasa nikmat.'],
            ['name' => 'Teh Celup 25 pcs',          'desc' => 'Teh hitam premium dalam kemasan praktis.'],
            ['name' => 'Susu Full Cream 1L',        'desc' => 'Susu segar full cream kaya kalsium dan vitamin.'],
            ['name' => 'Sabun Mandi 100g',          'desc' => 'Sabun mandi antibakteri dengan formula lembut.'],
            ['name' => 'Sampo 200ml',               'desc' => 'Sampo perawatan rambut berkilau dan lembut.'],
            ['name' => 'Pasta Gigi 120g',           'desc' => 'Pasta gigi fluoride untuk perlindungan gigi optimal.'],
            ['name' => 'Deterjen Bubuk 1kg',        'desc' => 'Deterjen ampuh merontokkan noda bandel.'],
            ['name' => 'Snack Keripik Singkong',    'desc' => 'Keripik singkong renyah dengan berbagai rasa.'],
            ['name' => 'Mie Instan 1 Kardus',       'desc' => 'Mie instan berbagai rasa, isi 40 bungkus.'],
            ['name' => 'Sarden Kaleng 155g',        'desc' => 'Ikan sarden dalam saus tomat pedas siap saji.'],
            ['name' => 'Kecap Manis 135ml',         'desc' => 'Kecap manis asli berbahan kedelai pilihan.'],
        ];

        $item = $this->faker->randomElement($products);

        return [
            'name'        => $item['name'],
            'description' => $item['desc'],
            'price'       => $this->faker->numberBetween(2000, 150000) / 1000 * 1000,
            'stock'       => $this->faker->numberBetween(5, 200),
        ];
    }
}
