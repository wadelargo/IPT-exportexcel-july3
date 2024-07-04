<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laptops = [
            [
                'image' => 'images/dell_xps13.jpg',
                'brand_name' => 'Dell',
                'description' => 'Dell XPS 13 9310, Intel Core i7, 16GB RAM, 512GB SSD',
                'price' => 15000,
            ],
            [
                'image' => 'images/macbook_pro.jpg',
                'brand_name' => 'Apple',
                'description' => 'Apple MacBook Pro 16-inch, M1 Pro, 16GB RAM, 1TB SSD',
                'price' => 25000,
            ],
            [
                'image' => 'images/hp_spectre.jpg',
                'brand_name' => 'HP',
                'description' => 'HP Spectre x360, Intel Core i7, 16GB RAM, 1TB SSD',
                'price' => 16000,
            ],
            [
                'image' => 'images/lenovo_thinkpad.jpg',
                'brand_name' => 'Lenovo',
                'description' => 'Lenovo ThinkPad X1 Carbon, Intel Core i7, 16GB RAM, 512GB SSD',
                'price' => 14000,
            ],
            [
                'image' => 'images/asus_rog.jpg',
                'brand_name' => 'Asus',
                'description' => 'Asus ROG Zephyrus G14, AMD Ryzen 9, 16GB RAM, 1TB SSD',
                'price' => 18000,
            ],
            [
                'image' => 'images/acer_swift.jpg',
                'brand_name' => 'Acer',
                'description' => 'Acer Swift 3, Intel Core i5, 8GB RAM, 256GB SSD',
                'price' => 70000,
            ],
            [
                'image' => 'images/msi_stealth.jpg',
                'brand_name' => 'MSI',
                'description' => 'MSI Stealth 15M, Intel Core i7, 16GB RAM, 512GB SSD',
                'price' => 13000,
            ],
            [
                'image' => 'images/microsoft_surface.jpg',
                'brand_name' => 'Microsoft',
                'description' => 'Microsoft Surface Laptop 4, Intel Core i7, 16GB RAM, 512GB SSD',
                'price' => 15000,
            ],
            [
                'image' => 'images/razer_blade.jpg',
                'brand_name' => 'Razer',
                'description' => 'Razer Blade 15, Intel Core i7, 16GB RAM, 512GB SSD',
                'price' => 20000,
            ],
            [
                'image' => 'images/lg_gram.jpg',
                'brand_name' => 'LG',
                'description' => 'LG Gram 17, Intel Core i7, 16GB RAM, 1TB SSD',
                'price' => 17000,
            ],
        ];

        foreach ($laptops as $laptop) {
            DB::table('laptops')->insert($laptop);
        }
    }
}
